<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController
{
	public $helpers = array(
		'Time' => array(
			'className' => 'CustomTime'
		)
	);

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index()
	{
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null)
	{
		$this->User->id = $id;
		if(!$this->User->exists())
		{
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add()
	{
		if($this->request->is('post'))
		{
			$this->User->create();
			if($this->User->save($this->request->data))
			{
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null)
	{
		$this->User->id = $id;
		if(!$this->User->exists())
		{
			throw new NotFoundException(__('Invalid user'));
		}
		if($this->request->is('post') || $this->request->is('put'))
		{
			if($this->User->save($this->request->data))
			{
				$user = $this->User->read(null, $this->Auth->user('id'));
				$this->Session->write('Auth.User', $user['User']);
				$this->Session->setFlash(__('The user has been saved'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		else
		{
			$this->request->data = $this->User->read(null, $id);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null)
	{
		if(!$this->request->is('post'))
		{
			throw new MethodNotAllowedException();
		}

		if($id == 1)
		{
			throw new NotFoundException('Unable to delete the root user');
		}

		$this->User->id = $id;
		if(!$this->User->exists())
		{
			throw new NotFoundException(__('Invalid user'));
		}
		if($this->User->delete())
		{
			$this->Session->setFlash(__('User deleted'), 'default', array('class' => 'alert alert-success'));
		}
		else
		{
			$this->Session->setFlash(__('User was not deleted'));
		}
		$this->redirect($_SERVER['HTTP_REFERER']);
	}

}
