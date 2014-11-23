<?php 
	class DashBoardsController extends AppController {



		public function isAuthorized($user) {
		    // Here is where we should verify the role and give access based on role
	 		
	 		// un agent
			if ($user['statut'] == 1) {
				// il ne peut pas ajouter de nouveau agents //
					$this->set("autoriserAgent", 0);
					$this->set("autoriserInvite", 1);
					return true ; 
			}

			// si c'est un invite // 
			if ($user['statut'] == 2) {
				// il ne peut pas ajouter de nouveau agents //
					$this->set("autoriserAgent", 0);
					$this->set("autoriserInvite", 0);
					return true ; 
			}


		    return parent::isAuthorized($user);
		}


		public function index() {
	       $this->layout = 'backOffice';

	       // nombre d'utilisateurs // 
	       $this->loadModel('User');
	       $nbUser = $this->User->find('count');
	       $this->set('nbUser',$nbUser);

	       // nombre de demandes // 
	       $this->loadModel('Demande');
	       $nbDemandes = $this->Demande->find('count');
	       $this->set('nbDemandes',$nbDemandes);

	       // nombre de messages non lu // 
	       $this->loadModel('Contact');
	       $nbMessages = $this->Contact->find('count', array('conditions' => array('Contact.to' => null)));
	       $this->set('nbMessages',$nbMessages);


	       // nombre de modeles // 
	       //$this->loadModel('Modele');


    	}



	}

 ?>