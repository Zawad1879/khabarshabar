<!--<?php $this->extend('/Layouts/default'); ?>

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.5.0/d3.min.js"></script>
</head>

<div class="container-fluid">
  <div class="row">
    <div class="text-center">
      <h1>Progress Graph</h1>
    </div>
  </div>

  <div id="viz"></div>
    <script>
  // sample data array
  var sample_data = [
    {"year": 1991, "name":"alpha", "value": 17},
    {"year": 1992, "name":"alpha", "value": 20},
    {"year": 1993, "name":"alpha", "value": 25},
    {"year": 1994, "name":"alpha", "value": 33},
    {"year": 1995, "name":"alpha", "value": 52},
    {"year": 1991, "name":"beta", "value": 36},
    {"year": 1992, "name":"beta", "value": 32},
    {"year": 1993, "name":"beta", "value": 40},
    {"year": 1994, "name":"beta", "value": 58},
    {"year": 1995, "name":"beta", "value": 13},
    {"year": 1991, "name":"gamma", "value": 24},
    {"year": 1992, "name":"gamma", "value": 27},
    {"year": 1994, "name":"gamma", "value": 35},
    {"year": 1995, "name":"gamma", "value": 40}
  ]
  // instantiate d3plus
  var visualization = d3plus.viz()
    .container("#viz")  // container DIV to hold the visualization
    .data(sample_data)  // data to use with the visualization
    .type("line")       // visualization type
    .id("name")         // key for which our data is unique on
    .text("name")       // key to use for display text
    .y("value")         // key to use for y-axis
    .x("year")          // key to use for x-axis
    .draw()             // finally, draw the visualization!
</script>


</div> -->



<!doctype html>
<meta charset="utf-8">
<?php $this->extend('/Layouts/default'); ?>
<!-- load D3js -->
<script src="//d3plus.org/js/d3.js"></script>

<!-- load D3plus after D3js -->
<script src="//d3plus.org/js/d3plus.js"></script>

<div class="container-fluid">
  <div class="row" >
    <h2 class="text-center">Monthly progress</h2>
  </div>
  </div>
<!-- create container element for visualization -->
<div class="row" >
  <div id="viz" style="width:600px; height:400px; text-align: center; margin-left: auto; margin-right: auto;"></div>
</div>
</div>
<script>
  // sample data array
  var sample_data = [
    {"year": 1991, "name":"alpha", "value": 17},
    {"year": 1992, "name":"alpha", "value": 20},
    {"year": 1993, "name":"alpha", "value": 25},
    {"year": 1994, "name":"alpha", "value": 33},
    {"year": 1995, "name":"alpha", "value": 52},
    {"year": 1991, "name":"beta", "value": 36},
    {"year": 1992, "name":"beta", "value": 32},
    {"year": 1993, "name":"beta", "value": 40},
    {"year": 1994, "name":"beta", "value": 58},
    {"year": 1995, "name":"beta", "value": 13},
    {"year": 1991, "name":"gamma", "value": 24},
    {"year": 1992, "name":"gamma", "value": 27},
    {"year": 1994, "name":"gamma", "value": 35},
    {"year": 1995, "name":"gamma", "value": 40}
  ]
  // instantiate d3plus
  var visualization = d3plus.viz()
    .container("#viz")  // container DIV to hold the visualization
    .data(sample_data)  // data to use with the visualization
    .type("line")       // visualization type
    .id("name")         // key for which our data is unique on
    .text("name")       // key to use for display text
    .y("value")         // key to use for y-axis
    .x("year")          // key to use for x-axis
    .draw()             // finally, draw the visualization!
</script>
