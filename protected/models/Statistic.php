<?php

/**
 * This is the model class for table "statistic".
 *
 * The followings are the available columns in table 'statistic':
 * @property integer $id
 * @property string $day
 * @property integer $file_id
 * @property integer $apk
 * @property integer $ipa
 * @property integer $jar
 * @property string $date
 */
class Statistic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'statistic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('file_id', 'required'),
			array('file_id, apk, ipa, jar', 'numerical', 'integerOnly'=>true),
			array('date', 'length', 'max'=>255),
			array('day', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, day, file_id, apk, ipa, jar, date', 'safe', 'on'=>'search'),
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
			'day' => 'Ngày',
			'file_id' => 'Tên File',
			'apk' => 'Apk',
			'ipa' => 'Ipa',
			'jar' => 'Jar',
			'date' => 'Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('day',$this->day,true);
		$criteria->compare('apk',$this->apk);
		$criteria->compare('ipa',$this->ipa);
		$criteria->compare('jar',$this->jar);
        $condition = "file_id = ".$this->file_id;
        if(isset($_GET['start_date']) && isset($_GET['end_date'])){
                $condition .= " AND date >= ".$_GET['start_date']." AND date <= ".$_GET['end_date'];
        }
        $criteria->condition = $condition;
        $criteria->order="id DESC";
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination'=>false,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Statistic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
