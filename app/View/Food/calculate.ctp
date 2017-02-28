<?php $this->extend('/Layouts/default'); ?>
<?php echo $this->Form->create(); ?>

<p> My weight is <?php echo $this->Form->input('current_weight',[
    'label' => '','required' => true]); ?> </p>


<p> I would like to lose <?php echo $this->Form->input('lose_weight',[
    'label' => '','required' => true]); ?>  kgs</p>
<p> in <?php echo $this->Form->input('lose_weight_weeks',[
    'label' => '']); ?> weeks </p>


<p> My current height is <?php echo $this->Form->input('feet', array(
    'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13),
    'empty' => '(choose one)','required' => true
)); ?></p>


<?php echo $this->Form->input('inches', array(
    'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11),
    'empty' => '(choose one)','required' => true
)); ?> </p>


<p> I am a </p>
<?php $options = array('M' => 'Male', 'F' => 'Female');
$attributes = array('legend' => false,'required' => true);
echo $this->Form->radio('gender', $options, $attributes);?>


<p> My age is <?php echo $this->Form->input('current_age',[
    'label' => '','required' => true]); ?> years </p>


<p>I have a <?php echo $this->Form->input('lifestyle', array(
        'options' => array("sedentary" => "Sedentary (little or no exercise)", "light_activity"=>"Light activity (light exercise/sports 1-3 days/week))",
                           "moderate_activity"=>"Moderate activity (moderate exercise/sports 3-5 days/week)",
                           "very_active"=>"Very active (hard exercise/sports 6-7 days a week)",
                           "extra_active"=>"Extra active (very hard exercise/sports and physical job)"),
        'empty' => '(choose one)','required' => true
)); ?></p>


<?php echo $this->Form->end('Find my diet!'); ?>
