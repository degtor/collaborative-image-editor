//on click of go(submit) button, addImage() will be called
$("#go").click(addImage);

var i = 0;
//on pressing return, addImage() will be called
$("#urlBox").submit(addImage);



// editing image via css properties
function editImage(s) {
	console.log ("IN EDITIMAGE: " +s.id);
	var imageToBeEdited = s.closest("div").id;
	var imageNr = $(s.closest("div")).attr("imageNr");
	console.log(imageNr);
	console.log($(s).val());
	
//	var gs = $("#gs").val(); // grayscale
	var gs = $("#gs-"+ imageNr + "").val();
	var blur = $("#blur-"+ imageNr + "").val(); // blur
	var br = $("#br-"+ imageNr + "").val(); // brightness
	var ct = $("#ct-"+ imageNr + "").val(); // contrast
	var huer = $("#huer-"+ imageNr + "").val(); //hue-rotate
	var opacity = $("#opacity-"+ imageNr + "").val(); //opacity
	var invert = $("#invert-"+ imageNr + "").val(); //invert
	var saturate = $("#saturate-"+ imageNr + "").val(); //saturate
	var sepia = $("#sepia-"+ imageNr + "").val(); //sepia
	
	$("." + imageToBeEdited + "").css(
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

	$("." + imageToBeEdited + "").css(
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
//$("input[type=range]").change(editImage).mousemove(editImage);



function addImage(e) {
	
	

	var imgUrl = $("#imgUrl").val();
	var imgContainer = document.getElementById("imageContainer");
	
	if (imgUrl.length) {
		i++;
		var imgWrap = document.createElement("div");
		imgContainer.appendChild(imgWrap);
	
		var sliders = document.createElement("div");
			sliders.setAttribute("class", "sliders");
			sliders.setAttribute("id", "image-" + i.toString());
			sliders.setAttribute("imageNr", i.toString());
			imgWrap.appendChild(sliders);
		
			var imgOne = document.createElement("img");
		imgOne.setAttribute("src", imgUrl);
		imgOne.setAttribute("class", "image-" + i.toString());
		sliders.appendChild(imgOne);
			
			var imageEditor = document.createElement("form");
      imageEditor.setAttribute("id", "imageEditor-" + i.toString());
     	sliders.appendChild(imageEditor)
			
			var pTag = document.createElement("p");
			imageEditor.appendChild(pTag);
			
			var gslabel = document.createElement("label");
			gslabel.for = "gs";
			gslabel.innerHTML = "Grayscale";
			pTag.appendChild(gslabel);
      
      var grayscale = document.createElement("input");
      grayscale.id = "gs-" + i.toString();
			grayscale.name = "gs";
      grayscale.type = "range";
			grayscale.setAttribute("onchange", "editImage(this)");
		
      grayscale.setAttribute("min", 0);
			grayscale.setAttribute("max", 100);
      grayscale.setAttribute("value", 0);
      pTag.appendChild(grayscale);
			
			var blabel = document.createElement("label");
			blabel.for = "blur";
			blabel.innerHTML = "Blur";
			pTag.appendChild(blabel);
			
			var bl = document.createElement("input");
      bl.id = "blur-"+ i.toString();
			bl.name = "blur";
      bl.type = "range";
			bl.setAttribute("onchange", "editImage(this)");
      bl.setAttribute("min", 0);
			bl.setAttribute("max", 10);
      bl.setAttribute("value", 0);
      pTag.appendChild(bl);
			
			var brlabel = document.createElement("label");
			brlabel.for = "br";
			brlabel.innerHTML = "Exposure";
			pTag.appendChild(brlabel);
			
			var br = document.createElement("input");
      br.id = "br-" + i.toString();
			br.name = "br";
      br.type = "range";
			br.setAttribute("onchange", "editImage(this)");
      br.setAttribute("min", 0);
			br.setAttribute("max", 200);
      br.setAttribute("value", 100);
      pTag.appendChild(br);
			
			var ctlabel = document.createElement("label");
			ctlabel.for = "ct";
			ctlabel.innerHTML = "Contrast";
			pTag.appendChild(ctlabel);
			
			var ct = document.createElement("input");
      ct.id = "ct-" + i.toString();
			ct.name = "ct";
      ct.type = "range";
			ct.setAttribute("onchange", "editImage(this)");
      ct.setAttribute("min", 0);
			ct.setAttribute("max", 200);
      ct.setAttribute("value", 100);
      pTag.appendChild(ct);
			
			var huelabel = document.createElement("label");
			huelabel.for = "huer";
			huelabel.innerHTML = "Hue";
			pTag.appendChild(huelabel);
			
			var hue = document.createElement("input");
      hue.id = "huer-" + i.toString();
			hue.name = "huer";
      hue.type = "range";
			hue.setAttribute("onchange", "editImage(this)");
      hue.setAttribute("min", 0);
			hue.setAttribute("max", 360);
      hue.setAttribute("value", 0);
      pTag.appendChild(hue);
			
			var oplabel = document.createElement("label");
			oplabel.for = "opacity";
			oplabel.innerHTML = "Opacity";
			pTag.appendChild(oplabel);
			
			var op = document.createElement("input");
      op.id = "opacity-" + i.toString();
			op.name = "opacity";
      op.type = "range";
			op.setAttribute("onchange", "editImage(this)");
      op.setAttribute("min", 0);
			op.setAttribute("max", 100);
      op.setAttribute("value", 100);
      pTag.appendChild(op);

			var invlabel = document.createElement("label");
			invlabel.for = "invert";
			invlabel.innerHTML = "Invert";
			pTag.appendChild(invlabel);
			
			var inv = document.createElement("input");
      inv.id = "invert-" + i.toString();
			inv.name = "invert";
      inv.type = "range";
			inv.setAttribute("onchange", "editImage(this)");
      inv.setAttribute("min", 0);
			inv.setAttribute("max", 100);
      inv.setAttribute("value", 0);
      pTag.appendChild(inv);
			
			var satlabel = document.createElement("label");
			satlabel.for = "saturate";
			satlabel.innerHTML = "Saturate";
			pTag.appendChild(satlabel);
			
			var sat = document.createElement("input");
      sat.id = "saturate-" + i.toString();
			sat.name = "saturate";
      sat.type = "range";
			sat.setAttribute("onchange", "editImage(this)");
      sat.setAttribute("min", 0);
			sat.setAttribute("max", 500);
      sat.setAttribute("value", 100);
      pTag.appendChild(sat);
				
			var seplabel = document.createElement("label");
			seplabel.for = "sepia";
			seplabel.innerHTML = "Sepia";
			pTag.appendChild(seplabel);
			
			var sep = document.createElement("input");
      sep.id = "sepia-" + i.toString();
			sep.name = "sepia";
      sep.type = "range";
			sep.setAttribute("onchange", "editImage(this)");
      sep.setAttribute("min", 0);
			sep.setAttribute("max", 100);
      sep.setAttribute("value", 0);
      pTag.appendChild(sep);
			
			var res = document.createElement("input");
      res.id = "resetButton";
			res.setAttribute("indexValue", i.toString());
      res.type = "reset";
			res.value = "Reset";
			res.form = "imageEditor-" + i.toString();
      pTag.appendChild(res);
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

	var sendReset = msg.element;
	var elementFinder = TogetherJS.require("elementFinder");
  // If the element can't be found this will throw an exception:
  var element = elementFinder.findElement(sendReset);
	//element.reset();
	element.form.reset();
	console.log("This is the send reset" + element.form);
	console.log("This reset" + sendReset);

	
	setTimeout(function() {
		editImage(element);
	}, 0);
});



// Reset sliders back to their original values on press of 'reset'
$(document).on("click", "input[type=reset]", function() {
	
	var sendReset = this;
	//console.log("OBS:" + sendReset);
	
		if (TogetherJS.running) {
			var elementFinder = TogetherJS.require("elementFinder");
  		var location = elementFinder.elementLocation(sendReset);
			
  		TogetherJS.send({type: "reseter", element: location});
			console.log("this is what is sent to TJS:" + location);
  	}
	
	setTimeout(function() {
		editImage(sendReset);
	}, 0);
	
	
	
	//var form = document.getElementById("imageEditor-" + this.index);
	//form.reset();
	
	//setTimeout(function() {
	//	editImage(this);
	//}, 0);
});
//$("#resetButton").click(function() {
//	var form = document.getElementById("imageEditor");
//	form.reset();
	
//	setTimeout(function() {
//		editImage(this);
//	}, 0);
//});