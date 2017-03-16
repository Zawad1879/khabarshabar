<?php
class FoodController extends AppController{
  public $helpers = array('Html', 'Form', 'Js');


  public function index() {
    $this->loadModel('TrackedCalorie');
    $this->loadModel('Blog');
    $this->set('foods',$this->Food->find('all'));
    $uid = $this->Auth->user('id');
    $this->set('user_id', $uid);
    //$this->set('progress','');
    $progress = $this->TrackedCalorie->find('all',array('conditions' => array('TrackedCalorie.user_id' => $uid)));
    $this->set('progress',$progress);
    if ($this->request->is('post')){

      $today_calories = $this->request->data['Food']['enter_calories'];

      $this->TrackedCalorie->set(array(

      'calories' => $today_calories,
      'user_id' => $uid
      ));
      $this->TrackedCalorie->save();
      $this->set('today_calories',$today_calories);

      $this->Food->find('all');
      //$progress = $this->tracked_calories->find('all',array('conditions' => array('tracked_calories.user_id' => $uid)));
      $progress = $this->TrackedCalorie->find('all',array('conditions' => array('TrackedCalorie.user_id' => $uid)));
      $this->set('progress',$progress);
      }

      //send two most recent blogs
      $first_two_posts = $this->Blog->find('all', array('limit' => 2,'order' => array('Blog.modified DESC')));
      $this->set('first_two_posts',$first_two_posts);

    }
    // $this->set('user_id', 'bla');

  // public function index() {
  //
  //   $this->set('foods',$this->Food->find('all'));
  //
  //
  // }

  public function search(){
    $this->set('foods',"");
    if ($this->request->is('post')){
      $searched_food = $this->request->data['Food']['food_name'];
      $foodCalories = $this->Food->find('first',array( 'conditions' => array('Food.food_name' => $searched_food)));
      if($foodCalories){
      $this->Flash->success(__('Your food has been found.'));
      //$this->set('foods',$searched_food);
      $this->set('foods',$foodCalories);
      //return $this->redirect(array('action' => 'index'));
    }
    else{
      $this->Flash->error(__('Your food could not be found.'));
    }
    }
  }

  public function calculate() {
    $breakfast_ratio = 1;
    $lunch_ratio = 1.01;
    $dinner_ratio = 1.03;



    if ($this->request->is('post')){
      //$current_weight = $this->request->data['Food']['weight'];
      $current_weight = $this->request->data['Food']['current_weight'];
      $lose_weight = $this->request->data['Food']['lose_weight'];
      $desired_weight = $current_weight - $lose_weight;

      $current_height_feet = $this->request->data['Food']['feet'];
      $current_height_inches = $this->request->data['Food']['inches'];
      $current_height = ($current_height_feet * 30.48) + ($current_height_inches * 2.54);

      $current_age = $this->request->data['Food']['current_age'];

      $gender = $this->request->data['Food']['gender']; //M or F
      $gender_factor = '';
      if ($gender == 'M'){
        $gender_factor = 5;
      }
      else{
        $gender_factor = -161;
      }

      $current_lifestyle = $this->request->data['Food']['lifestyle'];
      $activity_factor = 0;
      if($current_lifestyle == 'sedentary'){
        $activity_factor = 1.2;
      }
      else if($current_lifestyle == 'light_activity'){
        $activity_factor = 1.375;
      }
      else if($current_lifestyle == 'moderate_activity'){
        $activity_factor = 1.55;
      }
      else if($current_lifestyle == 'very_active'){
        $activity_factor = 1.725;
      }
      else if($current_lifestyle == 'extra_active'){
        $activity_factor = 1.9;
      }

      $calorie_intake_for_maintaining_weight = (((10 * $current_weight) + (6.25 * $current_height) - (5 * $current_age) + $gender_factor) * $activity_factor);
      //$calorie_intake_after_reaching_goal = ((10 * $desired_weight) + (6.25 * $current_height) - (5 * $current_age) + $gender_factor) * $activity_factor;

      // $breakfast_calories = ($calorie_intake_after_reaching_goal * $breakfast_ratio)/3.09;
      // $lunch_calories = ($calorie_intake_after_reaching_goal * $lunch_ratio)/3.09;
      // $dinner_calories = ($calorie_intake_after_reaching_goal * $dinner_ratio)/3.09;

      //$this->set('calorie_intake_for_losing_one_kg_daily',$calorie_intake_for_losing_one_kg_daily);
      // $this->Session->write('calorie_intake_for_losing_one_kg_dai', $calorie_intake_for_losing_one_kg_daily);
      // $this->Session->write('calorie_intake_after_reaching_goal', $calorie_intake_after_reaching_goal);
      // $this->Session->write('breakfast_calories', $breakfast_calories);
      // $this->Session->write('lunch_calories', $lunch_calories);
      // $this->Session->write('dinner_calories', $dinner_calories);
      // $this->set('current_weight',$current_weight);
      // $this->set('calorie_intake_after_reaching_goal', $calorie_intake_after_reaching_goal);
      // $this->set('breakfast_calories', $breakfast_calories);
      // $this->set('lunch_calories', $lunch_calories);
      // $this->set('dinner_calories', $dinner_calories);
      return $this->redirect(array('action' => 'dietPlan',$calorie_intake_for_maintaining_weight));
    }
	}

  public function dietPlan($calorie_intake_for_maintaining_weight){
    if(isset($calorie_intake_for_maintaining_weight)){
      $this->set('calorie_intake_for_maintaining_weight',$calorie_intake_for_maintaining_weight);
    }
      $this->set('foods',$this->Food->find('all'));
  }


    public function getBreakfastFoods() {
          $this->autoRender= false;
          $this->response->type('json');
          $postoffices = $this->Food->find('all');
          $response = json_encode($postoffices);
          $this->response->body($response);
       }


}
?>
