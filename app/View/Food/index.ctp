<?php $this->extend('/Layouts/default'); ?>

<head>
  <!-- <link rel="stylesheet" type="text/css" href="../../webroot/css/style.css"> -->
  <script src="//d3plus.org/js/d3.js"></script>

  <!-- load D3plus after D3js -->
  <script src="//d3plus.org/js/d3plus.js"></script>


  <script>

    var sample_data = [];

    function appendToArray(month, day, calories){

      sample_data.push({
        'day'  : parseInt(day),
        'month' : month,
        'calories' : parseInt(calories)

        });

      //alert("Pushed");
    }

    function getData(){
      return sample_data;
    }

  </script>


</head>
<div class="container">
  <article class="row">
      <section class="col-lg-12">
        <div class="panel panel-success" style="margin-top:20px;">
        <div class="panel-heading">
          <h3>Homepage</h3>
        </div>
          <div class="panel-body">
          <!-- <?php
            // echo $this->Html->link('Search for food',
            // array('controller' => 'food', 'action'=>'search'));
          ?> -->

          <!-- <?php
            // echo $this->Html->link('Want to lose weight?',
            // array('controller' => 'food', 'action'=>'calculate'));
          ?> -->

          <?php echo $this->Form->create('', array(
              'inputDefaults' => array(
                'div' => 'form-group',
                'label' => false,
                'wrapInput' => false,
                'class' => 'form-control'
              ),
              'class' => 'well form-horizontal'
            )); ?>

          <p>The number of calories I have consumed today</p>

          <?php echo $this->Form->input('enter_calories',array('div'=> 'col-sm-3','placeholder' => 'Enter Calories' ,'required' => true));?>

          <?php echo $this->Form->end(array(
              'label' => ('Save Calories'),
              'class' => 'btn btn-success',
              'div' => array(
                  'class' => 'control-group',
                  ),
              'before' => '<div class="controls">',
              'after' => '</div>'
          ));?>



          <?php
          //if($progress != ''){
          foreach($progress as $prog):
            $monthNum = substr($prog['TrackedCalorie']['created'], 5, 2);
            $dateObj   = DateTime::createFromFormat('!m', $monthNum);
            $monthName = $dateObj->format('F');

            $day = substr($prog['TrackedCalorie']['created'], 8, 2);
            $calories = $prog['TrackedCalorie']['calories']?>
            <script>
            //alert (<?php echo json_encode($day); ?>);
            var month = <?php echo json_encode($monthName); ?>;
            var day = <?php echo json_encode($day); ?>;
            var calories = <?php echo json_encode($calories); ?>;
            appendToArray(month, day, calories );
            console.log(getData);
            </script>

          <?php endforeach;?>
           </div>
        </div>
    </section>
  </article>
</div>

<!-- Asiks code -->

<div class="banner">
  <div class="container">
    <article class="row">
      <section class="col-lg-8">
        <div class="panel panel-success">
            <div class="panel-heading">
              <h3>Diet Planer</h3>
            </div>
            <div class="panel-body">

                <?php echo $this->Form->create('', array(

                  'url'   => array(
                            'controller' => 'Food','action' => 'calculate'
                             ),
                  'class' => 'well form-horizontal'
                )); ?>


                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">My Weight*</label>
                    <!-- <div class="col-sm-3"> -->
                      <!-- <input type="text" class="form-control" id="" name="weight" placeholder="Weight In Kg" required> -->
                      <?php echo $this->Form->input('current_weight',array('label' => '','required' => true,
                                                    'class' => 'form-control',
                                                    'div' => array(
                                                        'class' => 'col-sm-3',
                                                         ),
                                                    'placeholder' => 'Weight In Kg')); ?>
                    <!-- </div> -->

                    <label for="" class="col-sm-3 control-label">I Would Like to Lose*</label>

                      <?php echo $this->Form->input('lose_weight',array('label' => '','required' => true,
                                                    'class' => 'form-control',
                                                    'div' => array(
                                                        'class' => 'col-sm-3',
                                                         ),
                                                    'placeholder' => 'Lose kgs')); ?>
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Within </label>

                      <!-- <input type="text" class="form-control" id="" name="weeks" placeholder="Weeks" required> -->
                      <?php echo $this->Form->input('weeks',array('label' => '','required' => true,
                                                    'class' => 'form-control',
                                                    'div' => array(
                                                        'class' => 'col-sm-3',
                                                         ),
                                                    'placeholder' => 'Weeks')); ?>

                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Current Height Is</label>
                    <!-- <div class="col-sm-2"> -->
                        <!-- <select class="form-control" name="feet" required>
                          <option value="" selected>Feet</option>
                      <option value="3">03</option>
                      <option value="4">04</option>
                      <option value="5">05</option>
                      <option value="6">06</option>
                      <option value="7">07</option>
                    </select> -->
                  <?php echo $this->Form->input('feet', array(
                      'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13),
                      'empty' => 'Feet','required' => true,
                      'class' => 'form-control',
                      'div' => array(
                          'class' => 'col-sm-2',
                           ),
                      'label' => ''

                  )); ?>


                    <?php echo $this->Form->input('inches', array(
                        'options' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12),
                        'empty' => 'Inches','required' => true,
                        'class' => 'form-control',
                        'div' => array(
                            'class' => 'col-sm-2',
                             ),
                        'label' => ''

                    )); ?>
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">My Gender</label>
                     <div class="col-sm-4">
                        <!-- <select class="form-control" name="gender" required>
                          <option value="" selected>Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select> -->


                    <?php $options = array('M' => 'Male', 'F' => 'Female');
                    $attributes = array('legend' => false,'required' => true, 'class' => '',); ?>

                    <?php echo $this->Form->radio('gender',$options, $attributes); ?>

                   </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">My Age Is</label>
                    <!-- <div class="col-sm-3"> -->
                      <!-- <input type="text" class="form-control" id="" name="weeks" placeholder="Years" required> -->
                      <?php echo $this->Form->input('current_age',array('label' => '','required' => true,
                                                    'class' => 'form-control',
                                                    'div' => array(
                                                        'class' => 'col-sm-3',
                                                         ),
                                                    'placeholder' => 'Age')); ?>
                    <!-- </div> -->
                </div>
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">Lifestyle</label>
                    <div class="col-sm-3">
                        <!-- <select class="form-control" name="lifestyle" required>
                          <option value="" selected>Choose One</option>
                      <option value="3">03</option>
                      <option value="4">04</opti3.on>
                    </select> -->

                    <?php echo $this->Form->input('lifestyle', array(
        'options' => array("sedentary" => "Sedentary (little or no exercise)", "light_activity"=>"Light activity (light exercise/sports 1-3 days/week))",
                           "moderate_activity"=>"Moderate activity (moderate exercise/sports 3-5 days/week)",
                           "very_active"=>"Very active (hard exercise/sports 6-7 days a week)",
                           "extra_active"=>"Extra active (very hard exercise/sports and physical job)"),
        'empty' => '(choose one)','required' => true, 'label' => '','class' => 'form-control',
)); ?>
                  </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                    <!-- <div class="col-sm-8"> -->
                      <!-- <input type="submit" class="btn btn-block btn-danger" name="submit_diet_plan" value="Find My Diet"> -->
                      <?php echo $this->Form->end(array(
                          'label' => ('Find My Diet'),
                          'class' => 'btn btn-block btn-danger',
                          'div' => array(
                              'class' => 'col-sm-8',
                               ),
                           'before' => '<div class="controls">',
                           'after' => '</div>'
                      )); ?>
                    <!-- </div> -->
                  </div>
              </form>
            <!-- </form> -->
            </div>
        </div>

      </section>


              <aside class="col-md-4">
              	<div class="panel panel-danger">
              		<div class="panel-heading">
              			<h3>Blog</h3>
              		</div>
              		<div class="list-group">
              				<a href="#" class="list-group-item">
              						<div class="col-sm-4">
              							<img src="img/1.jpg" width="100%">
              						</div>
              						<div class="col-sm-8">
              							<h3 class="list-group-item-heading">Twitter Bootstrap 3 Menu</h3>
              							<p class="list-group-item-text">To create navbars that is not fixed on the top or bottom, place it anywhere within a .container, which sets the width of your site and content.</p>
              						</div>
              						<div style="clear:both"></div>
              				</a>
              				<a href="#" class="list-group-item">
              						<div class="col-sm-4">
              							<img src="img/1.jpg" width="100%">
              						</div>
              						<div class="col-sm-8">
              							<h3 class="list-group-item-heading">Twitter Bootstrap 3 Menu</h3>
              							<p class="list-group-item-text">To create navbars that is not fixed on the top or bottom, place it anywhere within a .container, which sets the width of your site and content.</p>
              						</div>
              						<div style="clear:both"></div>
              				</a>
              		</div>
              	</div>
              </aside>



    </article>

  </div>
  <div style="width:50px; height:100px;"></div>

</div>


<!-- Ends here -->






<?php if (AuthComponent::user('id')){ ?>
<div class="container">
<div class="col-sm-2"></div>
<div class="col-sm-8" style="align:center;">

<div class="panel panel-success" style="margin-top:10px;" >
<div class="panel-heading" style="height:70px; font-size:30px; text-align: center;">Your Monthly Progress</div>
<div class="row" >
  <div id="viz" style="width:600px; height:400px; text-align: center; margin-left: auto; margin-right: auto;"></div>
</div>
</div>

</div>
<div class="col-sm-2"></div>
</div>
<div class="container">


<div class="row">
<script>
  sample_data = getData();
  if(sample_data.length != 0){
    //console.log(sample_data);

  var visualization = d3plus.viz()
    .container("#viz")  // container DIV to hold the visualization
    .data(sample_data)  // data to use with the visualization
    .type("line")       // visualization type
    .id("month")         // key for which our data is unique on
    .text("month")       // key to use for display text
    .y("calories")      // key to use for y-axis
    .x("day")           // key to use for x-axis
    .draw()             // finally, draw the visualization!
  }
  else{
    alert("Empty");
  }
</script>
<?php } ?>
</div>

</div>
