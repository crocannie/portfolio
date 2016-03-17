<?php

namespace common\models;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
use yii\base\Security;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $secondName
 * @property string $firstName
 * @property string $midleName
 * @property integer $idCity
 * @property integer $idUniversity
 * @property integer $idFacultet
 * @property integer $idNapravlenie
 * @property integer $idGroup
 * @property string $email
 * @property string $password
 * @property string $registrationCode
 * @property integer $login
 *
 * @property Achievements[] $achievements
 * @property AchievementsKTD[] $achievementsKTDs
 * @property AchievementsPresident[] $achievementsPresidents
 * @property AchievementsSport[] $achievementsSports
 * @property Articles[] $articles
 * @property Grants[] $grants
 * @property KtdParticipation[] $ktdParticipations
 * @property Patents[] $patents
 * @property PublicPerformance[] $publicPerformances
 * @property Rni[] $rnis
 * @property SocialParticipation[] $socialParticipations
 * @property SportParticipation[] $sportParticipations
 * @property Cities $idCity0
 * @property Universities $idUniversity0
 * @property Facultet $idFacultet0
 * @property Napravlenie $idNapravlenie0
 * @property Sgroup $idGroup0
 */
class Students extends \yii\db\ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;

    //public $password;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

/*    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }*/
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCity', 'idUniversity', 'idFacultet', 'idNapravlenie', 'idGroup', 'login'], 'integer'],
            [['email', 'password'], 'required'],
            //[['email', 'password'], 'filter', 'filter'=>'trim'],
            [['email'], 'email'],
            [['email'], 'unique', 'message'=>'Почта уже используется'],
            [['secondName', 'firstName', 'midleName', 'email', 'password', 'registrationCode'], 'string', 'max' => 64]
        ];    
    }

    /**
     * @inheritdoc
     */





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
     * @return \yii\db\ActiveQuery
     */
    public function getAchievements()
    {
        return $this->hasMany(Achievements::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsKTDs()
    {
        return $this->hasMany(AchievementsKTD::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsPresidents()
    {
        return $this->hasMany(AchievementsPresident::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchievementsSports()
    {
        return $this->hasMany(AchievementsSport::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrants()
    {
        return $this->hasMany(Grants::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKtdParticipations()
    {
        return $this->hasMany(KtdParticipation::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatents()
    {
        return $this->hasMany(Patents::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublicPerformances()
    {
        return $this->hasMany(PublicPerformance::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRnis()
    {
        return $this->hasMany(Rni::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSocialParticipations()
    {
        return $this->hasMany(SocialParticipation::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSportParticipations()
    {
        return $this->hasMany(SportParticipation::className(), ['idStudent' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCity0()
    {
        return $this->hasOne(Cities::className(), ['id' => 'idCity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUniversity0()
    {
        return $this->hasOne(Universities::className(), ['id' => 'idUniversity']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFacultet0()
    {
        return $this->hasOne(Facultet::className(), ['id' => 'idFacultet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdNapravlenie0()
    {
        return $this->hasOne(Napravlenie::className(), ['id' => 'idNapravlenie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdGroup0()
    {
        return $this->hasOne(Sgroup::className(), ['id' => 'idGroup']);
    }

/*    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
        

        $student = new Students();
        $student->email = $this->email;
        $student->setPassword($this->password);
     //   $student->generateAuthKey();

        return $student->save() ? $student : null;
    }*/

    public static function findByUsername($email)
    {
       // return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
        return static::findOne([
                'email'=>$email
            ]);
    }

    public static function findByEmail($email)
    {
        return static::findOne([
                'email'=>$email
            ]);
    }

//Авторизация
    public function setPassword($password)
    {
        $this->password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public static function findIdentity($id)
    {
        return static::findOne([
            'id'=>$id
        ]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->password;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($password)
    {
        return $this->getAuthKey() === $password;
    }

    public function findModel($id)
    {
        if (($model = Students::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
