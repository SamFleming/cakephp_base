<?php

class HomeController extends AppController
{
	public $helpers = array('Html', 'Form');
	public $uses = array('User');

	public function beforeFilter()
	{
		parent::beforeFilter();

		$this->Auth->allow(array('index'));
	}

	public function beforeRender()
	{
		parent::beforeRender();
	}

	public function index()
	{
		// debug(get_defined_constants());
	}

	public function admin_index()
	{
		$this->set('title_for_layout', 'Admin Home');
	}

	public function login()
	{
		if($this->request->is('post'))
		{
			$loginSuccess = $this->Auth->login();
			if($loginSuccess)
			{
				$this->redirect($this->Auth->redirect());
			}
			else
			{
				$this->set('error', 'Invalid username or password');
			}
		}

		$this->set('title_for_layout', 'Login to your account');
	}

	public function logout()
	{
		$this->redirect($this->Auth->logout());
	}

	public function initdb()
	{
		$group = $this->User->Group;

		// Allow admins permissions for everything
		$group->id = 1;
		$this->Acl->allow($group, 'controllers');

		// Allow Registered Users only access to certain controllers
		$group->id = 2;
		$this->Acl->deny($group, 'controllers');
		$this->Acl->allow($group, 'Users/quotes');
		$this->Acl->allow($group, 'Quote/restore');

		exit;
	}
}