<?php 
class UsersController extends AppController {


	public function index() {

		echo "bonjour" ; 
		print_r($this->User->find('all'));
		
	}
}
 ?>