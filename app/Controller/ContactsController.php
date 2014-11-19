<?php 
class ContactsController extends AppController {

	 	public function beforeFilter() {
	        parent::beforeFilter();
	        $this->Auth->allow('index'); 
    	}

	  	public function index() {
	  		$this->layout = 'frontOffice';

			if ($this->request->is('POST')) {
				// verifier si il existe deja
				// l'enregister //
				$this->Contact->create(); 
				$this->request->data['Contact']['date'] = date("Y-m-d H:i:s");
				if($this->Contact->save($this->request->data)){
					echo "Enregistrement reussi" ; 
				}else{
					echo "echeque de l'enregistrement" ; 
				}
			}else{
				// retourner une erreur
			}

    	}

    	public function messages(){
    		$this->layout = 'backOffice';
    		$messages = $this->Contact->find('all') ; 
    		$this->set('messages', $messages) ; 
    	}
}
 ?>