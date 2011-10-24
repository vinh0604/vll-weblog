<?php
session_start();
/**
 * @author Thanh Long
 * @copyright 2011
 */

$captcha = imagecreatefromgif('".base_url()."images/Border-88018.gif');

$black = imagecolorallocate($captcha, 0, 0, 0);
$white = imagecolorallocate($captcha, 225, 225, 225);
$red = imagecolorallocate($captcha, 225, 0 ,0);
$font = '".base_url()."images/VSWISC.ttf';

$string = md5(microtime()* mktime());
$text = substr($string, 0, 5);
$_SESSION['code'] = $text;

imagettftext($captcha, 30, 10, 30, 50, $red, $font, $text);

header('content-type: image/png');
imagepng($captcha);

imagedestroy($captcha);

?>