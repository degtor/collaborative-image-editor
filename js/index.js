//on click of go(submit) button, addImage() will be called
$("#go").click(addImage);

var i = 0;
//on pressing return, addImage() will be called
$("#urlBox").submit(addImage);



// editing image via css properties
function editImage(s, i) {
	var imageToBeEdited = s.closest("div").id;
		if (i != null) {
			var imageNr = i;
		} else {
			var imageNr = $(s.closest("div")).attr("imageNr");
		}
	
	var gs = $("#gs-"+ imageNr + "").val();
	var blur = $("#blur-"+ imageNr + "").val(); // blur
	var br = $("#br-"+ imageNr + "").val(); // brightness
	var ct = $("#ct-"+ imageNr + "").val(); // contrast
	var huer = $("#huer-"+ imageNr + "").val(); //hue-rotate
	var opacity = $("#opacity-"+ imageNr + "").val(); //opacity
	var invert = $("#invert-"+ imageNr + "").val(); //invert
	var saturate = $("#saturate-"+ imageNr + "").val(); //saturate
	//var sepia = $("#sepia-"+ imageNr + "").val(); //sepia
	
	$("." + imageToBeEdited + "").css(
    "filter", 'grayscale(' + gs+
    '%) blur(' + blur +
    'px) brightness(' + br +
    '%) contrast(' + ct +
    '%) hue-rotate(' + huer +
    'deg) opacity(' + opacity +
    '%) invert(' + invert +
    '%) saturate(' + saturate +
    '%)' //sepia(' + sepia + '%)'
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
    '%)'// sepia(' + sepia + '%)'
  );
}




function addImage(e) {
	
	var imgUrl = $("#imgUrl").val();
	document.getElementById("urlBox").reset();
	var imgContainer = document.getElementById("imageContainer");
	
	if (imgUrl.length) {
		i++;
		var imgWrap = document.createElement("div");
		imgWrap.setAttribute("class", "imgwrapper");
		imgWrap.setAttribute("id", "wrap-" + i.toString());
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
			grayscale.setAttribute("onchange", "editImage(this, null)");
		
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
			bl.setAttribute("onchange", "editImage(this, null)");
      bl.setAttribute("min", 0);
			bl.setAttribute("max", 10);
      bl.setAttribute("value", 0);
      pTag.appendChild(bl);
			
			var brlabel = document.createElement("label");
			brlabel.setAttribute("for", "br");
			brlabel.innerHTML = "Exposure";
			pTag.appendChild(brlabel);
			
			var br = document.createElement("input");
      br.id = "br-" + i.toString();
			br.name = "br";
      br.type = "range";
			br.setAttribute("onchange", "editImage(this, null)");
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
			ct.setAttribute("onchange", "editImage(this, null)");
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
			hue.setAttribute("onchange", "editImage(this, null)");
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
			op.setAttribute("onchange", "editImage(this, null)");
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
			inv.setAttribute("onchange", "editImage(this, null)");
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
			sat.setAttribute("onchange", "editImage(this, null)");
      sat.setAttribute("min", 0);
			sat.setAttribute("max", 500);
      sat.setAttribute("value", 100);
      pTag.appendChild(sat);
				
			
			var res = document.createElement("input");
      res.id = "resetButton-" + i.toString();
			res.setAttribute("indexValue", i.toString());
      res.type = "reset";
			res.value = "Reset";
			res.form = "imageEditor-" + i.toString();
      pTag.appendChild(res);
		
			var removeButton = document.createElement("button");
		removeButton.setAttribute("class", "removeButton");
		removeButton.setAttribute("id", "wrap-" + i.toString());
		removeButton.innerHTML = "Remove";
		pTag.appendChild(removeButton);
	}
	e.preventDefault();	
		//Send the imgUrl to TogetherJS Server
	if (TogetherJS.running) {
  		TogetherJS.send({type: "sendImage", image: imgUrl});
  }
			
}

$(document).on("click", ".removeButton", function() {
	var choice = confirm("Are you sure?");
		if(choice == true) {
		if (TogetherJS.running) {
			var elementFinder = TogetherJS.require("elementFinder");
		  var location = elementFinder.elementLocation(this);
			console.log("in listener: "+location);
  		
			TogetherJS.send({type: "destroyImage", destroyI: true, element: location});
  	}
	
		$("#"+$(this)[0].id).remove();
		return true;
		//$(t).remove();
	} else {
				if (TogetherJS.running) {
			var elementFinder = TogetherJS.require("elementFinder");
		  var location = elementFinder.elementLocation(this);
  		
			TogetherJS.send({type: "destroyImage", destroyI: false, element: location});
  	}
		return false;
	}
});

//Receive the imgUrl on the TJS-server
TogetherJS.hub.on("sendImage", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
    addImage(msg.image);
});

//Receive the imgUrl on the TJS-server
TogetherJS.hub.on("destroyImage", function (msg) {
    if (! msg.sameUrl) {
        return;
    }
	var choice = confirm("Are you sure?");
		if(msg.destroyI == true) {
		console.log("THE msg.element!:" + msg.element);
		$(msg.element).remove();
		//$(t).remove();
	} else {

		return false;
	}
	
	
	//var destroyT = msg.destroyI;
	//var elementFinder = TogetherJS.require("elementFinder");
  //var element = elementFinder.findElement(destroyT);
	//destroyImage(element);
	//$(destroyT).remove();
	
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
	var imgNo = msg.imgNo;
	var elementFinder = TogetherJS.require("elementFinder");
  var element = elementFinder.findElement(sendReset);
	element.form.reset();
	
	setTimeout(function() {
		editImage(element, imgNo);
	}, 0);
});



// Reset sliders back to their original values on press of 'reset'
$(document).on("click", "input[type=reset]", function() {
	
	var sendReset = this;
	console.log("INDEXVALUE: " + $(sendReset).attr("indexvalue"));
	var imgNo = $(sendReset).attr("indexvalue");
	
		if (TogetherJS.running) {
			var elementFinder = TogetherJS.require("elementFinder");
  		var location = elementFinder.elementLocation(sendReset);
			
  		TogetherJS.send({type: "reseter", element: location, imgNo: imgNo});
			console.log("this is what is sent to TJS:" + location);
  	}
	
	setTimeout(function() {
		editImage(sendReset, null);
	}, 0);
	
});

$('#save_image_locally').click(function(){
	html2canvas($('body')[0]).then( {attribute: allowTaint
type: boolean
default: false
description: Whether to allow cross-origin images to taint the canvas}, function (canvas) {
				var a = document.createElement('a');
		        // toDataURL defaults to png, so we need to request a jpeg, then convert for file download.
		        a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
		        a.download = 'somefilename.jpg';
		        a.click();
	});
});
