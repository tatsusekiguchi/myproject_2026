#!/usr/bin/env python3
"""Create CMS design snippets without compiling or changing site assets."""
import argparse
import html
import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]
KEYS = ("category", "detail", "list", "top", "instagram")


def validate(config):
    block_id = config.get("listBlockId", "")
    if not isinstance(block_id, str) or not re.fullmatch(r"wgc-[A-Za-z0-9_-]+", block_id):
        raise ValueError("listBlockIdにCMSの一覧ブロックID（wgc-から始まる値）を指定してください。")
    for key in ("listPath", "detailPath", "contactPath"):
        value = config.get(key, "")
        if not isinstance(value, str) or not re.fullmatch(r"/?[A-Za-z0-9_/-]+", value):
            raise ValueError(f"{key}にはサイト内のページパスを指定してください（例：/bloglist、blog）。")
        if "//" in value or any(part in ("", ".", "..") for part in value.strip("/").split("/")):
            raise ValueError(f"{key}のページパスが不正です。")
    tag = config.get("containerTag", "div")
    if tag not in ("div", "section"):
        raise ValueError("containerTagはdivまたはsectionを指定してください。")
    return {**config, "containerTag": tag}


def render(config, catalog):
    config = validate(config)
    blocks = catalog["blocks"]
    if tuple(block["key"] for block in blocks) != KEYS:
        raise ValueError("blog-blocks.jsonのブロック構成が不正です。")
    outputs = {}
    combined = []
    settings = []
    for block in blocks:
        text = block["html"]
        for key in ("listBlockId", "listPath", "detailPath", "contactPath"):
            text = text.replace("{{" + key + "}}", html.escape(config[key], quote=True))
        if "{{" in text or "}}" in text:
            raise ValueError(f"{block['key']}に未解決の変数があります。")
        if config["containerTag"] == "section":
            if not text.startswith('<div class="webgene-blog">') or not text.endswith("</div>"):
                raise ValueError("webgene-blogのルート構造が不正です。")
            text = text.replace('<div class="webgene-blog">', '<section class="webgene-blog">', 1)
            text = text[:-len("</div>")] + "</section>"
        if text.count('class="webgene-item"') != 1:
            raise ValueError(f"{block['key']}の繰り返し元は1件にしてください。")
        outputs[f"{block['key']}.html"] = text + "\n"
        combined.append(f"<!-- {block['label']} / {block['key']} -->\n{text}")
        settings.append({"key": block["key"], "label": block["label"], "source": block["source"], **block["settings"]})
    outputs["data-block.html"] = "\n\n".join(combined) + "\n"
    outputs["cms-settings.json"] = json.dumps({"migration": config, "blocks": settings}, ensure_ascii=False, indent=2) + "\n"
    return outputs


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--config", type=Path, required=True)
    parser.add_argument("--output", type=Path, default=ROOT / "cms/generated")
    parser.add_argument("--overwrite", action="store_true", help="生成対象の既存ファイルを上書き")
    args = parser.parse_args()
    try:
        catalog = json.loads((ROOT / "cms/blog-blocks.json").read_text(encoding="utf-8"))
        config = json.loads(args.config.read_text(encoding="utf-8"))
        outputs = render(config, catalog)
        directory = args.output.resolve()
        destinations = [directory / name for name in outputs]
        for path in destinations:
            if path.is_symlink():
                raise ValueError(f"シンボリックリンクへは出力できません：{path}")
            if path.exists() and (not args.overwrite or not path.is_file()):
                raise ValueError(f"出力先が存在します：{path}。上書きする場合は--overwriteを指定してください。")
        directory.mkdir(parents=True, exist_ok=True)
        for name, content in outputs.items():
            (directory / name).write_text(content, encoding="utf-8")
        print(f"{directory}に{len(outputs)}ファイルを作成しました。CMS管理画面への登録は手動で行ってください。")
    except (OSError, ValueError, KeyError, TypeError) as error:
        parser.exit(1, f"エラー：{error}\n")


if __name__ == "__main__":
    main()
