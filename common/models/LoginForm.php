<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\User;

use common\models\Students;
use common\models\Employee;

/**
 * Login form
 */
//class LoginForm extends Model
class LoginForm extends Model

{
    public $username;
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user;
    private $_student = false;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            //[['username', 'password'], 'required'],
            [['username', 'password'], 'required','on'=>'default'],
            [['email', 'password'], 'required','on'=>'loginWithEmail'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            ['email', 'email'],
            // password is validated by validatePassword()
            //['password', 'validatePassword'],
            ['password', 'validatePassword'],

        ];
    }
    public function authenticate($attribute, $params)
    {
        $this->_identity = new UserIdentity($this->email,$this->password);
        if(!$this->_identity->authenticate())
            $this->addError('password','Неправильное имя пользователя или пароль.');
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute)
    {
/*        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }*/

        if (!$this->hasErrors()) {
            $user = $this->getStudent();
            if (!$user || !$user->validatePassword($this->password)) {
                $field = ($this->scenario === 'loginWithEmail') ? 'email' : 'username';
                $this->addError($attribute, 'Неправильный'.$field.'или пароль.');
            }
        }
    }
    public function attributeLabels()
    {
        return [
            'username' => 'name',
            'email' => 'Email',
            'password' => 'Пароль',
            'login' => 'Login',
            'rememberMe' => 'Запомни меня',
        ];
    }
    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        /*
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }*/

        if ($this->validate()){
            return Yii::$app->user->login($this->getStudent());
        } else {
            return Yii::$app->employee->login($this->getUser());
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    // protected function getUser()
    // {
    //     if ($this->_user === false) {
    //         $this->_user = Students::findByUsername($this->username);
    //     }

    //     return $this->_user;
    // }

    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Employee::findByUsername($this->username);
        }

        return $this->_user;
    }

    protected function getStudent()
    {
        if ($this->_student === false) {
            if ($this->scenario === 'loginWithEmail'){
                $this->_student = Students::findByEmail($this->email);

            }else{
                    $this->_student = Students::findByUsername($this->email);
                }
        }
        return $this->_student;
    }
}
