<?php $this->extend('/Layouts/default');
$calorie_intake_for_losing_one_kg_daily = $this->Session->read('calorie_intake_for_losing_one_kg_daily');
$calorie_intake_after_reaching_goal = $this->Session->read('calorie_intake_after_reaching_goal');
// $breakfast_calories = $this->Session->read('breakfast_calories');
$breakfast_calories =600;
//$lunch_calories = $this->Session->read('lunch_calories');
$lunch_calories = 500;
//$dinner_calories = $this->Session->read('dinner_calories');
$dinner_calories = 500;
?>

<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous">

  $('.each_table').mouseover(function() {
   alert(this.id);
});


  </script>



<!-- Javascript -->
<script>
var breakfast_calorie_limit;
var lunch_calorie_limit;
var dinner_calorie_limit;
var clicked = false;
var clicked_items_ids;
var breakfast_limit;
var lunch_limit;
var dinner_limit;

function loadPage(){
  // alert("Page started");
  breakfast_calorie_limit = <?php echo json_encode(intval($breakfast_calories)); ?>;
  lunch_calorie_limit = <?php echo json_encode(intval($lunch_calories)); ?>;
  dinner_calorie_limit = <?php echo json_encode(intval($dinner_calories)); ?>;
  clicked_items_ids = [];
  breakfast_limit = document.getElementById("breakfast_limit");
  lunch_limit = document.getElementById("lunch_limit");
  dinner_limit = document.getElementById("dinner_limit");

  breakfast_limit.innerHTML += breakfast_calorie_limit;
  lunch_limit.innerHTML += lunch_calorie_limit;
  dinner_limit.innerHTML += dinner_calorie_limit;
}

function removeHover(row){
  if (!include(clicked_items_ids, row.id)){
    row.className = "";
  }
}

function onHover(row) {
  if(!include(clicked_items_ids,row.id)){
  var calorie_limit;
  var table_no = (row.id).charAt(5);
  var food_calories = row.getElementsByTagName('td')[1].innerHTML;

  if (table_no == 1){

    var remaining_calories = breakfast_calorie_limit - food_calories;

    if(remaining_calories >= 0){
      row.className = "info";
      //breakfast_calorie_limit = remaining_calories;
    }

    else{
      row.className = "danger";
    }

  }
  else if(table_no == 2){
    var remaining_calories = lunch_calorie_limit - food_calories;
    if(remaining_calories >= 0){
      row.className = "info";
      //breakfast_calorie_limit = remaining_calories;
    }

    else{
      row.className = "danger";
    }
  }
  else{
    var remaining_calories = dinner_calorie_limit - food_calories;
    if(remaining_calories >= 0){
      row.className = "info";
      //breakfast_calorie_limit = remaining_calories;
    }

    else{
      row.className = "danger";
    }
  }


  // alert("table number is "+(row.id).charAt(5) );
}
}

function rowClicked(row){
  var table_no = (row.id).charAt(5);
  var food_calories = row.getElementsByTagName('td')[1].innerHTML;
  if(row.className == "info"){
    if(!include(clicked_items_ids,row.id)){
    if (table_no == 1){
      breakfast_calorie_limit = breakfast_calorie_limit - food_calories;
      breakfast_limit.innerHTML = "Calorie limit: "+breakfast_calorie_limit;
    }
    else if (table_no == 2){
      lunch_calorie_limit = lunch_calorie_limit - food_calories;
      lunch_limit.innerHTML = "Calorie limit: "+lunch_calorie_limit;
    }
    else{
        dinner_calorie_limit = dinner_calorie_limit - food_calories;
        dinner_limit.innerHTML = "Calorie limit: "+dinner_calorie_limit;
    }
    clicked_items_ids.push(row.id)
    row.className == "info";
}
}
}

function include(arr,obj) {
    return (arr.indexOf(obj) != -1);
}


</script>



<body onload="loadPage()">
<div class="container-fluid">

<h3>To lose 1kg per day, your daily calorie limit should be
  <?php
    if ($calorie_intake_for_losing_one_kg_daily){
      echo intval($calorie_intake_for_losing_one_kg_daily);
    } ?>
  calories.
</h3>

<h3>
Your calorie intake limit per day should be
  <?php if ($calorie_intake_after_reaching_goal){
  echo intval($calorie_intake_after_reaching_goal);
  //$this->Session->consume('calorie_intake_after_reaching_goal');
} ?>
 calories in order to maintain weight after you reach your goal.
</h3>

<!-- The breakfast, lunch and dinner tables -->

<div class="row table-responsive">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
  <h3 class="text-center">Breakfast</h3>
<table class="table">
  <thead class="thead-default">
      <th>#</th>
      <th>Food</th>
      <th>Calories</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $count = 1;
    foreach($foods as $food): ?>
    <tr class = "each_table" id='table1_<?php echo $count; ?>' onmouseover="onHover(this)" onmouseout="removeHover(this)" lang=""onclick="rowClicked(this)">
      <th scope="row"> <?php echo $count++; ?> </th>
      <td><?php echo $food['Food']['food_name']; ?></td>
      <td><?php echo $food['Food']['food_calories']; ?></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<h3 class="text-center" id="breakfast_limit">Calorie Limit: </h3>
</div>



<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-md-offset-1">
  <h3 class="text-center">Lunch</h3>
  <table class="table table-responsive">
    <thead class="thead-default">
      <tr>
        <th>#</th>
        <th>Food</th>
        <th>Calories</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      foreach($foods as $food): ?>
      <tr class = "each_table" id='table2_<?php echo $count; ?>' onmouseover="onHover(this)" onmouseout="removeHover(this)" lang=""onclick="rowClicked(this)">
        <th scope="row"> <?php echo $count++; ?> </th>
        <td><?php echo $food['Food']['food_name']; ?></td>
        <td><?php echo $food['Food']['food_calories']; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <h3 class="text-center" id="lunch_limit">Calorie Limit: </h3>
</div>



<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-md-offset-1">
  <h3 class="text-center">Dinner</h3>
  <table class="table table-responsive">
    <thead class="thead-default">
      <tr>
        <th>#</th>
        <th>Food</th>
        <th>Calories</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      foreach($foods as $food): ?>
      <tr class = "each_table" id='table3_<?php echo $count; ?>' onmouseover="onHover(this)" onmouseout="removeHover(this)" lang=""onclick="rowClicked(this)">
        <th scope="row"> <?php echo $count++; ?> </th>
        <td><?php echo $food['Food']['food_name']; ?></td>
        <td><?php echo $food['Food']['food_calories']; ?></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <h3 class="text-center" id="dinner_limit">Calorie Limit: </h3>
</div>


</div>
</body>
