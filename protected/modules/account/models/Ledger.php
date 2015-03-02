<?php

/**
 * This is the model class for table "tbl_ledger".
 *
 * The followings are the available columns in table 'tbl_ledger':
 * @property integer $ledger_id
 * @property integer $ledger_no
 * @property string $ledger_title
 * @property string $ledger_slug
 * @property string $isactive
 * @property string $created_on
 * @property string $created_by
 * @property string $updated_on
 * @property string $updated_by
 *
 * The followings are the available model relations:
 * @property LedgerCategory[] $ledgerCategories
 */
class Ledger extends CActiveRecord
{
	public $created;
	public $updated;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_ledger';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ledger_no, ledger_title, ledger_slug, isactive', 'required'),
			array('ledger_slug', 'unique', 'className' => 'Ledger', 'attributeName' => 'ledger_slug', 'message'=>'This slug is already in use'),
			array('ledger_no', 'numerical', 'integerOnly'=>true),
			array('ledger_title, ledger_slug', 'length', 'max'=>255),
			array('isactive', 'length', 'max'=>1),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ledger_id, ledger_no, ledger_title, ledger_slug, isactive, created_on, created_by, updated_on, updated_by, created, updated', 'safe', 'on'=>'search'),
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
			'ledgerCategories' => array(self::HAS_MANY, 'LedgerCategory', 'ledger_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ledger_id' => 'Ledger',
			'ledger_no' => 'Ledger Number',
			'ledger_title' => 'Title',
			'ledger_slug' => 'Slug',
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

		$criteria->compare('ledger_id',$this->ledger_id);
		$criteria->compare('ledger_no',$this->ledger_no,true);
		$criteria->compare('ledger_title',$this->ledger_title,true);
		$criteria->compare('ledger_slug',$this->ledger_slug,true);
		$criteria->compare('isactive',$this->isactive,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('created_by',$this->created_by,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('updated_by',$this->updated_by,true);
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
	 * @return Ledger the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
