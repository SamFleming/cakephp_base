<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel
{
	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'email';

	public $actsAs = array(
        'Acl' => array('type' => 'requester'),
        'Containable'
    );

    public $belongsTo = array('Group');

    public $hasMany = array('Quote');

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'email' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Must be specified'
			),
			'email' => array(
				'rule' => array('email'),
				'message' => 'Invalid email address'
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Password cannot be blank',
				'on' => 'create'
			),
		)
	);

	public function beforeSave()
	{
		if(isset($this->data['User']['password']))
		{
			if(empty($this->data['User']['password']))
			{
				unset($this->data['User']['password']);
			}
			else
			{
				$this->data['User']['password'] = PBKDF2Authenticate::hash($this->data['User']['password']);
			}
		}
		return true;
	}

	public function parentNode()
	{
        if (!$this->id && empty($this->data))
        {
            return null;
        }

        if (isset($this->data['User']['group_id']))
        {
            $groupId = $this->data['User']['group_id'];
        }
        else
        {
            $groupId = $this->field('group_id');
        }

        if (!$groupId)
        {
            return null;
        }
        else
        {
            return array('Group' => array('id' => $groupId));
        }
    }

    public function bindNode($user)
    {
	    return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
	}
}
