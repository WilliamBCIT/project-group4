function Init(){
	// Initialize game window
	app = new PIXI.Application(720, 720, {backgroundColor:0x1099bb, antialias:true});
	app.renderer.autoResize = true;
	document.body.appendChild(app.view);
	
	// TODO: Loading bar

	// Import textures
	PIXI.loader.add("whiteBox", "images/WhiteBox.png")
			   .load(Init2);
}

function Init2(){
	// Proto{

	//sprite = GetSprite("whiteBox", 100, 100, .5, .5);
	

	unit = app.renderer.width / 10;

	for(let x = 0; x < 10; x++){
		for(let y = 0; y < 10; y++){
			GetSprite("whiteBox", x * unit, y * unit, 0, 0, unit, unit, (x + y) % 2 == 0 ? 0xEEEEEE : 0xEAEAEA);
		}
	}
	
	/*sprite.anchor.set(.5, .5);
	sprite.x = 200;
	sprite.y = 200;
	sprite.vx = 0;
	sprite.vy = 0;*/

	//	Proto}

	app.ticker.add(delta => Update(delta));
}

function Update(delta){ // Note: Runs/up to 60fps. Any real-world values should be multiplied by delta to scale properly w/ low FPS
	mousePos = app.renderer.plugins.interaction.mouse.global;
}

function GetSprite(name, posX = 0, posY = 0, anchorX = 0, anchorY = 0, scaleX = 1, scaleY = 1, tint = 0xFFFFFF){
	let sprite = new PIXI.Sprite(PIXI.loader.resources[name].texture);
	sprite.position.set(posX, posY);
	sprite.anchor.set(anchorX, anchorY);
	sprite.scale.set(scaleX, scaleY);
	sprite.tint = tint;
	app.stage.addChild(sprite);
	
	return sprite;
}

function GetObj(){

}

function SetPos(){

}