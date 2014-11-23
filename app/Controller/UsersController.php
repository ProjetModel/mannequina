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
				$this->Session->setFlash('Vous étes connecté.','default',array('class' => 'alert-box success radius'));
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash('Username ou password invalide.','default',array('class' => 'alert-box alert radius'));
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

	public function isAuthorized($user) {
	    // Here is where we should verify the role and give access based on role

		// si c'est un agent // 
		//print_r($user['statut']);
		//die(2) ; 
		if ($user['statut'] == 1) {

			// il ne peut pas ajouter de nouveau agents //

			if ($this->action == 'addAgent') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'delete') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'edit') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'index') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return true ; 
			}

			if ($this->action == 'index') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return true ; 
			}

		}

		// si c'est un invite // 
		if ($user['statut'] == 2) {

			// il ne peut pas ajouter de nouveau agents //
			if ($this->action == 'addAgent') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'delete') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'edit') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'profil') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'index') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}

			if ($this->action == 'validation') {
				$this->set("autoriserAgent", 0);
				$this->set("autoriserInvite", 0);
				return false ; 
			}
		}

	  
	    return parent::isAuthorized($user);
	}

	public function addAgent() {
		$this->layout = 'backOffice';
		if ($this->request->is('POST')) {
			// verifier si il existe deja
			// l'enregister //
			$this->User->create(); 
			$this->request->data['User']['statut'] = 1 ;
			$this->request->data['User']['active'] = 0 ;
			$this->request->data['User']['valide'] = 1 ;
			$this->request->data['User']['password'] = $this->generatePass() ;

			// IL faut l'envoyer par mail 


			if($this->User->save($this->request->data)){
				$this->Session->setFlash('Un agent a été ajouté.','default',array('class' => 'alert-box success radius'));
			}else{
				$this->Session->setFlash("L'agent n'a pas été ajouté.",'default',array('class' => 'alert-box alert  radius'));
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
            'limit' => 10,
            'order' => array('User.username' => 'asc' )
        );
        $users = $this->paginate('User');
        $this->set(compact('users'));
    }

     public function delete($id = null) {
         
        if (!$id) {
            $this->Session->setFlash("L'ID de l'utilisateur n'a pas été indiqué.",'default',array('class' => 'alert-box alert  radius'));
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash("Cette utilisateur n'existe pas.",'default',array('class' => 'alert-box alert  radius'));
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('statut', 3)) {
            $this->Session->setFlash("L'utilisateur a été supprimé.",'default',array('class' => 'alert-box success radius'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash("L'utilisateur n'a pas été supprimé.",'default',array('class' => 'alert-box alert  radius'));
        $this->redirect(array('action' => 'index'));
    }

    public function edit($id = null) {
 	$this->layout = 'backOffice';
            if (!$id) {
                 $this->Session->setFlash("L'ID de l'utilisateur n'a pas été indiqué.",'default',array('class' => 'alert-box alert  radius'));
                $this->redirect(array('action'=>'index'));
            }
 
            $user = $this->User->findById($id);
            if (!$user) {
                $this->Session->setFlash("Cette utilisateur n'existe pas.",'default',array('class' => 'alert-box alert  radius'));
                $this->redirect(array('action'=>'index'));
            }
 
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->User->id = $id;
                if ($this->User->save($this->request->data)) {
                   $this->Session->setFlash("L'utilisateur a été modifié.",'default',array('class' => 'alert-box success radius'));
                    $this->redirect(array('action' => 'edit', $id));
                }else{
                    $this->Session->setFlash("L'utilisateur n'a pas été modifié.",'default',array('class' => 'alert-box alert  radius'));
                }
            }
 
            if (!$this->request->data) {
                $this->request->data = $user;
            }
    }

     public function validation($id = null) {
         
        if (!$id) {
            $this->Session->setFlash("L'ID de l'utilisateur n'a pas été indiqué.",'default',array('class' => 'alert-box alert  radius'));
             echo "Saisissez un nom d'utilisateur";
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash("Cette utilisateur n'existe pas.",'default',array('class' => 'alert-box alert  radius'));
            $this->redirect(array('action'=>'index'));
        }

        if ($this->User->field("valide") == 1) {
        	if ($this->User->saveField('valide', 0)) {
            	$this->redirect(array('action' => 'index'));
        	}
        
        	$this->redirect(array('action' => 'index'));
        }else{
        	if ($this->User->saveField('valide', 1)) {
            	$this->redirect(array('action' => 'index'));
        	}
        
        	$this->redirect(array('action' => 'index'));
        }
       
    }

    // fonction qui permet de generer un mot de passe aleatoirement et securitaire// 
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