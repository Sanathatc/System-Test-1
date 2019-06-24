<?php

namespace app\models;


use yii\db\ActiveRecord;

use Yii;
use yii\base\Model;


class User extends ActiveRecord implements \yii\web\IdentityInterface
{
    
    /*public $id;
    public $username;
    public $password;*/
    public $authKey;
    public $accessToken;   
    
    public static function tableName() { return 'user'; }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        $user = self::find()->where(['user_id' => $id])->one();
        if(!$user){
            return null;
        }
        return new static($user);
       
    }
    

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        
        $user= self::find()->where(['email_id' => $username])->one();
        if(!$user){
            return null;
        }
        return new static($user);
       
    }

    public static function findByCompany($company)
    {
       
        $comp= self::find()->where(['dept_id' => $company])->one();
      
       if(!$comp)
        {
            return null;
        }
        return new static($comp);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        
        return sha1($this->password) === sha1($password);
        //return sha1($model->password)=== sha1($password);
    }

}
