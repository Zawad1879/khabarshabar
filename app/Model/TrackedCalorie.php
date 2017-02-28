<?php

App::uses('AppModel', 'Model');
class TrackedCalorie extends AppModel {
    public $name = 'TrackedCalorie';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}


?>
