<?php 
class DemandesController extends AppController {

	 	public function beforeFilter() {
	        parent::beforeFilter();
	        $this->Auth->allow('signup'); 
    	}

    	public function isAuthorized($user) {
	    // Here is where we should verify the role and give access based on role
 
 		// un agent
		if ($user['statut'] == 1) {
			// il ne peut pas ajouter de nouveau agents //

			if ($this->action == 'index') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 1);
				return true ; 
			}

		}

		// si c'est un invite // 
		if ($user['statut'] == 2) {

			
		}

	  
	    return parent::isAuthorized($user);
	}

	  	public function signup() {
	  		$this->layout = 'frontOffice';

	  		if ($this->request->is('post')) {
	           $this->Demande->create();
	           $this->request->data['Demande']['dateDemande'] = date("Y-m-d H:i:s");
	            $this->request->data['Demande']['valide'] = 0;
	           if ($this->Demande->save($this->request->data)) {
	           		$this->Session->setFlash("Votre demande a été enregistré.",'default',array('class' => 'alert-box success radius'));
	           }else{
	           		$this->Session->setFlash("Votre demande n'a pas été enregistré.",'default',array('class' => 'alert-box alert radius'));
	           }
        	} 
       
    	}

    	public function index(){
    		$this->layout = 'backOffice';
    		$demandes = $this->Demande->find('all'); 
    		$this->set('demandes', $demandes );
    	}

    	public function valider($id){
    		$this->loadModel('User');
    		if (!$id) {
            $this->Session->setFlash("L'ID de l'utilisateur n'a pas été indiqué.",'default',array('class' => 'alert-box alert  radius'));
            $this->redirect(array('action'=>'index'));
        	}
         
	        $this->Demande->id = $id;
	        if (!$this->Demande->exists()) {
                $this->Session->setFlash("Cette utilisateur n'existe pas.",'default',array('class' => 'alert-box alert  radius'));
	            $this->redirect(array('action'=>'index'));
	        }

	        if ($this->Demande->field("valide") == 1) {
	        	if ($this->Demande->saveField('valide', 0)) {

	        		// desactiver l'utilisateur invite
	        		$user = $this->User->findByUsername($this->Demande->field("username"));
	        		$this->User->id = $user['User']['id']; 
	        		$this->User->saveField('valide', 0);

	        		// rediriger // 
	            	$this->redirect(array('action' => 'index'));
	        	}
	        
	        	$this->redirect(array('action' => 'index'));
	        }else{
	        	if ($this->Demande->saveField('valide', 1)) {

	        		//tester si l'utilisateur invite existe deja
	        		$user = $this->User->findByUsername($this->Demande->field("username"));
	        		if (!empty($user)) {
	        			// l'utilisateur existe
	        			// mettre valider a 1 
	        			$this->User->id = $user['User']['id']; 
	        			$this->User->saveField('valide', 1);
	        		}else{
	        			// l'utilisateur n'existe pas. Donc le creer // 
	        			// creer un nouvel utilisateur invite // 
	        			$this->creerUser(
	        				$this->Demande->field("username"),
	        				$this->Demande->field("email"),
	        				$this->Demande->field("lastname"),
	        				$this->Demande->field("firstname"),
	        				$this->Demande->field("telephone"),
	        				$this->Demande->field("profession"),
	        				$this->Demande->field("entreprise")
	        			);
	        		}
	        		
	            	$this->redirect(array('action' => 'index'));
	        	}
	        
	        	$this->redirect(array('action' => 'index'));
	        }
    	}

    	public function creerUser($Username,$email,$lastname,$firstname,$telephone,$profession,$entreprise){


    		App::uses('CakeEmail', 'Network/Email');
    		$this->loadModel('User');
    		$passWord = $this->generatePass();
    		$date = array(
    				'username' => $Username,
    				'email' => $email,
    				'firstname' => $firstname,
    				'password' => $passWord,
    				'lastname' => $lastname,
    				'telephone' => $telephone,
    				'statut' => 2,
    				'valide' => 1,
    				'profession' => $profession,
    				'entreprise' => $entreprise,
    				'dateDemande' => date("Y-m-d H:i:s")

    			); 

    		$this->User->Create();
    		
    		if ($this->User->save($date)) {

    			// envoi de mail a l'utilisateur // 
    			$Email = new CakeEmail();
				$Email->from(array('sohaibdadi@gmail.com' => 'Mannequina')); // A modifier 
				$Email->to($email);
				$Email->subject("Votre demande a été accepté pour visionner les 3D models");
				$message = "Username : ".$Username."<br> PassWord : ".$passWord ; 
				if ($Email->send($message)){
                $this->Session->setFlash("Les identifiants ont été envoyes à l'utilisateur.",'default',array('class' => 'alert-box success  radius'));
				}
    			
    		}

    	}

    	public function generatePass() {
		    $nbChar = 8;
		    $characters = '023456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ#!$';
		    $specials = '#!?$%&*';
		 
		    $firstPart = substr(str_shuffle($characters), 0, $nbChar - 1);
		    $lastPart = substr(str_shuffle($specials), 0, 1);
		 
		    return str_shuffle($firstPart . $lastPart);
		}
}
 ?>