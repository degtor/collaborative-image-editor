//on click of go(submit) button, addImage() will be called
$("#go").click(addImage);

//on pressing return, addImage() will be called
$("#urlBox").submit(addImage);


// editing image via css properties
function editImage() {
	var gs = $("#gs").val(); // grayscale
	var blur = $("#blur").val(); // blur
	var br = $("#br").val(); // brightness
	var ct = $("#ct").val(); // contrast
	var huer = $("#huer").val(); //hue-rotate
	var opacity = $("#opacity").val(); //opacity
	var invert = $("#invert").val(); //invert
	var saturate = $("#saturate").val(); //saturate
	var sepia = $("#sepia").val(); //sepia

	$("#imageContainer img").css(
    "filter", 'grayscale(' + gs+
    '%) blur(' + blur +
    'px) brightness(' + br +
    '%) contrast(' + ct +
    '%) hue-rotate(' + huer +
    'deg) opacity(' + opacity +
    '%) invert(' + invert +
    '%) saturate(' + saturate +
    '%) sepia(' + sepia + '%)'
  );

	$("#imageContainer img").css(
    "-webkit-filter", 'grayscale(' + gs+
    '%) blur(' + blur +
    'px) brightness(' + br +
    '%) contrast(' + ct +
    '%) hue-rotate(' + huer +
    'deg) opacity(' + opacity +
    '%) invert(' + invert +
    '%) saturate(' + saturate +
    '%) sepia(' + sepia + '%)'
  );
  
}

// adding an image via url box
function addImage(e) {
	var imgUrl = $("#imgUrl").val();
	if (imgUrl.length) {
		$("#imageContainer img").attr("src", imgUrl);
	}
	
	e.preventDefault();	
	
	//Send the imgUrl to TogetherJS Server
	if (TogetherJS.running) {
  		TogetherJS.send({type: "sendImage", image: imgUrl});
  }
}

//Receive the imgUrl on the TJS-server
TogetherJS.hub.on("sendImage", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    addImage(msg.image);
});


//Send the image to the other clients
TogetherJS.hub.on("togetherjs.hello", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    var image = $("#imgUrl").val();

    TogetherJS.send({
        type: "init",
        image: image
    });
});


//if a new client joins the session, make sure it has the same image
TogetherJS.hub.on("init", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    var image = new Image();
    image.src = msg.image;
		addImage(image);
});


TogetherJS.hub.on("reseter", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
	
	console.log("SPAM?");
	var form = document.getElementById("imageEditor");
	form.reset();
});

//When sliders change image will be updated via editImage() function
$("input[type=range]").change(editImage).mousemove(editImage);

// Reset sliders back to their original values on press of 'reset'
$('#resetButton').click(function() {
	var form = document.getElementById("imageEditor");
	form.reset();
	
	if (TogetherJS.running) {
  		TogetherJS.send({type: "reseter"});
  	}
	
	setTimeout(function() {
		editImage();
	}, 0);
});