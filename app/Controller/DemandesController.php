<?php 
class DemandesController extends AppController {

	 	public function beforeFilter() {
	        parent::beforeFilter();
	        $this->Auth->allow('signup'); 
    	}

	  	public function signup() {
	  		$this->layout = 'frontOffice';

	  		if ($this->request->is('post')) {
	           $this->Demande->create();
	           $this->request->data['Demande']['dateDemande'] = date("Y-m-d H:i:s");
	           if ($this->Demande->save($this->request->data)) {
	           		echo "votre message a été enregistrer" ;
	           }else{
	           		echo "La demande n'a pas ete enregistrer. Merci de reessayer." ;
	           }
        	} 
       
    	}

    	public function index(){
    		$this->layout = 'backOffice';
    		$demandes = $this->Demande->find('all'); 
    		$this->set('demandes', $demandes );
    	}
}
 ?>