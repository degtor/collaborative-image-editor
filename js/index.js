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

//When sliders change image will be updated via editImage() function
$("input[type=range]").change(editImage).mousemove(editImage);

// Reset sliders back to their original values on press of 'reset'
// $('#imageEditor').on('reset', function () {
// 	var resetButton = $("input[type=reset]").val();
// 	if (TogetherJS.running) {
// 		TogetherJS.send({type: "reset", reset: resetButton});
// 	}
//
// 	setTimeout(function() {
// 		editImage();
// 	}, 0);
// });

$("#reset").click(function() {
	$("#imageEditor").reset();
	editImage();
})



// TogetherJS.hub.on("message-type", function (msg) {
//   if (! msg.sameUrl) {
//     // Usually you'll test for this to discard messages that came
//     // from a user at a different page
//     return;
//   }
// });

// adding an image via url box
function addImage(e) {
	var imgUrl = $("#imgUrl").val();
	if (imgUrl.length) {
		$("#imageContainer img").attr("src", imgUrl);
	}
	e.preventDefault();	
	if (TogetherJS.running) {
  	TogetherJS.send({type: "sendImage", image: imgUrl});
  }
}

TogetherJS.hub.on("sendImage", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    addImage(msg.image);
});


TogetherJS.hub.on("togetherjs.hello", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    var image = $("#imgUrl").val();
	var gs = $("#gs").val();
    TogetherJS.send({
        type: "init",
        image: image
    });
});

TogetherJS.hub.on("init", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    var image = new Image();
    image.src = msg.image;
		addImage(image);
});