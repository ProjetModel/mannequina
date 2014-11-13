<?php 
class UsersController extends AppController {

	public function signup() {

		if ($this->request->is('POST')) {
			// verifier si il existe deja
			// l'enregister //
			$this->User->save($this->request->data); 
		}else{
			// retourner une erreur
		}
	}

	public function index() {

		//echo "bonjour" ; 
		//print_r($this->User->find('all'));
		
	}
}
 ?>