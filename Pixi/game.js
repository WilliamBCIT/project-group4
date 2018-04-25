function Init(){
	// Initialize game window
	app = new PIXI.Application(720, 720, {backgroundColor:0x1099bb, antialias:true});
	app.renderer.autoResize = true;
	document.body.appendChild(app.view);
	
	// TODO: Loading bar

	// Import textures
	PIXI.loader.add("whiteBox", "images/whiteBox.png")
			   .load(Init2);
}

function Init2(){
	// Proto{

	sprite = new PIXI.Sprite(PIXI.loader.resources["whiteBox"].texture);
	app.stage.addChild(sprite);
	
	sprite.anchor.set(.5, .5);
	sprite.x = 200;
	sprite.y = 200;
	sprite.vx = 0;
	sprite.vy = 0;

	//	Proto}

	app.ticker.add(delta => Update(delta));
}

function Update(delta){ // Note: Runs/up to 60fps. Any real-world values should be multiplied by delta to scale properly w/ low FPS
	sprite.x += sprite.vx * delta;
	sprite.y += sprite.vy * delta;
	mousePos = app.renderer.plugins.interaction.mouse.global;
}