<?php

/**
 * This is the model class for table "url".
 *
 * The followings are the available columns in table 'url':
 * @property integer $id
 * @property integer $file_id
 * @property string $type
 * @property string $url
 * @property integer $day_click
 * @property integer $month_click
 * @property integer $total
 * @property integer $day_update
 * @property integer $month_update
 */
class Url extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'url';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('file_id, type, url', 'required'),
            array('file_id, day_click, month_click, total, day_update, month_update', 'numerical', 'integerOnly' => true),
            array('type', 'length', 'max' => 3),
            array('url', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, file_id, type, url, day_click, month_click, total, day_update, month_update', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array();
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'file_id' => 'File',
            'type' => 'Type',
            'url' => 'Url',
            'day_click' => 'Day Click',
            'month_click' => 'Month Click',
            'total' => 'Total',
            'day_update' => 'Day Update',
            'month_update' => 'Month Update',
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

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('file_id', $this->file_id);
        $criteria->compare('type', $this->type, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('day_click', $this->day_click);
        $criteria->compare('month_click', $this->month_click);
        $criteria->compare('total', $this->total);
        $criteria->compare('day_update', $this->day_update);
        $criteria->compare('month_update', $this->month_update);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Url the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function resetClick()
    {
        $url = Url::model()->findBySql("SELECT * FROM " . $this->tableName() . " ORDER BY id DESC");
        if ($url->day_update != date('d')) {
             Url::model()->updateAll(array('day_update' => date('d'), 'day_click' => 0, 'total' => 0));
           if ($url->month_update != date('m')) {
                Url::model()->updateAll(array('month_update' => date('m'), 'month_click' => 0));
            }
            $files = File::model()->findAll(array('order'=>'id'));
            foreach ($files as $file) {
                $statistic = new Statistic();
                $statistic->file_id = $file->id;
                $statistic->date = date('dmY');
                $statistic->save();
            }
        }
    }
}
