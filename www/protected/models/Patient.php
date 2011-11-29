<?php

/**
 * This is the model class for table "patient".
 *
 * The followings are the available columns in table 'patient':
 * @property integer $id
 * @property integer $bed_id
 * @property string $name
 * @property string $dob
 * @property string $sex
 *
 * The followings are the available model relations:
 * @property Bed[] $beds
 * @property Chart[] $charts
 * @property Staff[] $staffs
 */
class Patient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Patient the static model class
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
		return 'patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

			array('bed_id', 'numerical', 'integerOnly'=>true),

			array('name', 'length', 'max'=>225),
			array('sex', 'length', 'max'=>6),
			array('dob,bed_id','required'),
			array('dob', 'safe'),
			array('name', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, bed_id, name, dob, sex', 'safe', 'on'=>'search'),
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
			'bed' => array(self::BELONGS_TO, 'Bed', 'bed_id'),
			'charts' => array(self::HAS_MANY, 'Chart', 'patient_id'),
			'staffs' => array(self::MANY_MANY, 'Staff', 'patient_staff(patient_id, staff_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'bed_id' => 'Bed',
			'name' => 'Name',
			'dob' => 'Dob',
			'sex' => 'Sex',
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
		$criteria->compare('bed_id',$this->bed_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('sex',$this->sex,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}