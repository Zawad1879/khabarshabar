<?php

App::uses('AppModel', 'Model');
class MonthlyProgress extends AppModel {
    public $name = 'MonthlyProgress';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'users_id'
        )
    );
}


?>
