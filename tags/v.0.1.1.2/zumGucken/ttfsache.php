<?php
Header ("Content-type: image/png");
$im = imagecreate (400, 30);
$black = ImageColorAllocate ($im, 0, 0, 0);
$white = ImageColorAllocate ($im, 255, 255, 255);
//$font = "./pristina.ttf";
$font = "../schriften/pristina.ttf";
ImageTTFText ($im, 20, 0, 10, 20, $white, $font,
              "Teste... Omega: &#937;");
imagepng($im);
ImageDestroy ($im);
?> 