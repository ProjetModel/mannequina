<?php 
	class Contact extends AppModel {
     	 public $name = 'Messages';

     	public $validate = array(

     		
	        	'firstname' => array(
	            'nonEmpty' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'Vous devez saisir le nom d\'utilisateur',
	                'allowEmpty' => false
	            )),

	            'lastname' => array(
	            'nonEmpty' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'Vous devez saisir le nom d\'utilisateur',
	                'allowEmpty' => false
	            )),

	            'title' => array(
	            'nonEmpty' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'Vous devez saisir un titre.',
	                'allowEmpty' => false
	            )),

	             'message' => array(
	            'nonEmpty' => array(
	                'rule' => array('notEmpty'),
	                'message' => 'Vous devez saisir un message.',
	                'allowEmpty' => false
	            )),

	           

	        'email' => array(
	            'required' => array(
	                'rule' => array('email', true),    
	                'message' => "L'adresse email, c'est pas valide."   
	            ))
	        
    	);

	}

 ?> 