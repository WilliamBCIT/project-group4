const foodTypes = {
	ANY:0,
	LIQUID:1,
		WATER:11,
		OIL:12,
	VEGETABLE:2,
		POTATO:21,
		CARROT:22,
		CABBAGE:23,
	FRUIT:3,
		BANANA:31,
		ORANGE:32,
		APPLE:33,
	BREAD:4,
	MEAT:5,
		BONE:51,
		STEAK:52,
		PORK:53
};

const towerTypes = {
	COMPOST:1,
	ANIMALS:2,
	FACTORY:3,
	DONATION:4,
	RECYCLE:5,
	PURIFIER:6
};

function Init(){
	// Initialize game window
	app = new PIXI.Application(720, 720, {backgroundColor:0x1099bb, antialias:true});
	app.renderer.autoResize = true;
	document.getElementById("playframe").appendChild(app.view);
	
	// TODO: Loading bar

	gridSize = 20;
	unit = app.renderer.width / gridSize;

	debugStyle = new PIXI.TextStyle({fontFamily:'Arial', fontSize:11});
	towers = new Array();
	food = new Array();
	frame = 0;
	score = 0;

	// Import textures
	PIXI.loader.add("logo", "images/logoWhiteBackground.png")
			   .add("playB", "images/PlayButton.png")
			   .add("lBoardsB", "images/LeaderboardsButton.png")
			   .load(Init2);
}

function Init2(){
	mmLogo = GetObj(GetSprite("logo", .5, .5, .3, .3), 360, 240);
	mmPlay = GetObj(GetSprite("playB", .5, .5, 1.5, 1.5), 360, 490);
	mmLBoards = GetObj(GetSprite("lBoardsB", .5, .5, 1.5, 1.5), 360, 590);

	mmPlay.interactive = true;
	mmPlay.buttonMode = true;
	mmPlay.on("pointerdown", StartGame);
	mmLBoards.interactive = true;
	mmLBoards.buttonMode = true;
	mmLBoards.on("pointerdown", ShowLBoards);
}

function ShowLBoards(){
	// TODO
}

function OpenPauseMenu(){
	//pm
}

function ClosePauseMenu(){
	//pm
}

function StartGame(){
	Destroy(mmLogo);
	Destroy(mmPlay);
	Destroy(mmLBoards);

	// TODO: Loading bar

	gridSize = 18;
	unit = app.renderer.width / gridSize;

	debugStyle = new PIXI.TextStyle({fontFamily:'Arial', fontSize:11});
	towers = new Array();
	food = new Array();
	frame = 0;
	lives = 100;
	score = 0;
	money = 700;
	wantToPlace = "";

	// Import textures
	PIXI.loader.add("whiteBox", "images/WhiteBox.png")
			   .add("compost", "images/towerCompost.png")
			   .add("donate", "images/towerDonate.png")
			   .add("animals", "images/towerFarm.png")
			   .add("factory", "images/towerFuel.png")
			   .add("recycle", "images/towerRecycle.png")
			   .add("purify", "images/towerWater.png")
			   .add("garbage", "images/garbageBin.png")
			   .load(StartGame2);
}

function StartGame2(){
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
	track = [{x:9, y:4}, {x:8, y:4}, {x:7, y:4}, {x:6, y:4}, {x:5, y:4}, {x:5, y:5}, {x:4, y:5}, {x:3, y:5}, {x:3, y:6}, {x:3, y:7}, {x:4, y:7}, {x:10, y:4}, {x:11, y:4}, {x:12, y:4}, {x:13, y:4}, {x:14, y:4}, {x:14, y:3}, {x:14, y:2}, {x:15, y:2}, {x:16, y:2}, {x:16, y:8}, {x:15, y:8}, {x:14, y:8}, {x:13, y:8}, {x:13, y:9}, {x:5, y:7}, {x:6, y:7}, {x:7, y:7}, {x:8, y:6}, {x:8, y:7}, {x:9, y:6}, {x:10, y:6}, {x:10, y:7}, {x:10, y:8}, {x:10, y:9}, {x:10, y:10}, {x:11, y:10}, {x:12, y:10}, {x:13, y:10}, {x:13, y:11}, {x:13, y:12}, {x:13, y:13}, {x:12, y:13}, {x:11, y:13}, {x:10, y:13}, {x:9, y:13}, {x:8, y:13}, {x:8, y:12}, {x:7, y:12}, {x:6, y:12}, {x:6, y:11}, {x:6, y:10}, {x:6, y:9}, {x:5, y:9}, {x:4, y:9}, {x:4, y:10}, {x:4, y:11}, {x:4, y:12}, {x:3, y:13}, {x:2, y:13}, {x:4, y:13}, {x:4, y:14}, {x:4, y:15}, {x:4, y:16}, {x:5, y:16}, {x:6, y:16}, {x:6, y:15}, {x:7, y:15}, {x:8, y:15}, {x:9, y:15}, {x:10, y:15}, {x:10, y:16}, {x:10, y:17}, {x:10, y:18}, {x:9, y:18}, {x:8, y:18}, {x:7, y:18}, {x:6, y:18}, {x:5, y:18}, {x:4, y:18}, {x:3, y:18}, {x:12, y:14}, {x:12, y:15}, {x:12, y:16}, {x:213, y:16}, {x:14, y:16}, {x:15, y:16}, {x:15, y:15}, {x:15, y:14}, {x:15, y:13}, {x:616, y:13}, {x:17, y:13}, {x:17, y:8}, {x:17, y:2}, {x:2, y:2}, {x:3, y:2}, {x:4, y:2}, {x:5, y:2}, {x:6, y:2}, {x:7, y:2}, {x:8, y:2}, {x:8, y:3}, {x:13, y:16}, {x:16, y:13}/*, {x:2, y:18}*/];
	let trackV = [{x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:-1}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:0, y:-1}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:1, y:0}, {x:1, y:0}, {x:0, y:-1}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:-1}, {x:0, y:-1}, {x:0, y:-1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, {x:-1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:1, y:0}, {x:0, y:1}, {x:0, y:1}, {x:-1, y:0}, {x:-1, y:0}, /*{x:-1, y:0}*/];

	for(let i = 0; i < track.length; i++){
		track[i] = GetObj(GetSprite("whiteBox", 0, 0, unit, unit, 0x999999), (track[i].x - 1) * unit, (track[i].y - 1) * unit);
		track[i].type = "track";
		track[i].interactive = true;
		
		if(i < trackV.length){
			track[i].vx = trackV[i].x;
			track[i].vy = trackV[i].y;

			// Displays a little arrow pointing in the direction the track pushes
			/* Proto */ GetObj(new PIXI.Text(track[i].vx > 0 ? ">" : track[i].vx < 0 ? "<" : track[i].vy > 0 ? "v" : track[i].vy < 0 ? "^" : "", debugStyle), track[i].x, track[i].y);
		}
	}

	garbage = GetObj(GetSprite("garbage", 0, 0, 1.25, 1.25, 0x555555), 1 * unit, 17 * unit);

	app.ticker.add(delta => Update(delta)); // Defines the function that gets called every frame

	/* Proto */ fpsText = GetObj(new PIXI.Text("", debugStyle), 10, 10);
	/* Proto */ livesText = GetObj(new PIXI.Text("Lives: " + lives, debugStyle), 10, 25);
	/* Proto */ scoreText = GetObj(new PIXI.Text("Score: " + score, debugStyle), 10, 40);
	/* Proto */ moneyText = GetObj(new PIXI.Text("Money: " + money, debugStyle), 10, 55);

	/* Proto */ wantToPlace = towerTypes.COMPOST;
}

function Update(delta){ // Note: Runs at/up to 60fps. Any real-world changes across multiple frames (ie: movement / rotation) should be multiplied by delta to scale properly w/ low FPS
	/* Proto */ fpsText.text = Math.round(1 / delta * 60) + " fps";
	
	mousePos = app.renderer.plugins.interaction.mouse.global;

	if(frame == 15){
		frame = 0;

		// TODO: Handle food as particles

		/* Proto */ food.push(GetFood(GetObj(GetSprite("whiteBox", -2 / 5, -2 / 5, unit * 3 / 5, unit * 3 / 5, Math.random() * 0xFFFFFF), (16) * unit, (0.7 + Math.random() * .6) * unit), "apple", "fruit"));
	}else{
		frame++;
	}

	// TODO: Properly centre food along tracks
	for(let i = 0, j = 0, maxDistSqrd = unit * unit / 2; i < food.length; i++){
		if(Math.abs(Math.pow(garbage.x - food[i].x, 2)) + Math.abs(Math.pow(garbage.y - food[i].y, 2)) <= maxDistSqrd){ // Destroy if near garbage can
			Destroy(food[i]);
			food.splice(i, 1);
			AdjustLives(-1);
		}else{
			for(j = 0; j < track.length; j++){
				if(Math.abs(Math.pow(track[j].x - food[i].x, 2)) + Math.abs(Math.pow(track[j].y - food[i].y, 2)) <= maxDistSqrd){ // Move if near track
					food[i].x += track[j].vx * delta;
					food[i].y += track[j].vy * delta;
				}
			}
		}
	}

	for(let j = 0, i = 0, l = 0, maxDistSqrd = unit * unit * 2.5; j < towers.length; j++){
		let total = 0;

		for(i = 0; i < towers[j].curr.length; i++){ // Increments counters of currently-being-processed food
			for(l = towers[j].curr[i].length - 1; l >= 0; l--){
				towers[j].curr[i][l] += delta;

				if(towers[j].curr[i][l] > towers[j].processTime){ // Removes finished food
					towers[j].curr[i].splice(l, 1);
					towers[j].finished[i]++;
					towers[j].currCount--;
				}
			}

			if(towers[j].finished[i] == towers[j].max[i]){
				total++;
				towers[j].curr[i] = [];
			}
		}
		
		if(total == towers[j].max.length){ // Increases score if tower is finished, and clears it
			for(i = 0; i < towers[j].max.length; i++){
				towers[j].curr[i] = [];
				towers[j].finished[i] = 0;
			}

			AdjustScore(towers[j].value);
		}

		// TODO: Display currently-being-processed foods

		if(towers[j].ready < 3){
			towers[j].ready++;
		}else{
			for(i = 0; i < food.length && towers[j].ready == 3; i++){
				let l = towers[j].allow.findIndex(function(element){
					return element == foodTypes.ANY || food[i].type == element || food[i].subType == element;
				});

				if(towers[j].ignore.includes(food[i].type) || towers[j].ignore.includes(food[i].subType)){
					l = -1;
				}

				if(l != -1 && towers[j].finished[l] + towers[j].curr[l].length < towers[j].max[l] && towers[j].currCount < towers[j].atOnce && Math.abs(Math.pow(towers[j].x - food[i].x, 2)) + Math.abs(Math.pow(towers[j].y - food[i].y, 2)) <= maxDistSqrd){
					towers[j].curr[l].push(0);
					Destroy(food[i]);
					food.splice(i, 1);
					towers[j].currCount++;
					towers[j].ready = 0;
				}
			}
		}
	}
}

function PlaceTower(){
	var tower = false;

	if(wantToPlace == towerTypes.COMPOST){
		if(Buy(250)){
			tower = GetObj(GetSprite("compost", 0, 0, 1.25, 1.25), this.x, this.y);
			tower.allow = [foodTypes.ANY];
			tower.ignore = [];
			tower.max = [5]; // If just one entry, then all entries in .allow will contribute towards the same max count, otherwise, individual maxes will be used
			tower.finished = [0]; // MUST contain a 0 for every entry in .max[]
			tower.curr = [[]]; // MUST contain an empty array for every entry in .max[]
			tower.atOnce = 5; // Amount of concurrent users
			tower.processTime = 360; // Frames required to process one food item
			tower.value = 85; // Amount of score and money gained when all maxes have been met
		}
	}else if(wantToPlace == towerTypes.ANIMALS){
		if(Buy(770)){
			tower = GetObj(GetSprite("animals", 0, 0, 1.25, 1.25), this.x, this.y);
			tower.allow = [foodTypes.MEAT];
			tower.ignore = [];
			tower.max = [4]; // If just one entry, then all entries in .allow will contribute towards the same max count, otherwise, individual maxes will be used
			tower.finished = [0]; // MUST contain a 0 for every entry in .max[]
			tower.curr = [[]]; // MUST contain an empty array for every entry in .max[]
			tower.atOnce = 4; // Amount of concurrent users
			tower.processTime = 20; // Frames required to process one food item
			tower.value = 80; // Amount of score and money gained when all maxes have been met
		}
	}else if(wantToPlace == towerTypes.FACTORY){
		if(Buy(1200)){
			tower = GetObj(GetSprite("factory", 0, 0, 1.25, 1.25), this.x, this.y);
			tower.allow = [foodTypes.ANY];
			tower.ignore = [foodTypes.WATER, foodTypes.BREAD];
			tower.max = [30]; // If just one entry, then all entries in .allow will contribute towards the same max count, otherwise, individual maxes will be used
			tower.finished = [0]; // MUST contain a 0 for every entry in .max[]
			tower.curr = [[]]; // MUST contain an empty array for every entry in .max[]
			tower.atOnce = 2; // Amount of concurrent users
			tower.processTime = 30; // Frames required to process one food item
			tower.value = 700; // Amount of score and money gained when all maxes have been met
		}
	}else if(wantToPlace == towerTypes.DONATION){
		if(Buy(400)){
			tower = GetObj(GetSprite("donate", 0, 0, 1.25, 1.25), this.x, this.y);
			tower.allow = [foodTypes.VEGETABLE, foodTypes.FRUIT, foodTypes.BREAD];
			tower.ignore = [];
			tower.max = [2]; // If just one entry, then all entries in .allow will contribute towards the same max count, otherwise, individual maxes will be used
			tower.finished = [0]; // MUST contain a 0 for every entry in .max[]
			tower.curr = [[]]; // MUST contain an empty array for every entry in .max[]
			tower.atOnce = 1; // Amount of concurrent users
			tower.processTime = 45; // Frames required to process one food item
			tower.value = 50; // Amount of score and money gained when all maxes have been met
		}
	}else if(wantToPlace == towerTypes.RECYCLE){
		if(Buy(650)){
			tower = GetObj(GetSprite("recycle", 0, 0, 1.25, 1.25), this.x, this.y);
			tower.allow = [foodTypes.ANY];
			tower.ignore = [foodTypes.MEAT, foodTypes.LIQUID];
			tower.max = [5]; // If just one entry, then all entries in .allow will contribute towards the same max count, otherwise, individual maxes will be used
			tower.finished = [0]; // MUST contain a 0 for every entry in .max[]
			tower.curr = [[]]; // MUST contain an empty array for every entry in .max[]
			tower.atOnce = 1; // Amount of concurrent users
			tower.processTime = 60; // Frames required to process one food item
			tower.value = 100; // Amount of score and money gained when all maxes have been met
		}
	}else if(wantToPlace == towerTypes.PURIFIER){
		if(Buy(900)){
			tower = GetObj(GetSprite("purify", 0, 0, 1.25, 1.25), this.x, this.y);
			tower.allow = [foodTypes.WATER];
			tower.ignore = [];
			tower.max = [20]; // If just one entry, then all entries in .allow will contribute towards the same max count, otherwise, individual maxes will be used
			tower.finished = [0]; // MUST contain a 0 for every entry in .max[]
			tower.curr = [[]]; // MUST contain an empty array for every entry in .max[]
			tower.atOnce = 2; // Amount of concurrent users
			tower.processTime = 20; // Frames required to process one food item
			tower.value = 200; // Amount of score and money gained when all maxes have been met
		}
	}

	if(tower != false){
		tower.type = wantToPlace;
		tower.currCount = 0;
		tower.interactive = true;
		tower.ready = 3;

		towers.push(tower);
	}
}

function Buy(cost){
	if(money < cost){
		console.log("PLAYER CANNOT AFFORD $" + cost);

		return false;
	}else{
		money -= cost;
		moneyText.text = "Money: " + money;

		return true;
	}
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
	money += increaseBy;
	moneyText.text = "Money: " + money;
}

function AdjustLives(increaseBy){
	lives += increaseBy;
	livesText.text = "Lives: " + lives;
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

function Destroy(obj){
	obj.parent.removeChild(obj);
}