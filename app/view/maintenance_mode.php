<?php
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=settings('maintenance_mode_title')?></title>
</head>
<body>
<style>
    body { text-align: center; padding: 150px; }
    h1 { font-size: 50px; }
    body { font: 20px Helvetica, sans-serif; color: #333; }
    .article{ display:flex; justify-content:center; align-items:center; }
    a { color: #dc8100; text-decoration: none; }
    a:hover { color: #333; text-decoration: none; }
</style>
<h1>We&rsquo;ll be back soon!</h1>
<div class="article">
    <p><?=settings('maintenance_mode_description')?></p>
</div>
</body>
</html>
