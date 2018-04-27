function Init(){
	// Initialize game window
	app = new PIXI.Application(720, 720, {backgroundColor:0x1099bb, antialias:true});
	app.renderer.autoResize = true;
	document.body.appendChild(app.view);
	
	// TODO: Loading bar

	gridSize = 20;
	unit = app.renderer.width / gridSize;

	debugStyle = new PIXI.TextStyle({fontFamily:'Arial', fontSize:11});

	// Import textures
	PIXI.loader.add("whiteBox", "images/WhiteBox.png")
			   .load(Init2);
}

function Init2(){
	// Proto{

	for(let x = 0; x < gridSize; x++){
		for(let y = 0; y < gridSize; y++){
			let sprite = GetSprite("whiteBox", 0, 0, unit, unit, (x + y) % 2 == 0 ? 0xEEEEEE : 0xEAEAEA);
			GetObj(sprite, x * unit, y * unit);
			//GetObj(new PIXI.Text(x + ":" + y, debugStyle), x * unit, y * unit);
		}
	}

	// Assuming one level
	track = [{x:9, y:4}, {x:8, y:4}, {x:7, y:4}, {x:6, y:4}, {x:5, y:4}, {x:5, y:5}, {x:4, y:5}, {x:3, y:5}, {x:3, y:6}, {x:3, y:7}, {x:4, y:7}, {x:10, y:4}, {x:11, y:4}, {x:12, y:4}, {x:13, y:4}, {x:14, y:4}, {x:14, y:3}, {x:14, y:2}, {x:15, y:2}, {x:16, y:2}, {x:16, y:8}, {x:15, y:8}, {x:14, y:8}, {x:13, y:8}, {x:13, y:9}, {x:5, y:7}, {x:6, y:7}, {x:7, y:7}, {x:8, y:6}, {x:8, y:7}, {x:9, y:6}, {x:10, y:6}, {x:10, y:7}, {x:10, y:8}, {x:10, y:9}, {x:10, y:10}, {x:11, y:10}, {x:12, y:10}, {x:13, y:10}, {x:13, y:11}, {x:13, y:12}, {x:13, y:13}, {x:12, y:13}, {x:11, y:13}, {x:10, y:13}, {x:9, y:13}, {x:8, y:13}, {x:8, y:12}, {x:7, y:12}, {x:6, y:12}, {x:6, y:11}, {x:6, y:10}, {x:6, y:9}, {x:5, y:9}, {x:4, y:9}, {x:4, y:10}, {x:4, y:11}, {x:4, y:12}, {x:3, y:13}, {x:2, y:13}, {x:4, y:13}, {x:4, y:14}, {x:4, y:15}, {x:4, y:16}, {x:5, y:16}, {x:6, y:16}, {x:6, y:15}, {x:7, y:15}, {x:8, y:15}, {x:9, y:15}, {x:10, y:15}, {x:10, y:16}, {x:10, y:17}, {x:10, y:18}, {x:9, y:18}, {x:8, y:18}, {x:7, y:18}, {x:6, y:18}, {x:5, y:18}, {x:4, y:18}, {x:3, y:18}, {x:12, y:14}, {x:12, y:15}, {x:12, y:16}, {x:213, y:16}, {x:14, y:16}, {x:15, y:16}, {x:15, y:15}, {x:15, y:14}, {x:15, y:13}, {x:616, y:13}, {x:17, y:13}, {x:17, y:8}, {x:17, y:2}, {x:2, y:2}, {x:3, y:2}, {x:4, y:2}, {x:5, y:2}, {x:6, y:2}, {x:7, y:2}, {x:8, y:2}, {x:8, y:3}, {x:13, y:16}, {x:16, y:13}, {x:2, y:18}];
	let trackV = [{x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:-1}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:0, y:-1}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:0, y:-1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:0, y:-1}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}];

	for(let i = 0; i < track.length; i++){
		track[i] = GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x999999), track[i].x * unit, track[i].y * unit);
		track[i].type = "track";
		
		if(i < trackV.length){
			track[i].vx = trackV[i].x;
			track[i].vy = trackV[i].y;
			GetObj(new PIXI.Text(track[i].vx > 0 ? ">" : track[i].vx < 0 ? "<" : track[i].vy > 0 ? "v" : track[i].vy < 0 ? "^" : "", debugStyle), track[i].x, track[i].y);
		}
	}

	garbage = GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x555555), 1 * unit, 18 * unit);

	//	Proto}

	app.ticker.add(delta => Update(delta));
}

function TrackBuilder(){ // Helps laying track
	var pos = {x:this.x / unit, y:this.y / unit};

	if(!track.includes(pos)){
		track.push(pos);
		GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x999999), pos.x * unit, pos.y * unit);
		console.log(", {x:" + pos.x + ", y:" + pos.y + "}");
	}
}

function Update(delta){ // Note: Runs/up to 60fps. Any real-world values should be multiplied by delta to scale properly w/ low FPS
	mousePos = app.renderer.plugins.interaction.mouse.global;
}

function GetSprite(name, anchorX = 0, anchorY = 0, scaleX = 1, scaleY = 1, tint = 0xFFFFFF){
	let sprite = new PIXI.Sprite(PIXI.loader.resources[name].texture);
	sprite.anchor.set(anchorX, anchorY);
	sprite.scale.set(scaleX, scaleY);
	sprite.tint = tint;
	
	return sprite;
}

function GetObj(obj, posX = 0, posY = 0, parent = app.stage){
	obj.x = posX;
	obj.y = posY;
	parent.addChild(obj);
	
	return obj;
}

function SetPos(){ // TODO

}