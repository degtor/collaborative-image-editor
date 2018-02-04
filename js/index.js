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

// function resetFunction(e) {
// 	var form = e;
// 	form.reset();
// 	setTimeout(function() {
// 		editImage();
// 	}, 0);
// }


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
	console.log("HEJ");
});

TogetherJS.hub.on("resetta", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
	msg.resetta;
});


//Send the image to the other clients
TogetherJS.hub.on("togetherjs.hello", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    var image = $("#imgUrl").val();

    TogetherJS.send({
        type: "init",
        image: image,
		resetta: msg.resetta
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

//When sliders change image will be updated via editImage() function
$("input[type=range]").change(editImage).mousemove(editImage);

// Reset sliders back to their original values on press of 'reset'
$('#imageEditor').on('reset', function() {
	if (TogetherJS.running) {
  		TogetherJS.send({type: "resetta", resetta: function () {
			setTimeout(function() {
				editImage();
			}, 0);
		}
	});
  }
	
	setTimeout(function() {
		editImage();
	}, 0);
});