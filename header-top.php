<?php
// ----------------------------------------------------
// Smart Last-Modified + 304 Not Modified Handler
// ----------------------------------------------------
$sourceFile = $_SERVER['SCRIPT_FILENAME'];
if (file_exists($sourceFile)) {
    $mtime = filemtime($sourceFile);
    $lastMod = gmdate('D, d M Y H:i:s', $mtime) . ' GMT';
    header("Last-Modified: $lastMod");
    header("Cache-Control: public, max-age=0, must-revalidate");

    // Compare If-Modified-Since header from client
    if (!headers_sent() && isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
        $ifModifiedSince = strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);
        if ($ifModifiedSince !== false && $ifModifiedSince >= $mtime) {
            // Stop PHP execution early and return 304
            header($_SERVER['SERVER_PROTOCOL'] . ' 304 Not Modified', true, 304);
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <base href="https://imacengineering.com/">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://www.googletagmanager.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>