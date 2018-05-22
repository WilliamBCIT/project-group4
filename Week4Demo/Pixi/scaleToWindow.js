function scaleToWindow(canvas, backgroundColor) {
	canvas.style.width = "100%";
	
	
		document.getElementById("containerclass").classList.remove("container");
		document.getElementById("a2").classList.remove("section,responsive-image");
		document.getElementById("a1").classList.remove("valign-wrapper");
		/*
		$(canvas).outerWidth($(window).width() *0.9);

		$(canvas).outerHeight($(window).height() *0.9);
		*/
		
		clientHeight = document.getElementById('playframe').clientHeight;
		clientWidth = document.getElementById('playframe').clientWidth;
		
		
		
		$(canvas).outerWidth(clientWidth);

		$(canvas).outerHeight(clientHeight);
		
		var height = canvas.style.height;
		document.getElementById("leaderboard").style.height = height;
  }