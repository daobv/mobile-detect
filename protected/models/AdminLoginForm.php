<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class AdminLoginForm extends CFormModel
{
	public $username;
	public $password;
	public $rememberMe;
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, password', 'required'),
			// rememberMe needs to be a boolean
            array('rememberMe', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
			'rememberMe'=>'Remember me',
		);
	}

	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate()
	{
		if(!$this->hasErrors())
		{
            $this->_identity=new UserIdentity($this->username,User::model()->sha1Password($this->password));
			if($this->_identity->authenticate() != UserIdentity::ERROR_NONE)
		    $this->addError('password','Incorrect username or password.');
		}
	}

	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{

		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->username,User::model()->sha1Password($this->password));
			$this->_identity->authenticate();
        }
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else{
            $this->addError('password','Incorrect username or password.');
            return false;
        }

	}
}
