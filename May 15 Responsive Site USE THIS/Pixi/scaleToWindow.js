function scaleToWindow(canvas, backgroundColor) {
canvas.style.width = "100%";
  
    $(canvas).outerHeight($(window).height()-$(canvas).offset().top- Math.abs($(canvas).outerHeight(true) - $(canvas).outerHeight()));
  }