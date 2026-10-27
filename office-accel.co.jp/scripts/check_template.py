#!/usr/bin/env python3
"""Static CMS template checks; does not compile Pug/Sass or start a server."""
import argparse
import json
import re
from pathlib import Path
from urllib.parse import urlsplit

ROOT = Path(__file__).resolve().parents[1]
FORBIDDEN_TAGS = ("header", "footer", "main", "section", "article", "nav", "aside", "table", "thead", "tbody", "tfoot", "tr", "th", "td", "caption", "colgroup", "col")
FORBIDDEN_CLASSES = ("btn", "card", "container", "row", "active", "clearfix", "info", "collapse", "modal", "alert", "badge", "navbar", "dropdown", "pagination", "form-control", "form-group")
CMS_KEYS = ("instagram",)
PROJECT_IMAGE_HOST = "sit-9586431.sibloo.com"


def check(release=False):
    errors = []
    def fail(path, message):
        errors.append(f"{path}: {message}")
    def read(name):
        return (ROOT / name).read_text(encoding="utf-8")

    for path in sorted((ROOT / "src/pug").rglob("*.pug")):
        name = path.relative_to(ROOT)
        text = path.read_text(encoding="utf-8")
        stack = []
        children = {}
        anchor_lines = set()
        pending_each = None
        for number, line in enumerate(text.splitlines(), 1):
            if line.strip() and line.startswith(" "):
                fail(name, f"{number}行目：Pugの字下げは実タブ")
            token = line.lstrip("\t")
            depth = len(line) - len(token)
            if not token or token.startswith("//"):
                continue
            if pending_each is not None:
                each_number, each_depth = pending_each
                if depth <= each_depth:
                    fail(name, f"{each_number}行目：eachの本文は1階層以上字下げする")
                pending_each = None
            if token.startswith("each "):
                pending_each = (number, depth)
            if re.match(r"(?:" + "|".join(FORBIDDEN_TAGS) + r")(?:[. #(]|$)", token):
                fail(name, f"{number}行目：独自CMSの構造タグはdiv")
            if re.match(r"time(?:[. #(=]|$)", token):
                fail(name, f"{number}行目：timeタグは使用せず、日付はp等で表示する")
            if re.match(r"span(?:[. #(=]|$)", token) or re.search(r"#\[span(?:[. #(=\]]|$)|<span(?:\s|>)", token):
                fail(name, f"{number}行目：spanタグは使用せず、役割用divやpで構成する")
            if re.search(r"[(,]\s*(?:aria-[\w-]+|role|tabindex|loading|fetchpriority|hidden)\s*=", token):
                fail(name, f"{number}行目：CMS向けの不要属性を付けない")
            if token.startswith("img(") and re.search(r"[(,]\s*(?:width|height)\s*=", token):
                fail(name, f"{number}行目：画像の寸法はSassで指定する")
            if re.match(r"h[1-6](?:\.|#)", token) or re.match(r"h[1-6]\([^)]*(?:class|id)=", token):
                fail(name, f"{number}行目：見出しのclass/idは親へ配置")
            if token.startswith("include "):
                include = token.split(None, 1)[1]
                target = ROOT / "src/pug" / include.lstrip("/") if include.startswith("/") else path.parent / include
                if not target.suffix:
                    target = target.with_suffix(".pug")
                if not target.is_file():
                    fail(name, f"{number}行目：include先が存在しない：{include}")
            # Conditional directives are transparent for the role-block check.
            while stack and stack[-1][0] >= depth:
                stack.pop()
            if stack and stack[-1][1] in anchor_lines and not re.match(r"(?:\.[A-Za-z_]|div\.[A-Za-z_])", token):
                fail(name, f"{number}行目：aタグ直下はクラス付きdivで構成する")
            if re.match(r"a(?:\(|[.#]|$)", token):
                anchor_lines.add(number)
                if ")" in token and token.rsplit(")", 1)[1].strip():
                    fail(name, f"{number}行目：aタグへ直接文言を書かずクラス付きdivで囲む")
            if token.startswith("mixin "):
                stack = []
                continue
            tag = re.match(r"^(?:([a-z][a-z0-9]*)(?=[\s.(#=]|$)|([.#])|(#\{))", token)
            directives = ("if", "else", "unless", "each", "include", "doctype", "while", "case", "when", "default")
            if tag and tag[1] not in directives:
                kind = tag[1] or "div"
                parent = stack[-1][1] if stack else 0
                children.setdefault(parent, []).append(kind)
                stack.append((depth, number))
        if pending_each is not None:
            fail(name, f"{pending_each[0]}行目：eachの本文がない")
        for kinds in children.values():
            if "div" in kinds and any(re.fullmatch(r"h[1-6]|p|time", kind) for kind in kinds):
                fail(name, "同じ親にdivと見出し/p/timeが混在。役割ブロックへ分ける")
        if release and "cms" not in path.parts:
            for number, line in enumerate(text.splitlines(), 1):
                if not line.lstrip().startswith("//") and re.search(r"未設定|サンプル|テンプレート確認用", line):
                    fail(name, f"{number}行目：公開用原稿へ差し替える")

    source_paths = list((ROOT / "src/sass").glob("*.scss")) + list((ROOT / "src/pug").rglob("*.pug"))
    source_paths += [ROOT / "public/js/common.js", ROOT / "public/js/products.js", ROOT / "public/css/attach.css"]
    for path in source_paths:
        name = path.relative_to(ROOT)
        text = path.read_text(encoding="utf-8")
        clean = re.sub(r"/\*[\s\S]*?\*/|^\s*//.*$", "", text, flags=re.M)
        for class_name in FORBIDDEN_CLASSES:
            if re.search(r"\." + re.escape(class_name) + r"(?![\w-])", clean):
                fail(name, f"Bootstrap競合クラス：.{class_name}")
        if re.search(r'\.(?:addClass|toggleClass)\(["\']active["\']', clean):
            fail(name, "active状態はis-open等へ変更")
        for url in re.findall(r"https?://[^\s\"'<>]+", clean):
            host = urlsplit(url).hostname or ""
            if re.match(r"(?:sit-|kawachiku|bekko|kenmoku)", host) and host != PROJECT_IMAGE_HOST:
                fail(name, "参照案件の実ドメインが残っている")
        if path.suffix == ".scss":
            if not text.startswith('@charset "UTF-8";'):
                fail(name, "SCSS先頭にcharsetを指定")
            if "display: grid" in clean or "grid-template" in clean:
                fail(name, "レイアウトはFlex")
            if re.search(r"(?:top|left):\s*50%", clean) and "translate(" in clean:
                fail(name, "中央配置はinsetとmargin autoまたはFlex")
            if re.search(r"font-weight:\s*(?:[1-9]00)\b", clean):
                fail(name, "初期のシステムフォントではboldを使用")
            if clean.count("{") != clean.count("}"):
                fail(name, "括弧の対応が不正")

    for filename in ("src/sass/common_sp.scss", "src/sass/layout_sp.scss", "public/css/attach.css"):
        text = re.sub(r"/\*[\s\S]*?\*/|^\s*//.*$", "", read(filename), flags=re.M)
        depth = 0
        boundary = 0
        for match in re.finditer(r"[{}]", text):
            token = match.group()
            if token == "{":
                if depth == 0:
                    header = text[boundary:match.start()].rsplit(";", 1)[-1].strip()
                    width = re.search(r"^@media\s*\(max-width:\s*(\d+)px\)", header)
                    if not width or int(width[1]) > 1024:
                        fail(filename, "SPの最上位スタイルは1024px以下のmedia内に配置")
                depth += 1
            else:
                depth -= 1
                if depth < 0:
                    fail(filename, "閉じ括弧が多い")
                if depth == 0:
                    boundary = match.end()
        if depth != 0:
            fail(filename, "mediaの括弧が不正")

    head = read("src/pug/common/head.pug")
    if re.search(r"\bmedia\s*=", head):
        fail("head.pug", "CSSのmedia属性へ依存しない")
    generated_css = {"common.css", "common_sp.css", "layout.css", "layout_sp.css"}
    for asset in re.findall(r"['\"]((?:css|js)/[^'\"]+)['\"]", head + read("src/pug/site.pug")):
        if Path(asset).name not in generated_css and not (ROOT / "public" / asset).is_file():
            fail("head/site.pug", "アセットが存在しない：" + asset)
    image_path = re.search(r'\$imgPath:\s*["\']([^"\']+)["\']', read("src/sass/_mixin.scss"))
    if not image_path:
        fail("_mixin.scss", "画像パスを設定する")
    elif not image_path[1].startswith(("https://", "http://")) and not (ROOT / "public/css" / image_path[1]).resolve().is_dir():
        fail("_mixin.scss", "CSSからの相対画像パスが存在しない")
    if not (ROOT / "public/image/common/placeholder.svg").is_file():
        fail("public/image", "初期プレースホルダーがない")

    footer = read("src/pug/common/footer.pug")
    if "\t.footerMain\n\t\t.pageTop\n" not in footer:
        fail("footer.pug", "pageTopはfooterMainの直接の子")
    common_sp = read("src/sass/common_sp.scss")
    nav_match = re.search(r"\.navBox\s*\{([\s\S]*?)\.navBoxInner", common_sp)
    if not nav_match or "display: block" not in nav_match[1] or re.search(r"(?:visibility|opacity):", nav_match[1]):
        fail("common_sp.scss", "navBoxは表示を維持。開閉非表示はattachへ")
    attach = read("public/css/attach.css")
    for required in (".header .navBox", "visibility: hidden", "opacity: 0", ".header .navBox.is-open", "visibility: visible", "opacity: 1"):
        if required not in attach:
            fail("attach.css", "開閉制御が不足：" + required)

    settings = json.loads(read("cms/settings.json"))
    if set(settings) != set(CMS_KEYS):
        fail("cms/settings.json", "Instagram用ブロックの設定を揃える")
    for key in CMS_KEYS:
        entry = ROOT / "src/pug/cms" / (key + ".pug")
        if not entry.is_file() or "include /common/cmsBlocks.pug" not in entry.read_text():
            fail("CMS", key + "は共通mixinを使う")
    pages = list((ROOT / "src/pug/pages").rglob("*.pug"))
    for page in pages:
        text = page.read_text()
        for variable in ("root_path", "title", "description", "keywords", "page_name", "cmsMode"):
            if not re.search(r"- var " + variable + r"\s*=", text):
                fail(page.relative_to(ROOT), "ページ変数がない：" + variable)
        if "include /site.pug" not in text:
            fail(page.relative_to(ROOT), "site.pugを参照する")
        layout_name = "index" if page.parent.name == "pages" else page.parent.name
        layout = ROOT / "src/pug/layouts" / (layout_name + ".pug")
        if layout.is_file():
            body = layout.read_text()
            if "+pageKv(" not in body and not re.search(r"^\s*h1\b", body, re.M):
                fail(layout.relative_to(ROOT), "ページh1の配置を確認")
    if release:
        if "未設定" in read("PROJECT.md"):
            fail("PROJECT.md", "案件情報の未設定欄を確定する")
        config_path = ROOT / "cms/migration.json"
        if config_path.is_file():
            config = json.loads(config_path.read_text())
            if config.get("containerTag", "div") not in ("div", "section"):
                fail("cms/migration.json", "containerTagはdivまたはsectionにする")
    return errors


def main():
    parser = argparse.ArgumentParser(description=__doc__)
    parser.add_argument("--release", action="store_true", help="未設定・サンプル原稿も公開前確認")
    args = parser.parse_args()
    try:
        errors = check(args.release)
    except (OSError, ValueError, TypeError) as error:
        parser.exit(1, f"静的確認に失敗：{error}\n")
    if errors:
        parser.exit(1, "\n".join(errors) + "\n")
    print("静的確認OK：Pug構造・命名・SP範囲・アセット参照・Instagram共通mixin。")
    print("Pug/Sassビルド、画面、CMS実機の確認は別途ユーザーが行ってください。")


if __name__ == "__main__":
    main()
