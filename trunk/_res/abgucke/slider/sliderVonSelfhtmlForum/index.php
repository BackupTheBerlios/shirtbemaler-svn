<html>
<head>
<title>slider</title>
</head>
<body>

<div style="position:absolute; margin-top:100; margin-left:100; height:22; width:160">
<div style="position:absolute; top:-1px; left:-1px;  height:1px; width:162px; background-color:#36309A; overflow:hidden"></div>
<div style="position:absolute; top:-1px; left:-1px;  height:17px; width:1px; background-color:#36309A; overflow:hidden"></div>
<div style="position:absolute; top:-1px; left:160px; height:17px; width:1px; background-color:#36309A; overflow:hidden"></div>
<div style="position:absolute; top:15px; left:-1px;  height:1px; width:162px; background-color:#36309A; overflow:hidden"></div>
<div id="slider" style="position:absolute; top:-4px; left:75px; height:20px; width:20px; cursor:pointer">
<img src="slider.png" width=12 height=20>
</div></div>

<script type="text/javascript">
var isDrag = false;
var sliderButton;
var xo = 0;

slider.onmousedown = mouseDownSlider;
//slider.onmousemove = mouseMoveSlider;
document.onmousemove = mouseMoveSlider;
  slider.onmouseup = mouseUpSlider;


function mouseUpSlider () {
   isDrag = false;
   return true;
}

// Abgreifen der Klick-Koordinate.
function mouseDownSlider(e) {
   isDrag = true;
   var tx = parseInt(slider.style.left);
   if (document.all) {
      xo = event.clientX + document.body.scrollLeft - tx;
   }
   else {
      xo = e.pageX - tx;
   }
   return false;
}

// Slider verändern.
function mouseMoveSlider(e) {
   if (isDrag) {
      if (document.all) {
         x = event.clientX + document.body.scrollLeft;
      }
      else {
         x = e.pageX;
      }
      x = Math.max(1, Math.min(x - xo, 146));
      slider.style.left = x;
   }
   return false;
}
</script>
</body>
</html>