<?php
session_start();

// Generate a random CAPTCHA code
$captcha_code = substr(md5(rand()), 0, 6);
$_SESSION['captcha_code'] = $captcha_code;

// Create the image
$width = 100;
$height = 30;
$image = imagecreatetruecolor($width, $height);

// Set background color
$bg_color = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $bg_color);

// Set text color
$text_color = imagecolorallocate($image, 0, 0, 0);

// Add the CAPTCHA text to the image
imagestring($image, 5, 10, 5, $captcha_code, $text_color);

// Output the image
header('Content-type: assets/download.jpg');
imagepng($image);
imagedestroy($image);
?>
