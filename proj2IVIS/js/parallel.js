// shim layer with setTimeout fallback
window.requestAnimFrame = (function(){
  return window.requestAnimationFrame       ||
         window.webkitRequestAnimationFrame ||
         window.mozRequestAnimationFrame    ||
         window.oRequestAnimationFrame      ||
         window.msRequestAnimationFrame     ||
         function( callback ){
           window.setTimeout(callback, 1000 / 60);
         };
})();

var m = [30, 10, 10, 10],
    w = 1260 - m[1] - m[3],
    h = 540 - m[0] - m[2];

var x = d3.scale.ordinal().rangePoints([0, w], 1),
    y = {};

var line = d3.svg.line(),
    axis = d3.svg.axis().orient("right"),
    foreground,
    dimensions,
    brush_count = 0;

var colors = {
  "Albania": "#8dd3c7",
  "Azerbaijan": "#ffffb3",
  "Argentina": "#bebada",
  "Australia": "#fb8072",
  "Bangladesh": "#80b1d3",
  "Armenia": "#fdb462",
  "Bulgaria": "#b3de69",
  "Belarus": "#fccde5",
  "Chile": "#d9d9d9",
  "China": "#bc80bd",
  "Colombia": "#ccebc5",
  "Croatia": "#ffed6f",
  "Czech Rep.": "#66c2a5",
  "Dominican Rep.": "#fc8d62",
  "El Salvador": "#8da0cb",
  "Estonia": "#e78ac3",
  "Finland": "#a6d854",
  "Georgia": "#ffd92f",
  "Hungary": "#e5c494",
  "India": "#b3b3b3",
  "Japan": "#e41a1c",
  "Latvia": "#377eb8",
  "Lithuania":"#4daf4a",
  "Mexico":"#984ea3",
  "Moldova":"#ff7f00",
  "Macedonia":"#ffff33",
  "United Kingdom":"#a65628",
  "Bosnia":"#f781bf",
  "Algeria":"#999999",
  "Bosnia Herzegovina": "#b3e2cd",
  "Canada":"#fdcdac",
  "Indonesia":"#cbd5e8",
  "Iran":"#f4cae4",
  "Iraq":"#e6f5c9",
  "Jordan":"#fff2ae",
  "South Korea":"#f1e2cc",
  "Kyrgyzstan":"#cccccc",
  "Morocco":"#fbb4ae",
  "Nigeria":"#b3cde3",
  "Pakistan":"#ccebc5",
  "Peru":"#decbe4",
  "Philippines":"#fed9a6",
  "Puerto Rico":"#ffffcc",
  "Saudi Arabia":"#e5d8bd",
  "Singapore":"#fddaec",
  "South Africa":"#f2f2f2",
  "Egypt":"#ccc",
  "Serbia":"#ece2f0",
  "Montenegro":"#d0d1e6",
  "Andorra":"#a6bddb",
  "Brazil":"#67a9cf",
  "Cyprus":"#3690c0",
  "Ethiopia":"#02818a",
  "France":"#016c59",
  "Ghana":"#014636",
  "Guatemala":"#f7fcfd",
  "Hong Kong":"#e0ecf4",
  "Italy":"#bfd3e6",
  "Malaysia":"#9ebcda",
  "Mali":"#8c96c6",
  "Bahrain":"#8c6bb1",
  "Ecuador":"#88419d",
  "Kazakhstan":"#810f7c",
  "Kuwait":"#4d004b",
  "Lebanon":"#f7fcf5",
  "Libya":"#e5f5e0",
  "Netherlands":"#c7e9c0",
};


d3.selectAll("canvas")
    .attr("width", w + m[1] + m[3])
    .attr("height", h + m[0] + m[2])
    .style("padding", m.join("px ") + "px");

foreground = document.getElementById('foreground').getContext('2d');

foreground.strokeStyle = "rgba(0,100,160,0.1)";

var svg = d3.select("svg")
    .attr("width", w + m[1] + m[3])
    .attr("height", h + m[0] + m[2])
  .append("svg:g")
    .attr("transform", "translate(" + m[3] + "," + m[0] + ")");

// Could value belong to a quantitative ordinal scale
var quant_p = function(v){return (parseFloat(v) == v) || (v == "")};

d3.csv("MasterMaster9599.csv", function(data) {
  //Reduce the number of unique names... their were > 7K.
  //data.forEach(function(d){d["Country"] = d["Country"].slice(0,1);});

  // Extract the list of dimensions.
  dimensions = d3.keys(data[0]).slice(1).concat(d3.keys(data[0]).slice(0,1)); //Put the ordinal dimensions on opposite sides of the chart for easier viewing
  x.domain(dimensions);

  // Create a scale for each.
  dimensions.forEach(function(d) {
    var vals = data.map(function(p) {return p[d];}); 
    if (vals.every(quant_p)){ 
      y[d] = d3.scale.linear()
          .domain(d3.extent(vals.map(function(p){return +p})))
          .range([h, 0]);}
    else{           
      y[d] = d3.scale.ordinal()
          .domain(vals.filter(function(v, i) {return vals.indexOf(v) == i;}))
          .rangePoints([0, h],1);}
  })
  
  
  // Render full foreground
  paths(data, foreground, brush_count);

  // // Add a group element for each dimension.
  var g = svg.selectAll(".dimension")
      .data(dimensions)
    .enter().append("svg:g")
      .attr("class", "dimension")
      .attr("transform", function(d) { return "translate(" + x(d) + ")"; });
      
      
// Add a group element for each dimension.
// var g = svg.selectAll(".dimension")
//     .data(dimensions)
//   .enter().append("g")
//     .attr("class", "dimension")
//     .attr("transform", function(d) { return "translate(" + x(d) + ")"; })
//     .call(d3.behavior.drag()
//       .origin(function(d) { return {x: x(d)}; })
//       .on("dragstart", function(d) {
//         dragging[d] = x(d);
//         background.attr("visibility", "hidden");
//       })
//       .on("drag", function(d) {
//         dragging[d] = Math.min(width, Math.max(0, d3.event.x));
//         foreground.attr("d", path);
//         dimensions.sort(function(a, b) { return position(a) - position(b); });
//         x.domain(dimensions);
//         g.attr("transform", function(d) { return "translate(" + position(d) + ")"; })
//       })
//       .on("dragend", function(d) {
//         delete dragging[d];
//         transition(d3.select(this)).attr("transform", "translate(" + x(d) + ")");
//         transition(foreground).attr("d", path);
//         background
//             .attr("d", path)
//           .transition()
//             .delay(500)
//             .duration(0)
//             .attr("visibility", null);
//       }));
  

  // Add an axis and title.
  g.append("svg:g")
      .attr("class", "axis")
      .each(function(d) { d3.select(this).call(axis.scale(y[d])); })
    .append("svg:text")
      .attr("text-anchor", "middle")
      .attr("y", -9)
      .text(String);

  // Add and store a brush for each axis.
  g.append("svg:g")
      .attr("class", "brush")
      .each(function(d) { d3.select(this).call(y[d].brush = d3.svg.brush().y(y[d]).on("brush", brush)); })
    .selectAll("rect")
      .attr("x", -12)
      .attr("width", 24);

  // Handles a brush event, toggling the display of foreground lines.
  function brush() {
    brush_count++;
    var actives = dimensions.filter(function(p) { return !y[p].brush.empty(); }),
        extents = actives.map(function(p) { return y[p].brush.extent(); });

    // Get lines within extents
    var selected = [];
	// Koppla till worldMap
	
    data.map(function(d) {
      return actives.every(function(p, i) {
        var p_new = (y[p].ticks)?d[p]:y[p](d[p]); //convert to pixel range if ordinal
          return extents[i][0] <= p_new && p_new <= extents[i][1];
      }) ? selected.push(d) : null;
    });

    // Render selected lines
    foreground.clearRect(0,0,w+1,h+1);
    paths(selected, foreground, brush_count);
	draw(topo, selected);
  }

  function paths(data, ctx, count) {
    var n = data.length,
        i = 0,
        reset = false;
    function render() {
      var max = d3.min([i+60, n]);
      data.slice(i,max).forEach(function(d) {
        path(d, foreground, colors[d.Country]);
      });
      i = max;
    };
    (function animloop(){
      if (i >= n || count < brush_count) return;
      requestAnimFrame(animloop);
      render();
    })();
  };
});


function path(d, ctx, color) {
  if (color) ctx.strokeStyle = color;
  ctx.beginPath();
  dimensions.map(function(p,i) {
    if (i == 0) {
      ctx.moveTo(x(p),y[p](d[p]));
    } else { 
      ctx.lineTo(x(p),y[p](d[p]));
    }
  });
  ctx.stroke();
};
