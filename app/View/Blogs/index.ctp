<?php $this->extend('/Layouts/default'); ?>
<head>
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">

<!-- <script src="html5shiv.js"></script>
<script src="flip-carousel.js"></script> -->
  <style>
  .blogShort{ border-bottom:1px solid #ddd;}
.add{background: #333; padding: 10%; height: 300px;}


.btn-blog {
    color: #ffffff;
    background-color: #000066;
    border-color: #000066;
    border-radius:0;
    margin-bottom:10px
}
.btn-blog:hover,
.btn-blog:focus,
.btn-blog:active,
.btn-blog.active,
.open .dropdown-toggle.btn-blog {
    color: white;
    background-color:#34ca78;
    border-color: #34ca78;
}
 h2{color:#34ca78;}
 .margin10{margin-bottom:10px; margin-right:10px;}

  </style>
</head>

<script>
var startIndex = 0;
var stopIndex = 0;
var rowCardLimit = 3;
var posts = [];

function loadPage(){
  alert("HI");
(document.getElementById('post_title')).innerHTML = '';
}

function getStartIndex(){
  return startIndex;
}

function getStopIndex(){
  return stopIndex;
}

function getRowLimit(){
  return rowCardLimit;
}

function setStartIndex(index){
  startIndex = index;
}

function setStopIndex(index){
  stopIndex = index;
}

function getObjects(){
  arr = [];
  var i;
  for(i = getStartIndex(); i <= getStopIndex(); i++){
    arr.push(posts[i]);
  }
  return arr;
}
</script>

<div class="container">

<!-- <div class="panel panel-success" style="margin-top:20px;">
  <div class="panel-heading">
    <h3>User Posts</h3>
  </div> -->
<!-- <div class="panel-body"> -->
<div class="container">
  <h1 style="font-family: 'Lobster', cursive;" class="text-center">Pocket Stories</h1>
<?php
    $count = 1;
    foreach($posts as $post): ?>
      <script>

      posts.push(<?php echo json_encode($post); ?>);
      if(posts.length > 0 && getStopIndex() < getRowLimit()){
        setStopIndex(posts.length - 1);
      }

      //console.log(arr[arr.length - 1].User.username);
      </script>
      <?php

      $date = substr($post['Blog']['created'], 8, 2);
      $monthNum = substr($post['Blog']['created'], 5, 2);
      $year = substr($post['Blog']['created'], 0, 4);
      $dateObj   = DateTime::createFromFormat('!m', $monthNum);
      $monthName = $dateObj->format('F');

      $title = $post['Blog']['title'];
      $text = $post['Blog']['text']; ?>

      <!-- <div class="col-md-9 blogShort">
        <h1><?php echo $title; ?></h1>
        <em><?php echo $date.",".$monthName." ".$year; ?></em>
        <article><?php echo $text; ?>

            <p></p>
        </article>
      </div> -->

<div class="col-md-3" id="card<?php echo $count; ?>" >
  <div class="panel panel-success" style="margin-top:20px;">
    <div class="panel-body" >
        <div class="card blogCard">
    <div class="card-block">
      <div class="heading" style="border-bottom: 1px solid lightgrey;">
      <h4 class="card-title"><b><?php echo $title; ?></b></h4>
      <em><?php echo $post['User']['username'] ?></em></br>
      <em ><?php echo $date.",".$monthName." ".$year; ?></em>
    </div>
      <p class="card-text"> <?php echo $text; ?></p>
      <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $count; ?>">Read full text</a>
    </div>
  </div>
  </div>
  </div>
</div>

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




      <?php
      $count = $count + 1;
    endforeach;
    ?>



</div>



 <div class="col-md-12 gap10"></div>
 <!-- </div> -->


           <div class="panel panel-success" style="margin-top:20px;">
             <div class="panel-heading">
               <h3>Create a new post</h3>
             </div>
             <div class="panel-body">


               <?php echo $this->Form->create('',
                   array('class' => 'well form-horizontal')
                 ); ?>

                 <div class="form-group">
                   <label for="" class="col-sm-1 control-label">Title*</label>
                   <!-- <div class="col-sm-3"> -->
                     <!-- <input type="text" class="form-control" id="" name="weight" placeholder="Weight In Kg" required> -->
                     <?php echo $this->Form->input('post_title',array('label' => '','required' => true,
                                                   'class' => 'form-control',
                                                   'div' => array(
                                                       'class' => 'col-sm-11',
                                                        ),
                                                   'placeholder' => '')); ?>
                  </div>

                  <div class="form-group">
                   <label for="" class="col-sm-1 control-label">Text*</label>
                   <!-- <div class="col-sm-3"> -->
                     <!-- <input type="text" class="form-control" id="" name="weight" placeholder="Weight In Kg" required> -->
                     <?php echo $this->Form->input('post_text',array('label' => '','required' => true,
                                                   'type' => 'textarea',
                                                   'class' => 'form-control',
                                                   'div' => array(
                                                       'class' => 'col-sm-11',
                                                        ),
                                                   'placeholder' => '')); ?>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-1 control-label"></div>
                  <?php echo $this->Form->end(array(
                      'label' => ('Submit'),
                      'class' => 'btn btn-block btn-danger',
                      'div' => array(
                          'class' => 'col-sm-11',
                           ),
                       'before' => '<div class="controls">',
                       'after' => '</div>'
                  )); ?>
                  </div>




             </div>
           </div>


         </div>
</div>
