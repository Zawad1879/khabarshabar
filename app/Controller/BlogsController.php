<?php
App::uses('AppController', 'Controller');
class BlogsController extends AppController{
  public $helpers = array('Html', 'Form');


  public function index(){
    $uid = $this->Auth->user('id');


    if($this->request->is('post')){
      $title = $this->request->data['Blog']['post_title'];
      $text = $this->request->data['Blog']['post_text'];
      $this->Blog->set(array(
        'user_id' => $uid,
        'title' => $title,
        'text' => $text
      ));
      $this->Blog->save();
    }


    $posts = $this->Blog->find('all');
    $this->set('posts',$posts);


  }
}
?>
