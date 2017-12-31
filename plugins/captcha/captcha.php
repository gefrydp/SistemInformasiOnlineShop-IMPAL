<?php
    session_start();
    $width      = 75;
    $height     = 40;
    $length     = 3;
    $baseList   = '1234567890';
    $code       = "";
    $counter    = 0;
    $image      = @imagecreate($width, $height) or die('Captcha Gagal 1!');

    for($i=0; $i<10; $i++){
       imageline($image, 
             mt_rand(0,$width), mt_rand(0,$height), 
             mt_rand(0,$width), mt_rand(0,$height), 
             imagecolorallocate($image, mt_rand(150,255), 
                                        mt_rand(150,255), 
                                        mt_rand(150,255))) or die('Captcha Gagal 2!'); 
    }

    for($i=0, $x=0; $i<$length; $i++){
       $actChar = substr($baseList, rand(0, strlen($baseList)-1), 1);
       $x += 10 + mt_rand(0,10);
       imagechar($image, mt_rand(3,5), $x, mt_rand(5,20), $actChar, 
          imagecolorallocate($image, mt_rand(0,155), mt_rand(0,155), mt_rand(0,155))) or die('Captcha Gagal 3!');
       $code .= strtolower($actChar) or die('Captcha Gagal 4!');
    }

    header('Content-Type: image/jpeg');
    imagejpeg($image);
    imagedestroy($image);
    $_SESSION['captcha_session'] = $code;
?> 