<?php

/**
 * This is the model class for table "tbl_tax".
 *
 * The followings are the available columns in table 'tbl_tax':
 * @property integer $tax_id
 * @property integer $tax_group_id
 * @property integer $country_id
 * @property string $province_id
 * @property string $value
 * @property string $value_type
 * @property string $vat_margin_value
 * @property string $vat_margin_value_type
 * @property integer $code
 * @property string $title
 * @property string $title_slug
 * @property string $isactive
 * @property string $publish_from
 * @property string $publish_until
 * @property string $environments
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 */
class Tax extends CActiveRecord
{
		public $taxgrouptitle;
		public $countryname;
		public $created, $updated;
		//public $provincename;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_tax';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tax_group_id, country_id, value, value_type, vat_margin_value, vat_margin_value_type, code, title, title_slug, isactive, environments', 'required'),
			array('title_slug', 'unique', 'className' => 'Tax', 'attributeName' => 'title_slug', 'message'=>'This slug is already in use'),
			array('tax_group_id, country_id, code', 'numerical', 'integerOnly'=>true),
			//array('publish_until','compare','compareAttribute'=>'publish_from','operator'=>'>', 'message'=>'Publish Until date must be greater than Publish From date.'),
			array('value, vat_margin_value', 'length', 'max'=>7),
			array('value, vat_margin_value', 'type', 'type'=>'float'),
			array('value, vat_margin_value', 'match', 'pattern'=>'/^[0-9]{1,12}(\.[0-9]{0,4})?$/'),
			array('value_type, vat_margin_value_type', 'length', 'max'=>50),
			array('title, title_slug', 'length', 'max'=>500),
			array('province_id, publish_from, publish_until','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('tax_id, tax_group_id, countryname, taxgrouptitle, province_name, value, value_type, vat_margin_value, vat_margin_value_type, code, title, title_slug, isactive, publish_from, publish_until, environments, created, updated', 'safe', 'on'=>'search'),
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
		'taxgroup' => array(self::BELONGS_TO, 'TaxGroup', 'tax_group_id'),
	        'country' => array(self::BELONGS_TO, 'Country', 'country_id'),
	        'state' => array(self::BELONGS_TO, 'Province', 'province_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'tax_id' => 'Tax',
			'tax_group_id' => 'Tax Group',
			'country_id' => 'Country',
			'province_id' => 'Province',
			'value' => 'Value',
			'value_type' => 'Value Type',
			'vat_margin_value' => 'Vat Margin Value',
			'vat_margin_value_type' => 'Vat Margin Value Type',
			'code' => 'Code',
			'title' => 'Title',
			'title_slug' => 'Title Slug',
			'isactive' => 'Is Active',
			'publish_from' => 'Publish From',
			'publish_until' => 'Publish Until',
			'environments' => 'Environments',
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
		//taxgrouptitle
		$criteria->with = array('taxgroup','country','state');
		$criteria->compare('taxgroup.title',$this->taxgrouptitle,true);
		$criteria->compare('country.country_name',$this->countryname,true);
		//$criteria->compare('state.province_name',$this->provincename,true);

		$criteria->compare('tax_id',$this->tax_id);
		$criteria->compare('tax_group_id',$this->tax_group_id);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('province_id',$this->province_id,true);
		$criteria->compare('value',$this->value,true);
		$criteria->compare('value_type',$this->value_type,true);
		$criteria->compare('vat_margin_value',$this->vat_margin_value,true);
		$criteria->compare('vat_margin_value_type',$this->vat_margin_value_type,true);
		$criteria->compare('code',$this->code);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('title_slug',$this->title_slug,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('publish_from',$this->publish_from,true);
		$criteria->compare('publish_until',$this->publish_until,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
	        
		$environment_cond = (Yii::app()->session['environment_cond'] == '')?'true':Yii::app()->session['environment_cond'];
	        $criteria->addCondition("$environment_cond");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'taxgrouptitle'=>array(
						'asc'=>'taxgroup.title',
						'desc'=>'taxgroup.title DESC',
					),
					'countryname'=>array(
						'asc'=>'country.country_name',
						'desc'=>'country.country_name DESC',
					),
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
	 * @return Tax the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
