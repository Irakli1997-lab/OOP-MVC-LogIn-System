<!-- OOP MVC LogIn System -->
<!-- Irakli Gzirishvili -->
<!-- 15/10/2021 -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo 'OOP MVC LogIn System';?></title>
    <?php if(USERID()): ?>
    <link rel="ICON" href="<?php echo URLROOT ?>/public/resources/icon/User.png" type="image/ico">
    <?php else: ?>
    <link rel="ICON" href="<?php echo URLROOT ?>/public/resources/icon/Lock.png" type="image/ico">
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT ?>/public/css/Reset.css">
    <link rel="stylesheet" type="text/css" href="<?php echo URLROOT ?>/public/css/STYLE.css">
    <script src="<?php echo URLROOT ?>/public/javascript/jQuery.js" type="text/javascript"></script>
    <script src="<?php echo URLROOT ?>/public/javascript/gziro.js" type="text/javascript"></script>
</head>
<body class='b0'>
    <img src="<?php echo URLROOT ?>/public/resources/img/earth.webp" alt="background">
<header id='h0'>
    <p id='h0_lbl'><?php echo 'OOP MVC LogIn System';?></p>
</header>
<section id='s0'>