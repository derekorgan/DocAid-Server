<?php

/**
 * This is the model class for table "chart".
 *
 * The followings are the available columns in table 'chart':
 * @property integer $id
 * @property integer $patient_id
 * @property string $admitted
 *
 * The followings are the available model relations:
 * @property Patient $patient
 * @property Note[] $notes
 */
class Chart extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Chart the static model class
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
		return 'chart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('patient_id,admitted', 'required'),
			array('patient_id', 'numerical', 'integerOnly'=>true),
			array('admitted', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, patient_id, admitted', 'safe', 'on'=>'search'),
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
			'patient' => array(self::BELONGS_TO, 'Patient', 'patient_id'),
			'notes' => array(self::HAS_MANY, 'Note', 'chart_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'patient_id' => 'Patient',
			'admitted' => 'Admitted',
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
		$criteria->compare('patient_id',$this->patient_id);
		$criteria->compare('admitted',$this->admitted,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}