Quick cache-busting & testing guide

What I changed
- `header.php`: ASSET_VERSION is now derived from the latest modification time of files in `css/`, `js/` and `assets/` (images/fonts). This produces `?v=<timestamp>` on your static assets automatically.
- `.htaccess`: added caching rules to set long caching for static assets and short/no-cache for HTML/PHP.

Why
- When you update CSS/JS/images/fonts, the latest file mtime changes and `?v=` changes. Browsers will request the new file instead of using an old cached copy.

How to test locally (Windows / PowerShell + XAMPP)
1) Touch (update) a file's mtime (PowerShell):

```powershell
# update mtime of a CSS file
(Get-Item 'c:\xampp\htdocs\imac\css\slider.css').LastWriteTime = Get-Date
```

2) Open your page in the browser and hard refresh (Ctrl+F5). Alternatively, view the page source and verify `?v=` on asset URLs changed to the current timestamp.

3) Use curl to inspect served HTML (shows the HTML including `?v=` values):

```powershell
curl.exe http://localhost/imac/ -UseBasicParsing
```

4) Verify response headers for a static asset (the `.htaccess` rules apply). Example (PowerShell):

```powershell
# Check headers for a CSS file
curl.exe -I http://localhost/imac/css/style.min.css?v=123 -UseBasicParsing
```

You should see `Cache-Control: public, max-age=31536000, immutable` for static assets.

Notes
- If your Apache instance disallows `.htaccess` overrides, add the rules to the main vhost configuration instead.
- The auto-version uses file modification times. If you have a build step that bundles/minifies assets into different folders, you may want to include those build outputs in the scanned paths or update ASSET_VERSION manually in that case.

If you want, I can:
- Add the same version query to any direct script tags you have that currently omit `?v=`.
- Add a small admin script to force a cache-bust (bump a manual version file).
- Apply the same approach to other asset directories.
