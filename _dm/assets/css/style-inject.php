<?php
/**
 * Created by PhpStorm.
 * User: david1
 * Date: 20/05/2017
 * Time: 20:54
 */


$file = 'style-inject.php';
$css = '.home .site-content-contain {background: '.get_field('home-background','option').'}';
$css .= get_field('custom_css','option');

file_put_contents($file, $css);
