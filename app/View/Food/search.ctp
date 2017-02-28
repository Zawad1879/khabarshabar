<?php $this->extend('/Layouts/default'); ?>
<?php
echo $this->Form->create();
echo "Which food are you searching for?";
echo $this->Form->input('food_name',[
    'label' => 'Food name']);
echo $this->Form->end('Search for food');

if ($foods == ""){}
  else{

    foreach ($foods as $food) :
      echo $food['food_calories']." calories per ".$food['food_quantity'];
    endforeach;

  }
?>
