<!DOCTYPE html>
<html lang="fa">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
    <?php echo '<script>mehraban_ajax_url={url:"'.admin_url( 'admin-ajax.php' ).'"}</script>'; ?>
    <script src="<?php Assets::js('jQuery.js'); ?>"></script>
    <script src="<?php Assets::js('vue.js'); ?>"></script>
    <link rel="stylesheet" href="<?php Assets::css('bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php Assets::css('uikit-rtl.min.css'); ?>">
    <link rel="stylesheet" href="<?php Assets::css('custom.css'); ?>">
</head>
<body>
