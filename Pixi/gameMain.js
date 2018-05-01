function Init(){
	// Initialize game window
	var app = new PIXI.Application(720, 720, {backgroundColor:0x1099bb, antialias:true});
    document.body.appendChild(app.view);

    // create a background...
    var background = PIXI.Sprite.fromImage('./images/logoWhiteBackground.png');
    background.width = 720;
    background.height = 405;
    background.y = 80;

    // add background to stage...
    app.stage.addChild(background);

    // create some textures from an image path
    var textureButton = PIXI.Texture.fromImage('./images/conveyorRight.png');
    var textureButtonDown = PIXI.Texture.fromImage('./images/conveyorLeft.png');
    var textureButtonOver = PIXI.Texture.fromImage('./images/conveyorDown.png');


    var button = new PIXI.Sprite(textureButton);
    button.buttonMode = true;

    button.anchor.set(0.5);
    button.x = 175;
    button.y = 500;

    // make the button interactive...
    button.interactive = true;
    button.buttonMode = true;

    button
        // Mouse & touch events are normalized into
        // the pointer* events for handling different
        // button events.
        .on('pointerdown', onButtonDown)
        .on('pointerup', onButtonUp)
        .on('pointerupoutside', onButtonUp)
        .on('pointerover', onButtonOver)
        .on('pointerout', onButtonOut);

        // Use mouse-only events
        // .on('mousedown', onButtonDown)
        // .on('mouseup', onButtonUp)
        // .on('mouseupoutside', onButtonUp)
        // .on('mouseover', onButtonOver)
        // .on('mouseout', onButtonOut)

        // Use touch-only events
        // .on('touchstart', onButtonDown)
        // .on('touchend', onButtonUp)
        // .on('touchendoutside', onButtonUp)

    // add it to the stage
    app.stage.addChild(button);

    // add button to array

// set some silly values...
    function onButtonDown() {
    this.isdown = true;
    this.texture = textureButtonDown;
    this.alpha = 1;
}

    function onButtonUp() {
        this.isdown = false;
        if (this.isOver) {
        this.texture = textureButtonOver;
        }
        else {
        this.texture = textureButton;
        }
    }

    function onButtonOver() {
        this.isOver = true;
        if (this.isdown) {
            return;
        }
        this.texture = textureButtonOver;
    }

    function onButtonOut() {
        this.isOver = false;
        if (this.isdown) {
            return;
        }
        this.texture = textureButton;
    }
}




