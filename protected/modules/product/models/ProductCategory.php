<?php

/**
 * This is the model class for table "tbl_product_category".
 *
 * The followings are the available columns in table 'tbl_product_category':
 * @property integer $category_id
 * @property string $title
 * @property integer $parent_category_id
 * @property integer $sales_group_tax_id
 * @property integer $purchase_group_tax_id
 * @property string $isactive
 * @property string $environments
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property Product1[] $product1s
 */
class ProductCategory extends CActiveRecord
{
	public $taxsales_title, $created, $updated, $taxpuchase_title;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_product_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('title, sales_group_tax_id, purchase_group_tax_id, isactive, environments', 'required'),
			array('parent_category_id, sales_group_tax_id, purchase_group_tax_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('isactive', 'length', 'max'=>1),
			array('parent_category_id, environments', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('category_id, title, taxsales_title, taxpuchase_title, parent_category_id, sales_group_tax_id, purchase_group_tax_id, isactive, environments, created, updated', 'safe', 'on'=>'search'),
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
			'product1s' => array(self::HAS_MANY, 'Product1', 'product_category_id'),
			'taxsales' => array(self::BELONGS_TO, 'Tax', 'sales_group_tax_id'),
			'taxpurchase' => array(self::BELONGS_TO, 'Tax', 'purchase_group_tax_id'),
			
			'parent' => array(self::BELONGS_TO, 'ProductCategory', 'parent_category_id', 'condition' => 't.parent_category_id <> 0'),
		        'children' => array(self::HAS_MANY, 'ProductCategory', 'parent_category_id'),
			'parentname' => array(self::BELONGS_TO, 'ProductCategory', 'parent_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'category_id' => 'Category',
			'title' => 'Title',
			'parent_category_id' => 'Parent Category',
			'sales_group_tax_id' => 'Sales Group Tax',
			'purchase_group_tax_id' => 'Purchase Group Tax',
			'isactive' => 'Is Active',
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
		
		$criteria->with = array('taxsales','taxpurchase');
		$criteria->compare('taxsales.title',$this->taxsales_title,true);
		$criteria->compare('taxpurchase.title',$this->taxpuchase_title,true);		

		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('t.title',$this->title,true);
		$criteria->compare('parent_category_id',$this->parent_category_id);		
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('environments',$this->environments,true);
		$criteria->compare('CONCAT(t.created_on,t.created_by)',$this->created,true);
		$criteria->compare('CONCAT(t.updated_on,t.updated_by)',$this->updated,true);
		
        $environment_cond = Yii::app()->session['environment_cond'];
        $criteria->addCondition("$environment_cond");
		
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'taxsales_title'=>array(
						'asc'=>'taxsales.title',
						'desc'=>'taxsales.title DESC',
					),
					'taxpuchase_title'=>array(
						'asc'=>'taxpurchase.title',
						'desc'=>'taxpurchase.title DESC',
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
	 * @return ProductCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getParent()
	{
		if($this->parent_category_id != 0 ) // do not know default values i just use 0
		{
		   return ProductCategory::model()->findByPk($this->parent_category_id);
		}else{
		   return $this->title;
		}
	}

}
