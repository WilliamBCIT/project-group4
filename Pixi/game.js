function Init(){
	// Initialize game window
	app = new PIXI.Application(720, 720, {backgroundColor:0x1099bb, antialias:true});
	app.renderer.autoResize = true;
	document.body.appendChild(app.view);
	
	// TODO: Loading bar

	gridSize = 20;
	unit = app.renderer.width / gridSize;

	debugStyle = new PIXI.TextStyle({fontFamily:'Arial', fontSize:11});
	towers = new Array();
	food = new Array();
	frame = 0;
	score = 0;

	// Import textures
	PIXI.loader.add("whiteBox", "images/WhiteBox.png")
			   .load(Init2);
}

function Init2(){
	// Proto{

	for(let x = 0; x < gridSize; x++){
		for(let y = 0; y < gridSize; y++){
			let sprite = GetSprite("whiteBox", 0, 0, unit, unit, (x + y) % 2 == 0 ? 0xEEEEEE : 0xEAEAEA);
			sprite.interactive = true;
			sprite.on("pointerdown", PlaceTower);
			GetObj(sprite, x * unit, y * unit);
			//GetObj(new PIXI.Text(x + ":" + y, debugStyle), x * unit, y * unit);
		}
	}

	//	Proto}

	// Assuming one level
	track = [{x:9, y:4}, {x:8, y:4}, {x:7, y:4}, {x:6, y:4}, {x:5, y:4}, {x:5, y:5}, {x:4, y:5}, {x:3, y:5}, {x:3, y:6}, {x:3, y:7}, {x:4, y:7}, {x:10, y:4}, {x:11, y:4}, {x:12, y:4}, {x:13, y:4}, {x:14, y:4}, {x:14, y:3}, {x:14, y:2}, {x:15, y:2}, {x:16, y:2}, {x:16, y:8}, {x:15, y:8}, {x:14, y:8}, {x:13, y:8}, {x:13, y:9}, {x:5, y:7}, {x:6, y:7}, {x:7, y:7}, {x:8, y:6}, {x:8, y:7}, {x:9, y:6}, {x:10, y:6}, {x:10, y:7}, {x:10, y:8}, {x:10, y:9}, {x:10, y:10}, {x:11, y:10}, {x:12, y:10}, {x:13, y:10}, {x:13, y:11}, {x:13, y:12}, {x:13, y:13}, {x:12, y:13}, {x:11, y:13}, {x:10, y:13}, {x:9, y:13}, {x:8, y:13}, {x:8, y:12}, {x:7, y:12}, {x:6, y:12}, {x:6, y:11}, {x:6, y:10}, {x:6, y:9}, {x:5, y:9}, {x:4, y:9}, {x:4, y:10}, {x:4, y:11}, {x:4, y:12}, {x:3, y:13}, {x:2, y:13}, {x:4, y:13}, {x:4, y:14}, {x:4, y:15}, {x:4, y:16}, {x:5, y:16}, {x:6, y:16}, {x:6, y:15}, {x:7, y:15}, {x:8, y:15}, {x:9, y:15}, {x:10, y:15}, {x:10, y:16}, {x:10, y:17}, {x:10, y:18}, {x:9, y:18}, {x:8, y:18}, {x:7, y:18}, {x:6, y:18}, {x:5, y:18}, {x:4, y:18}, {x:3, y:18}, {x:12, y:14}, {x:12, y:15}, {x:12, y:16}, {x:213, y:16}, {x:14, y:16}, {x:15, y:16}, {x:15, y:15}, {x:15, y:14}, {x:15, y:13}, {x:616, y:13}, {x:17, y:13}, {x:17, y:8}, {x:17, y:2}, {x:2, y:2}, {x:3, y:2}, {x:4, y:2}, {x:5, y:2}, {x:6, y:2}, {x:7, y:2}, {x:8, y:2}, {x:8, y:3}, {x:13, y:16}, {x:16, y:13}, {x:2, y:18}];
	let trackV = [{x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:-1}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:0, y:-1}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:0, y:-1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:0, y:-1}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}];

	for(let i = 0; i < track.length; i++){
		track[i] = GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x999999), track[i].x * unit, track[i].y * unit);
		track[i].type = "track";
		track[i].interactive = true;
		
		if(i < trackV.length){
			track[i].vx = trackV[i].x;
			track[i].vy = trackV[i].y;

			// Displays a little arrow pointing in the direction the track pushes
			/* Proto */ GetObj(new PIXI.Text(track[i].vx > 0 ? ">" : track[i].vx < 0 ? "<" : track[i].vy > 0 ? "v" : track[i].vy < 0 ? "^" : "", debugStyle), track[i].x, track[i].y);
		}
	}

	garbage = GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x555555), 1 * unit, 18 * unit);

	app.ticker.add(delta => Update(delta)); // Defines the function that gets called every frame

	/* Proto */ fpsText = GetObj(new PIXI.Text("", debugStyle), 10, 10);
	/* Proto */ scoreText = GetObj(new PIXI.Text("Score: 0", debugStyle), 10, 25);
}

function Update(delta){ // Note: Runs at/up to 60fps. Any real-world changes across multiple frames (ie: movement / rotation) should be multiplied by delta to scale properly w/ low FPS
	/* Proto */ fpsText.text = Math.round(delta * 60);
	
	mousePos = app.renderer.plugins.interaction.mouse.global;

	if(frame == 15){
		frame = 1;

		// TODO: Handle food as particles

		/* Proto */ food.push(GetFood(GetObj(GetSprite("whiteBox", -1, -1, unit / 3, unit / 3, Math.random() * 0xFFFFFF), (16.7 + Math.random() * .6) * unit, (1.7 + Math.random() * .6) * unit), "apple", "fruit"));
	}else{
		frame++;
	}

	// TODO: Properly centre food along tracks
	for(let i = 0, j = 0, maxDistSqrd = unit * unit / 1.8; i < food.length; i++){
		for(j = 0; j < track.length; j++){
			if(Math.pow(track[j].x - food[i].x, 2) + Math.pow(track[j].y - food[i].y, 2) <= maxDistSqrd){
				food[i].x += track[j].vx * delta;
				food[i].y += track[j].vy * delta;
			}
		}
	}

	for(let j = 0, i = 0, l = 0, maxDistSqrd = unit * unit * 2.25; j < towers.length; j++){
		let total = 0;

		for(i = 0; i < towers[j].curr.length; i++){ // Increments counters of currently-being-processed food
			for(l = towers[j].curr[i].length - 1; l >= 0; l--){
				towers[j].curr[i][l] += delta;
	
				if(towers[j].curr[i] > towers[j].processTime){ // Removes finished food
					towers[j].curr[i].splice(i, 1);
					towers[j].finished[i]++;
					towers[j].currCount--;
				}
			}

			if(towers[j].finished[i] == towers[j].max[i]){
				total++;
				towers[j].curr[i] = [];
			}
		}

		if(total == towers[j].allow.length){ // Increases score if tower is finished, and clears it
			for(i = 0; i < towers[j].curr.length; i++){
				towers[j].finished[i] = 0;
			}

			AdjustScore(towers[j].value);
		}

		// TODO: Display currently-being-processed foods
		
		for(i = 0; i < food.length; i++){
			let l = towers[j].allow.findIndex(function(element){
				return element == "any" || food[i].type == element || food[i].subType == element;
			});

			if(l != -1 && towers[j].finished[l] + towers[j].curr[l].length < towers[j].max[l] && towers[j].currCount < towers[j].atOnce && Math.pow(towers[j].x - food[i].x, 2) + Math.pow(towers[j].y - food[i].y, 2) <= maxDistSqrd){
				towers[j].curr[l].push(0);
				food[i].parent.removeChild(food[i]);
				food.splice(i, 1);
				towers[j].currCount++;
			}
		}
	}
}

/*if(tower allows any & tower.curr < max){
	tower.curr++;
}*/

function PlaceTower(){
	var tower = GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x993388), this.x, this.y);
	tower.type = "compost";
	tower.allow = ["any"];
	tower.max = [5];
	tower.finished = [0];
	tower.curr = [[]];
	tower.currCount = 0;
	tower.atOnce = 1;
	tower.processTime = 60; // NOTE: Stored in frames
	tower.cost = 750;
	tower.value = 100;
	tower.interactive = true;

	towers.push(tower);
}

//	Proto{

function TrackBuilder(){ // Helps laying track
	var pos = {x:this.x / unit, y:this.y / unit};

	if(!track.includes(pos)){
		track.push(pos);
		GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x999999), pos.x * unit, pos.y * unit);
		console.log(", {x:" + pos.x + ", y:" + pos.y + "}");
	}
}

//	Proto}

function AdjustScore(increaseBy){
	score += increaseBy;
	scoreText.text = "Score: " + score;
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

function GetFood(obj, subType, type){
	obj.type = type;
	obj.subType = subType;

	return obj;
}