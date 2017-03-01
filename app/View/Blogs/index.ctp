<?php $this->extend('/Layouts/default'); ?>
<head>
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
function loadPage(){
  alert("HI");
(document.getElementById('post_title')).innerHTML = '';
}
</script>
<div class="container">

<div class="panel panel-success" style="margin-top:20px;">
  <div class="panel-heading">
    <h3>User Posts</h3>
  </div>


<div class="panel-body">
<?php

    foreach($posts as $post):
      $date = substr($post['Blog']['created'], 8, 2);
      $monthNum = substr($post['Blog']['created'], 5, 2);
      $year = substr($post['Blog']['created'], 0, 4);
      $dateObj   = DateTime::createFromFormat('!m', $monthNum);
      $monthName = $dateObj->format('F');

      $title = $post['Blog']['title'];
      $text = $post['Blog']['text']; ?>

      <div class="col-md-9 blogShort">
        <h1><?php echo $title; ?></h1>
        <em><?php echo $date.",".$monthName." ".$year; ?></em>
        <article><?php echo $text; ?>
        
            <p></p>
        </article>
      </div>

      <?php
    endforeach;
 ?>
 <div class="col-md-12 gap10"></div>
 </div>
</div>





  <!-- <div class="panel-body">

                 <div class="col-md-9 blogShort">
                     <h1>Fast Forward Academy</h1>
                     <img src="http://www.kaczmarek-photo.com/wp-content/uploads/2012/06/guinnes-150x150.jpg" alt="post img" class="pull-left img-responsive thumb margin10 img-thumbnail">

                         <em>This snippet use <a href="http://bootsnipp.com/snippets/featured/sexy-sidebar-navigation" target="_blank">Sexy Sidebar Navigation</a></em>
                     <article><p>
                         Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                         ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only
                         five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release
                         of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of
                         Lorem Ipsum.
                         </p>
                             <p></p>
                         </article>
                     <a class="btn btn-blog pull-right marginBottom10" href="http://bootsnipp.com/user/snippets/2RoQ">More Information</a>
                 </div>


               <div class="col-md-12 gap10"></div>
             </div>
           </div> -->


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
