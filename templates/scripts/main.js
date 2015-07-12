$(".navbar-toggle").click(function(){
  $(".mobile-navbar-list").toggleClass("down");
});

// Heavily based on Bostock: http://bl.ocks.org/mbostock/4341156

var MeshGen = function(target, density){
  var that = {};
  density = density||25;
  var margin = {top: 0, right: 0, bottom: 0, left: 0},
    width = $(target).width() - margin.left - margin.right,
    height = $(target).height() - margin.top - margin.bottom;
  var id = target.substr(1) + "-mesh";
  var svg = d3.select(target).append("svg")
    .attr("id", id)
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom);

  var vertices = d3.range(density).map(function(d) {
    return [Math.random() * width, Math.random() * height];
  });

  var path = svg.append("g").selectAll("path");

  window.addEventListener("resize", function(event){
    $("#"+id).width($(target).width());
  });

  function meshify() {
    path = path.data(d3.geom.delaunay(vertices).map(function(d) { return "M" + d.join("L") + "Z"; }), String);
    path.exit().remove();
    path.enter().append("path")
      .attr("d", String);
  }

  that.meshify = meshify;

  return that;
};

var titleMesh = MeshGen("#title", 10);
titleMesh.meshify();
var mainMesh = MeshGen("#main", 20);
mainMesh.meshify();
