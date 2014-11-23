<?php 
class TDsController extends AppController {


    	
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
    	}

}
 ?>