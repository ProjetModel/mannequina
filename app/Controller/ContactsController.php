<?php 
class ContactsController extends AppController {

	 	public function beforeFilter() {
	        parent::beforeFilter();
	        $this->Auth->allow('index'); 
    	}

    	public function isAuthorized($user) {
	    // Here is where we should verify the role and give access based on role
 
 		// un agent
		if ($user['statut'] == 1) {
			// il ne peut pas ajouter de nouveau agents //

			if ($this->action == 'messages') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return true ; 
			}

		}

		// si c'est un invite // 
		if ($user['statut'] == 2) {

			
		}

	  
	    return parent::isAuthorized($user);
	}

	  	public function index() {
	  		$this->layout = 'frontOffice';

			if ($this->request->is('POST')) {
				// verifier si il existe deja
				// l'enregister //
				$this->Contact->create(); 
				$this->request->data['Contact']['date'] = date("Y-m-d H:i:s");
				if($this->Contact->save($this->request->data)){
					$this->Session->setFlash("Le message a été envoyé",'default',array('class' => 'alert-box success radius'));
				}else{
					$this->Session->setFlash("Le message n'a pas été envoyé",'default',array('class' => 'alert-box alert radius'));
				}
			}else{
				// retourner une erreur
			}

    	}

    	public function messages(){
    		$this->layout = 'backOffice';
    		$messages = $this->Contact->find('all', array('conditions' => array('Contact.to' => null))) ; 
    		$this->set('messages', $messages) ; 
    	}

    	public function repondre($id){
    		$this->layout = 'backOffice';
    		App::uses('CakeEmail', 'Network/Email');
    		
    		$message = $this->Contact->findById($id) ; 
    		$this->set('message', $message) ; 

    		// recuperer les  réponses deja envoyées // 
    		$reponses = $this->Contact->find("all", array('conditions' => array('Contact.email' => $message['Contact']['email'], 'Contact.to !=' => null))) ;
    		$this->set('reponses', $reponses) ;  
    		//print_r($reponses);
    		//die(3); 

    		// capter la réponse et l'envoyer par mail // 
    		if ($this->request->is('post')) {

    			$Email = new CakeEmail();
    			$Email->emailFormat('html');
				$Email->from(array('sohaibdadi@gmail.com' => 'Mannequina')); // A modifier 
				$Email->to($message['Contact']['email']);
				$Email->subject("Relay :: ".$message['Contact']['title'] );
				// si le message est bien envoye, on l'enregiste en bd
				
				if ($Email->send($this->request->data['message']) ) {
					$this->Session->setFlash("Le message a été envoyé",'default',array('class' => 'alert-box success radius'));
					$this->Contact->create(); 
					$this->request->data['title'] = "Relay :: ".$message['Contact']['title'] ;
					$this->request->data['email'] = $message['Contact']['email'] ; 
					$this->request->data['to'] = $message['Contact']['email'] ; 
					$this->Contact->save($this->request->data);
					$this->redirect(array('action'=>'repondre',$id));
				}
				else{
					$this->Session->setFlash("Le message n'a pas été envoyé",'default',array('class' => 'alert-box alert radius'));
				}
    		}
    		
    	}
}
 ?>