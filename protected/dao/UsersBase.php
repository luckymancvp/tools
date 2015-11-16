<?php

/**
 * This is the DAO model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id
 * @property string $username
 * @property integer $balance
 * @property string $email
 * @property string $password
 * @property integer $is_deleted
 * @property string $created_time
 * @property string $updated_time
 * @property string $facebook
 * @property integer $is_actived
 * @property string $emailTo
 */
abstract class UsersBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password', 'required'),
			array('balance, is_deleted, is_actived', 'numerical', 'integerOnly'=>true),
			array('username, email, password, facebook, emailTo', 'length', 'max'=>255),
			array('created_time, updated_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, username, balance, email, password, is_deleted, created_time, updated_time, facebook, is_actived, emailTo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'balance' => 'Balance',
			'email' => 'Email',
			'password' => 'Password',
			'is_deleted' => 'Is Deleted',
			'created_time' => 'Created Time',
			'updated_time' => 'Updated Time',
			'facebook' => 'Facebook',
			'is_actived' => 'Is Actived',
			'emailTo' => 'Email To',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('balance',$this->balance);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('created_time',$this->created_time,true);
		$criteria->compare('updated_time',$this->updated_time,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('is_actived',$this->is_actived);
		$criteria->compare('emailTo',$this->emailTo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}