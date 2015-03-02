<?php

/**
 * This is the model class for table "tbl_environment".
 *
 * The followings are the available columns in table 'tbl_environment':
 * @property integer $environment_id
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
			array('purchase_journal_id, sales_journal_id, debtor_id, account_center_id, account_view_id, env_slug, env_title', 'required'),
            array('created_by, updated_by, purchase_journal_id, sales_journal_id, debtor_id, account_center_id, account_view_id, env_slug, env_title', 'length', 'max'=>255),
			array('created_on, updated_on', 'safe'),
			array('env_slug', 'unique', 'className' => 'Environment', 'attributeName' => 'env_slug', 'message'=>'This slug is already in use'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('environment_id, created, updated', 'safe', 'on'=>'search'),
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
			'env_title' => 'Title',
			'env_slug' => 'Slug',
			'account_view_id' => 'AccountView ID',
			'account_center_id' => 'AccountView Cost Center ID',
			'debtor_id' => 'Debtor ID',
			'sales_journal_id' => 'Sales Journal ID',
			'purchase_journal_id' => 'Purchase Journal ID',
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
	
	public function deleteEnvironment($id){
		
		
		$sql 	= "SELECT environments AS cnt FROM tbl_country WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_province WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_city WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_sale_type WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_tax WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_tax_group WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_email_settings WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_locale WHERE environments in ($id)";
		$sql   .= " UNION ";
		$sql   .= "SELECT environments AS cnt FROM tbl_sale_channel_type WHERE environments in ($id)";
		
		$connection	= Yii::app()->db;
		$result		= $connection->createCommand($sql)->queryAll();
		
		return count($result);
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
