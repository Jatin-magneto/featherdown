<?php

/**
 * This is the model class for table "tbl_region".
 *
 * The followings are the available columns in table 'tbl_region':
 * @property integer $region_id
 * @property string $region_name
 * @property string $region_slug
 * @property string $region_abbreviation
 * @property string $environments
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 */
class Region extends CActiveRecord
{
	public $created;
	public $updated;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_region';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('region_name, region_slug, environments, isactive', 'required'),
			array('region_slug', 'unique', 'className' => 'Region', 'attributeName' => 'region_slug', 'message'=>'This slug is already in use'),
			array('region_slug', 'length', 'max'=>50),
			array('region_abbreviation', 'length', 'max'=>5),
			array('isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('region_id, region_name, region_slug, region_abbreviation, environments, isactive, created_on, created_by, updated_on, updated_by, created, updated', 'safe', 'on'=>'search'),
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
			'region_id' => 'Region',
			'region_name' => 'Region Name',
			'region_slug' => 'Region Slug',
			'region_abbreviation' => 'Abbreviation',
			'environments' => 'Environments',
			'isactive' => 'Is Active',
			'created_on' => 'Created On',
			'created_by' => 'Created By',
			'updated_on' => 'Updated On',
			'updated_by' => 'Updated By',
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
		
		$criteria->compare('region_id',$this->region_id);
		$criteria->compare('region_name',$this->region_name,true);
		$criteria->compare('region_slug',$this->region_slug,true);
		$criteria->compare('region_abbreviation',$this->region_abbreviation,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		
		$environment_cond = Yii::app()->session['environment_cond'];
		$criteria->addCondition("$environment_cond");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'created'=>array(
						'asc'=>'t.created_on',
						'desc'=>'t.created_on DESC',
					),
					'updated'=>array(
						'asc'=>'t.updated_on',
						'desc'=>'t.updated_on DESC',
					),
					'*',
				),
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Region the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
