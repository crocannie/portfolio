
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
}