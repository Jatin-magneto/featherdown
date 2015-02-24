<?php

/**
 * This is the model class for table "tbl_environment".
 *
 * The followings are the available columns in table 'tbl_environment':
 * @property integer $environment_id
 * @property string $environment_name
 * @property string $environment_url
 * @property string $language_id
 * @property string $environment_currency
 * @property string $environment_currency_symbol
 * @property string $environment_desc
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property Affiliate[] $affiliates
 * @property Customer[] $customers
 * @property EnvironmentContent[] $environmentContents
 */
class Environment extends CActiveRecord
{
	public $created;
	public $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_environment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('environment_name, environment_url, language_id, environment_currency, environment_currency_symbol, environment_desc', 'required'),
            array('environment_name, environment_url, created_by, updated_by', 'length', 'max'=>255),
			array('environment_currency', 'length', 'max'=>100),
			array('environment_currency_symbol', 'length', 'max'=>15),
			array('environment_desc, created_on, updated_on', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('environment_id, environment_name, environment_url, language_id, environment_currency, environment_currency_symbol, environment_desc, created, updated', 'safe', 'on'=>'search'),
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
			'affiliates' => array(self::HAS_MANY, 'Affiliate', 'environment_id'),
			'customers' => array(self::HAS_MANY, 'Customer', 'environment_id'),
			'environmentContents' => array(self::HAS_MANY, 'EnvironmentContent', 'environment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'environment_id' => 'Environment',
			'environment_name' => 'Environment Name',
			'environment_url' => 'Environment Url',
			'language_id' => 'Language ID',
			'environment_currency' => 'Environment Currency',
			'environment_currency_symbol' => 'Environment Currency Symbol',
			'environment_desc' => 'Environment Desc',
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

		$criteria->compare('environment_id',$this->environment_id);
		$criteria->compare('environment_name',$this->environment_name,true);
		$criteria->compare('environment_url',$this->environment_url,true);
		$criteria->compare('language_id',$this->language_id,true);
		$criteria->compare('environment_currency',$this->environment_currency,true);
		$criteria->compare('environment_currency_symbol',$this->environment_currency_symbol,true);
		$criteria->compare('environment_desc',$this->environment_desc,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
        

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
	 * @return Environment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
