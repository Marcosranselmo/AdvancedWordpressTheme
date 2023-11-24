<?php
/**
 * Header file.
 * 
 * @package Aquila
 */

 ?>

<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="style.css">
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header>Header</header>