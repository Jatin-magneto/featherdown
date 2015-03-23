<?php

class Common extends CActiveRecord
{
	public function addlog($data){
		
		$logs 		= addslashes($data[0]);
		$formname 	= addslashes($data[1]);
		
		$connection = Yii::app()->db; 		
		$sql   		= "INSERT INTO tbl_log set logs = '".$logs."', formname =  '".$formname."', logtime = NOW()";
		$command 	= $connection->createCommand($sql);
		$rowCount	= $command->execute();
	}
	
	public function addcronlog($logtext){
		
		$cronname	= addslashes($data[0]);
		
		$connection = Yii::app()->db;		
		$sql   		= "INSERT INTO tbl_cronlog set cronname = '".$cronname."', crontime = NOW()";
		$command 	= $connection->createCommand($sql);
		$rowCount	= $command->execute();
	}
	
	public function addemaillog($data){
		
		$email_add	= addslashes($data[0]);
		$subject	= addslashes($data[1]);
		$formname	= addslashes($data[2]);
		$to_cc_bcc	= $data[3];
		
		$connection = Yii::app()->db;		
		$sql   		= "INSERT INTO tbl_emaillog set email_address = '".$email_add."', subject =  '".$subject."', formname = '".$formname."', to_cc_bcc = '".$to_cc_bcc."', sendon = NOW()";
		$command 	= $connection->createCommand($sql);
		$rowCount	= $command->execute();
	}
	
	public function getRow($sql){		
		$connection = Yii::app()->db;
		$command 	= $connection->createCommand($sql);
		$rowCount	= $command->execute();
		$dataReader	= $command->query();
		$row		= $command->queryRow();
		return $row;
	}
	
	public function getAllRow($sql){
		
		$connection = Yii::app()->db;
		$command 	= $connection->createCommand($sql);
		$rowCount	= $command->execute();
		$dataReader	= $command->query();
		$rows		= $command->queryAll();
		
		return $rows;
	}
	
	public function executeQuery($sql){
		$connection = Yii::app()->db;
		$command 	= $connection->createCommand($sql);
		return $rowCount	= $command->execute();
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Product the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
