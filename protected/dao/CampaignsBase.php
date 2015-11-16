<?php

/**
 * This is the DAO model class for table "campaigns".
 *
 * The followings are the available columns in table 'campaigns':
 * @property string $id
 * @property string $src
 * @property string $des
 * @property string $shorten
 * @property string $key
 * @property integer $isRedirect
 * @property integer $is_deleted
 * @property string $created_date
 * @property string $updated_date
 * @property integer $user_id
 */
abstract class CampaignsBase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Campaigns the static model class
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
		return 'campaigns';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('isRedirect, is_deleted, user_id', 'numerical', 'integerOnly'=>true),
			array('src, des', 'length', 'max'=>2555),
			array('shorten, key', 'length', 'max'=>255),
			array('created_date, updated_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, src, des, shorten, key, isRedirect, is_deleted, created_date, updated_date, user_id', 'safe', 'on'=>'search'),
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
			'src' => 'Src',
			'des' => 'Des',
			'shorten' => 'Shorten',
			'key' => 'Key',
			'isRedirect' => 'Is Redirect',
			'is_deleted' => 'Is Deleted',
			'created_date' => 'Created Date',
			'updated_date' => 'Updated Date',
			'user_id' => 'User',
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
		$criteria->compare('src',$this->src,true);
		$criteria->compare('des',$this->des,true);
		$criteria->compare('shorten',$this->shorten,true);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('isRedirect',$this->isRedirect);
		$criteria->compare('is_deleted',$this->is_deleted);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('updated_date',$this->updated_date,true);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}