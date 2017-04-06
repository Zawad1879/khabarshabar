<?php $this->extend('/Layouts/default'); ?>

<head>
<!-- <style>
 #custom-handle {
    width: 3em;
    height: 1.6em;
    top: 50%;
    margin-top: -.8em;
    text-align: center;
    line-height: 1.6em;
  }


</style> -->
  <!-- <link rel="stylesheet" type="text/css" href="../../webroot/css/style.css"> -->
  <script src="//d3plus.org/js/d3.js"></script>

  <!-- load D3plus after D3js -->
  <script src="//d3plus.org/js/d3plus.js"></script>

  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <link type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet" />
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



  <script>

    var sample_data = [];

    //diet calculator variables
    var gender = "";

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

    $( document ).ready(function() {

  });



  </script>


</head>
<?php if ($this->Session->read('Auth.User')){ ?>
<div class="container">
  <article class="row">
      <section class="col-lg-12">
        <div class="panel panel-success" style="margin-top:20px;">
        <div class="panel-heading">
          <h3>Homepage</h3>
        </div>
          <div class="panel-body">

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



<section class="col-lg-12">
        <div class="panel panel-success" style="margin-top:20px;">
        <div class="panel-heading">
          <h3>Homepage</h3>
        </div>
          <div class="panel-body">
          <div class="col-md-12">

          </div>


           </div>
        </div>
</section>



  </article>
</div>
<?php } ?>
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
              			<h3>Recent posts</h3>
              		</div>
              		<div class="list-group">
                    <?php $count = 1; ?>
                    <?php foreach($first_two_posts as $post):


                      $date = substr($post['Blog']['created'], 8, 2);
                      $monthNum = substr($post['Blog']['created'], 5, 2);
                      $year = substr($post['Blog']['created'], 0, 4);
                      $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                      $monthName = $dateObj->format('F'); ?>



              				<a href="#" class="list-group-item" id="listItem<?php echo $count; ?>" data-toggle="modal" data-target="#myModal<?php echo $count; ?>">
              						<div class="col-sm-4">
              							<img src="img/1.jpg" width="100%">
              						</div>
              						<div class="col-sm-8">
              							<h3 class="list-group-item-heading"><?php echo $post['Blog']['title']; ?></h3>
                            <em><?php echo $post['User']['username'] ?></em></br>
                            <em ><?php echo $date.",".$monthName." ".$year; ?></em>
              							<p class="list-group-item-text"><?php echo $post['Blog']['text']; ?></p>
              						</div>
              						<div style="clear:both"></div>
              				</a>

                      <div id="myModal<?php echo $count; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h2 class="modal-title"><?php echo $post['Blog']['title']; ?></h2>
                              <em><?php echo $post['User']['username'] ?></em></br>
                              <em ><?php echo $date.",".$monthName." ".$year; ?></em>
                            </div>
                            <div class="modal-body">
                              <p><?php echo $post['Blog']['text']; ?></p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <?php $count = $count + 1; ?>
                    <?php endforeach; ?>
              		</div>


<!-- <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->






              	</div>
              </aside>



    </article>

  </div>


</div>


<!-- Ends here -->






<?php if (AuthComponent::user('id')){ ?>
<div class="container">
<div class="col-sm-2"></div>
<div class="col-sm-12" style="align:center;">

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
    console.log(sample_data);

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
    //alert("Empty");
  }
</script>
<?php } ?>
</div>

</div>
<div style="width:50px; height:80px;"></div>
