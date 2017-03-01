<?php
App::uses('AppModel', 'Model');
class Blog extends AppModel {
    public $name = 'Blog';
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        )
    );
}

?>
