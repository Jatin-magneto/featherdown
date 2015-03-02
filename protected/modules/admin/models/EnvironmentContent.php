<?php

/**
 * This is the model class for table "tbl_environment_content".
 *
 * The followings are the available columns in table 'tbl_environment_content':
 * @property string $environment_content_id
 * @property string $primary_table_id
 * @property integer $language_id
 * @property string $env_title
 * @property string $env_sub_title
 * @property string $env_title_slug
 * @property string $env_desc
 * @property integer $primary_table_flag
 *
 * The followings are the available model relations:
 * @property TblEnvironment $environment
 */
class EnvironmentContent extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_environment_content';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('env_title, env_sub_title,env_title_slug', 'required'),
			array('env_title, env_sub_title,env_title_slug,env_desc', 'safe'),
			//array('env_title_slug', 'unique','className' => 'EnvironmentContent', 'attributeName' => 'env_title_slug', 'message'=>'This slug is already in use'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('environment_content_id, primary_table_id, language_id, env_title, env_sub_title, env_title_slug, env_desc, primary_table_flag', 'safe', 'on'=>'search'),
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
			'language' => array(self::BELONGS_TO, 'Language', 'language_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'environment_content_id' => 'Environment Content',
			'primary_table_id' => 'Primary Table',
			'language_id' => 'Environment',
			'env_title' => 'Title',
			'env_sub_title' => 'Sub Title',
			'env_title_slug' => 'Title Slug',
			'env_desc' => 'Description',
			'primary_table_flag' => '1 = Payment Type, 2 = PDF, 3 = Product Category, 4 = conversation type and 5 = sale type so on',
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

		$criteria->compare('environment_content_id',$this->environment_content_id,true);
		$criteria->compare('primary_table_id',$this->primary_table_id,true);
		$criteria->compare('language_id',$this->language_id);
		$criteria->compare('env_title',$this->env_title,true);
		$criteria->compare('env_sub_title',$this->env_sub_title,true);
		$criteria->compare('env_title_slug',$this->env_title_slug,true);
		$criteria->compare('env_desc',$this->env_desc,true);
		$criteria->compare('primary_table_flag',$this->primary_table_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EnvironmentContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Get content information based on the record id and flag
	 *
	 *
	 *
	*/
	public function findEnvironmentContent($primary_table_id,$primary_table_flag)
    {
        return $this->findAll(array(
			'select'	=> 'env_title,env_sub_title,env_title_slug,env_desc',
            'order'		=> 't.language_id ASC',
            'condition'	=> array('primary_table_id' => $primary_table_id, 'primary_table_flag' => $primary_table_flag),
        ));
    }
}
