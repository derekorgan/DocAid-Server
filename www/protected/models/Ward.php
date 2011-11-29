<?php

/**
 * This is the model class for table "ward".
 *
 * The followings are the available columns in table 'ward':
 * @property integer $id
 * @property integer $hospital_id
 * @property string $name
 * @property string $mac
 *
 * The followings are the available model relations:
 * @property Room[] $rooms
 * @property Hospital $hospital
 */
class Ward extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ward the static model class
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
		return 'ward';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hospital_id', 'required'),
			array('hospital_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('mac', 'length', 'max'=>90),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hospital_id, name, mac', 'safe', 'on'=>'search'),
			//Mac Address Validator
			 array('mac', 'ext.validators.FMACValidator'),
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
			'rooms' => array(self::HAS_MANY, 'Room', 'ward_id'),
			'hospital' => array(self::BELONGS_TO, 'Hospital', 'hospital_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hospital_id' => 'Hospital',
			'name' => 'Name',
			'mac' => 'Mac',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('hospital_id',$this->hospital_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('mac',$this->mac,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}