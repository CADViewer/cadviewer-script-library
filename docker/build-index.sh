#!/bin/sh
# Writes the landing page listing the html/*_12.html samples (run at image build).
cd /var/www/html/cadviewer/html
cat <<'HEAD'
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CADViewer JavaScript Samples</title>
<style>
body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif; max-width: 760px; margin: 40px auto; padding: 0 16px; color: #1f2937; }
h1 { font-size: 26px; } li { margin: 10px 0; } a { color: #0b5cad; }
.note { color: #6b7280; font-size: 14px; }
</style>
</head>
<body>
<h1>CADViewer JavaScript Samples</h1>
<p>Plain JavaScript samples from the <a href="https://github.com/CADViewer/cadviewer-script-library">cadviewer-script-library</a>, running with the PHP handlers and the AutoXchange converter.</p>
<ul>
HEAD
for f in *_12.html; do
  title=$(grep -o '<title>[^<]*' "$f" | head -1 | sed 's/<title>//')
  echo "  <li><a href=\"/cadviewer/html/$f\">${title:-$f}</a> <span class=\"note\">($f)</span></li>"
done
cat <<'TAIL'
</ul>
<p class="note">Documentation: <a href="https://cadviewer.com/cadviewertechdocs/">CADViewer TechDocs</a></p>
</body>
</html>
TAIL
