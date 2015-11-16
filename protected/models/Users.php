<?php

class Users extends UsersBase
{
    const IS_ACTIVED = "1";

    public static $me;
    public $repeat_password;
    public $real_balance;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Users the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array_merge(
            parent::rules(),
            array(
                array('email', 'email'),
                array('email', 'unique'),
                array('facebook', 'url'),
            )
        );
    }

    public function register()
    {
        $str = explode('@', $this->email);
        $this->username = $str[0];

        return $this->save();
    }

    /**
     * @return Users
     */
    public static function me()
    {
        if (!self::$me) {
            $id = Yii::app()->user->id;
            self::$me = Users::model()->findByPk($id);
        }
        return self::$me;
    }

    public function login()
    {
        /** @var Users $model */
        $model = Users::findModel($this->email);
        if (!$model) {
            $this->addError('email', 'Email không tồn tại');
            return false;
        }

        if (strtolower($model->password) !== strtolower($this->password)) {
            $this->addError('password', 'Mật Khẩu Không Chính Xác');
            return false;
        }

        if (strtolower($model->is_actived) !== '1') {
            $this->addError('email', 'Email này chưa được kích hoạt');
            return false;
        }

        $this->id = $model->id;
        return true;
    }

    public static function findModel($input)
    {
        $criteria = new CDbCriteria();
        $criteria->addCondition('email = :input');
        $criteria->params = array(
            ':input' => $input,
        );

        $model = Users::model()->find($criteria);
        return $model;
    }

    public function updateInfo()
    {
        if ($this->password != $this->repeat_password) {
            $this->addError('repeat_passwrod', 'Password nhập lại không chính xác');
            return false;
        }

        return $this->save();
    }

    public function isHaveMin()
    {
        return $this->balance >= 0.8;
    }

    protected function afterFind()
    {
        parent::afterFind();
        $this->real_balance = number_format($this->balance / 100, 2);
    }


}