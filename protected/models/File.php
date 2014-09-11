<?php

/**
 * This is the model class for table "file".
 *
 * The followings are the available columns in table 'file':
 * @property integer $id
 * @property string $name
 *  @property string $slug
 * @property string $date
 */
class File extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'file';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, date,slug', 'safe', 'on'=>'search'),
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
            'url'=>array(self::HAS_MANY,'Url','file_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Tên File',
			'date' => 'Ngày Khỏi Tạo',
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
		$criteria->compare('name',$this->name,true);

		$criteria->compare('date',$this->date,true);
        if(!isset($_GET['File_sort'])){
            $criteria->order="id DESC";
        }
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return File the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public function fileType(){
        return array(
            'apk',
            'ipa',
            'jar'
        );
    }
    public function getFileClick($id,$time,$type=null){
        $fileInfo = File::model()->findByPk($id);
        if($fileInfo){
            $file_url = $fileInfo['url'];
            $total = 0;
            foreach($file_url as $url){
                if($type){
                    if($url->type == $type){
                        if($time=="day")
                            return $url->day_click;
                        if($time=="month")
                            return $url->month_click;
                    }
                }
                $total += $url->day_click;
            }
            return $total;
        }
        return 0;
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
    public function fileNameLink($id,$name){
        return CHtml::link($name,array("statistic/admin",'id'=>$id));;
    }
    public function getFileNameById($id){
        $file = $this->model()->findByPk($id);
        if($file)
            return $file->name;
        return "No name";
    }
}
