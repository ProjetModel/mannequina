<?php 
class UsersController extends AppController {

	 public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login'/*,'signup'*/); 
    }

    public function login() {
         $this->layout = 'frontOffice';
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('action' => 'index'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
               echo "bonjour, vous etes connecte" ; 
                $this->redirect($this->Auth->redirectUrl());
            } else {
                echo "informations invalide" ;
            }
        } 
    }

    public function logout() {
        $this->redirect($this->Auth->logout());
    }

    /*
	public function signup() {
		$this->layout = 'frontOffice';
		if ($this->request->is('POST')) {
			// verifier si il existe deja
			// l'enregister //
			$this->User->create(); 
			$this->request->data['User']['statut'] = 2 ;
			$this->request->data['User']['active'] = 0 ;
			$this->request->data['User']['valide'] = 0 ;
			if($this->User->save($this->request->data)){
				echo "Enregistrement reussi" ; 
			}else{
				echo "echeque de l'enregistrement" ; 
			}
		}else{
			// retourner une erreur
		}
	}
	*/

	public function addAgent() {
		$this->layout = 'backOffice';
		if ($this->request->is('POST')) {
			// verifier si il existe deja
			// l'enregister //
			$this->User->create(); 
			$this->request->data['User']['statut'] = 1 ;
			$this->request->data['User']['active'] = 0 ;
			$this->request->data['User']['valide'] = 1 ;
			if($this->User->save($this->request->data)){
				echo "Enregistrement reussi" ; 
			}else{
				echo "echec de l'enregistrement" ; 
			}
		}else{
			// retourner une erreur
		}
	}

	public function profil($id = null) {
		$this->layout = 'backOffice';
		$this->set('user',$this->User->findById($id)['User']);
		
	}

	  public function index() {
	  	$this->layout = 'backOffice';
        $this->paginate = array(
            'limit' => 6,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }
}
 ?>