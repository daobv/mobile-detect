<?php
class FileForm extends CFormModel{
    public $name;
    public $slug;
    public $apk;
    public $ipa;
    public $jar;
    public function rules()
    {
        return array(

        );
    }
    public function attributeLabels()
    {
        return array(
            'name'=>'Tên file',
            'slug'=>'apk',
            'ipa'=>'Ipa',
            'jar' =>'Jar'
        );
    }
}