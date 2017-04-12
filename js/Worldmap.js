d3.select(window).on("resize", throttle);

var zoom = d3.behavior.zoom()
    .scaleExtent([1, 9])
    .on("zoom", move);

var width = document.getElementById('container').offsetWidth;
var height = width / 2;

var topo,projection,worldPath,worldSvg,worldG;
var graticule = d3.geo.graticule();
var tooltip = d3.select("#container").append("div").attr("class", "tooltip hidden");
setup(width,height);

function setup(width,height){
  projection = d3.geo.mercator()
    .translate([(width/2), (height/2)])
    .scale( width / 2 / Math.PI);

  worldPath = d3.geo.path().projection(projection);

  worldSvg = d3.select("#container").append("svg")
      .attr("class", "world")
      .attr("width", width)
      .attr("height", height)
      .call(zoom)
      .on("click", click)
      .append("g");

  worldG = worldSvg.append("g");

}

d3.json("world-topo-min.json", function(error, world) {
  var countries = topojson.feature(world, world.objects.countries).features;
  topo = countries;
  draw(topo);
  
});

function draw(topo, brushSelected) {
 // Clear map if brush is selected
  if (brushSelected) {
	  worldG.html("");
  }
  
  var country = worldG.selectAll(".country").data(topo);
  
  worldSvg.append("path")
     .datum(graticule)
     .attr("class", "graticule")
     .attr("d", worldPath);

  worldG.append("path")
   .datum({type: "LineString", coordinates: [[-180, 0], [-90, 0], [0, 0], [90, 0], [180, 0]]})
   .attr("class", "equator")
   .attr("d", worldPath);
  
  country.enter().insert("path")
      .attr("class", "country")
      .attr("d", worldPath)
      .attr("id", function(d,i) { return d.id; })
      .attr("title", function(d,i) { return d.properties.name; })
      .style("fill", function(d, i) {
		  var returncolor = "efefef";
		  if (!brushSelected) {
	    	  Object.keys(colors).forEach(function(colorName) {
	    	    	if (colorName == d.properties.name) {
	    	    		returncolor = colors[colorName];
	   	    	}});
		  }

					if (brushSelected) {
						brushSelected.forEach(function(selectedItem) {
			  				if (selectedItem.Country == d.properties.name) {
						    	  Object.keys(colors).forEach(function(colorName) {
						    	    	if (colorName == d.properties.name) {
						    	    		returncolor = colors[colorName];
						    	    	} 
			  				});
						};
					});
					}
		  
		  return returncolor;
       });

  //offsets for tooltips
  var offsetL = document.getElementById('container').offsetLeft+20;
  var offsetT = document.getElementById('container').offsetTop+10;
  //tooltips
  f = 0;
  country
    .on("mousemove", function(d,i) {
		f = 0;

      var mouse = d3.mouse(worldSvg.node()).map( function(d) { return parseInt(d); } );
	  
	  
	  d3.csv("totalgdp.csv", function(data) {
		  data.forEach(function(economyData) {
			  if (d.properties.name == economyData.Country) {
			  	  tooltip.html(d.properties.name + "<br>" 
				  + economyData.info + "<br>"
				  + "1995-1999: "+ economyData.Year95to99 + "<br>"
				  + "2000-2004: "+ economyData.Year00to04 + "<br>"
				  + "2005-2009: "+ economyData.Year05to09);
			  }
		  })
	 	});// end csv

      tooltip.classed("hidden", false)
             .attr("style", "left:"+(mouse[0]+ offsetL)+"px;top:"+(mouse[1]+offsetT)+"px")
             .html(d.properties.name);

      })
      .on("mouseout",  function(d,i) {
        tooltip.classed("hidden", true);
      })c
	  .on("click", function(d, i) {
		  if (f < 6) {
		  	f = f + 1;
		  } else {
			  f = 0;
		  }

	      var mouse = d3.mouse(worldSvg.node()).map( function(d) { return parseInt(d); } );
	  
		  var EconomyDataFiles = ["totalgdp.csv", "AvGdpInc.csv", "GroCapInv.csv", "inflationSum.csv", "industryAvg.csv", "taxrev.csv", "tradebal.csv"]
	  
		  d3.csv(EconomyDataFiles[f], function(data) {
			  data.forEach(function(economyData) {
				  if (d.properties.name == economyData.Country) {
				  	  tooltip.html(d.properties.name + "<br>" 
					  + economyData.info + "<br>"
					  + "1995-1999: "+ economyData.Year95to99 + "<br>"
					  + "2000-2004: "+ economyData.Year00to04 + "<br>"
					  + "2005-2009: "+ economyData.Year05to09);
				  }
			  })
		 	});// end csv

	      tooltip.classed("hidden", false)
	             .attr("style", "left:"+(mouse[0]+ offsetL)+"px;top:"+(mouse[1]+offsetT)+"px")
	             .html(d.properties.name);
	  });

}


function redraw() {
  width = document.getElementById('container').offsetWidth;
  height = width / 2;
  d3.select('svg').remove();
  setup(width,height);
  draw(topo);
}


function move() {

  var t = d3.event.translate;
  var s = d3.event.scale;
  zscale = s;
  var h = height/4;


  t[0] = Math.min(
    (width/height)  * (s - 1),
    Math.max( width * (1 - s), t[0] )
  );

  t[1] = Math.min(
    h * (s - 1) + h * s,
    Math.max(height  * (1 - s) - h * s, t[1])
  );

  zoom.translate(t);
  worldG.attr("transform", "translate(" + t + ")scale(" + s + ")");

  //adjust the country hover stroke width based on zoom level
  d3.selectAll(".country").style("stroke-width", 1.5 / s);

}

var throttleTimer;
function throttle() {
  window.clearTimeout(throttleTimer);
    throttleTimer = window.setTimeout(function() {
      redraw();
    }, 200);
}

//geo translation on mouse click in map
function click() {
  var latlon = projection.invert(d3.mouse(this));
}