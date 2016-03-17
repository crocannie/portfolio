<?php
namespace frontend\models;

use common\models\Students;
use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $secondName;
    public $firstName;
    public $midleName;
    public $idCity;
    public $idUniversity;
    public $idFacultet;
    public $idNapravlenie;
    public $idGroup;
    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Students', 'message' => 'Email уже используется.'],
            
            [['idCity', 'idUniversity', 'idFacultet', 'idNapravlenie', 'idGroup'], 'required'],
            [['secondName', 'firstName', 'midleName'], 'required'],

           // [['secondName', 'firstName', 'midleName'], 'string', 'max' => 255],
            
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'secondName' => 'Фамилия',
            'firstName' => 'Имя',
            'midleName' => 'Отчество',
            'idCity' => 'Город',
            'idUniversity' => 'Учебное заведение',
            'idFacultet' => 'Факультет',
            'idNapravlenie' => 'Направление',
            'idGroup' => 'Группа',
            'email' => 'Email',
            'password' => 'Пароль',
            'registrationCode' => 'Registration Code',
            'login' => 'Login',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $student = new Students();
        $student->email = $this->email;
        $student->secondName = $this->secondName;
        $student->firstName = $this->firstName;
        $student->midleName = $this->midleName;

        $student->idCity = $this->idCity;
        $student->idUniversity = $this->idUniversity;
        $student->idFacultet = $this->idFacultet;
        $student->idNapravlenie = $this->idNapravlenie;
        $student->idGroup = $this->idGroup;
//        $student->password = $this->password;

        $student->setPassword($this->password);

        return $student->save() ? $student : null;
    }
}
