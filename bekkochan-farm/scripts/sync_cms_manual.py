#!/usr/bin/env python3
"""Synchronize the offline manual's template catalog with cms/blog-blocks.json."""
import json
import re
from pathlib import Path

ROOT = Path(__file__).resolve().parents[1]


def main():
    catalog = json.loads((ROOT / "cms/blog-blocks.json").read_text(encoding="utf-8"))
    payload = json.dumps(catalog, ensure_ascii=False).replace("<", "\\u003c")
    path = ROOT / "docs/cms-blog-manual.html"
    text = path.read_text(encoding="utf-8")
    pattern = r'(<script id="blockCatalog" type="application/json">)[\s\S]*?(</script>)'
    matches = list(re.finditer(pattern, text))
    if len(matches) != 1:
        raise ValueError("マニュアル内のblockCatalogは1件である必要があります。")
    updated = re.sub(pattern, lambda match: match[1] + payload + match[2], text)
    path.write_text(updated, encoding="utf-8")
    print("マニュアルの生成テンプレートを同期しました。説明本文は必要に応じて別途更新してください。")


if __name__ == "__main__":
    main()
