<?php
// Print an array with HTML format
function pre($array){
    echo '<pre>';
    print_r($array);
    exit;
}

// line break 
function br(){
    echo '<br/>';    
}

// Below function will used for to convert date format
function customDateFormat($origial_format,$required_format,$date){
    if($date != ''){
        return DateTime::createFromFormat($origial_format, $date)->format($required_format);
    }else{
        return '';
    }
}

// Below function will return current date and time.
function customNow(){
    return new CDbExpression('NOW()');
}

// Below function will return the random alphanumeric string
function randomString( $length = 8 ) {
	$chars 		= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789".time();	
	$password 	= substr(str_shuffle( $chars ), 0, $length);
	return $password;
}

// Below function will return array of weekdays
function week() {
	$days = array(
    'Su'=>'Sunday',
    'M'=>'Monday',
    'Tu'=>'Tuesday',
    'W'=>'Wednesday',
    'Th'=>'Thursday',
    'F'=>'Friday',
    'Sa'=>'Saturday',
    );
	return $days;
}

// Below function will send an emails
function sendEmail($to, $cc = '', $bcc = '', $from, $subject, $message, $attachment = array(), $formname = '') {
	
	$mail = Yii::app()->Smtpmail;	
	$mail->SetFrom('featherdown.magneto@gmail.com', $from);
	$mail->Subject  = $subject;	
	$mail->MsgHTML($message);	
	
	if(is_array($to)) {
		
		for($t=0;$t<count($to);$t++){
			
			// add values in to email log table
			$data 	= array();
			$data[] = $to[$t];
			$data[] = $subject;
			$data[] = $formname;
			$data[] = '1';		
			Common::model()->addemaillog($data);
			
			$mail->AddAddress($to[$t], $to[$t]);
		}
	} else if($to != ''){		
		
		// add values in to email log table
		$data 	= array();
		$data[] = $to;
		$data[] = $subject;
		$data[] = $formname;
		$data[] = '1';
		
		Common::model()->addemaillog($data);
		
		$mail->AddAddress($to, $to);
	}
	
	if(is_array($cc)){
	
		for($c=0;$c<count($cc);$c++){
			
			// add values in to email log table
			$data 	= array();
			$data[] = $cc[$c];
			$data[] = $subject;
			$data[] = $formname;
			$data[] = '2';
			Common::model()->addemaillog($data);
			
			$mail->AddCC($cc[$c], $cc[$c]);
		}
	} else if($cc != ''){
		
		// add values in to email log table
		$data 	= array();
		$data[] = $cc;
		$data[] = $subject;
		$data[] = $formname;
		$data[] = '2';
		Common::model()->addemaillog($data);
		
		$mail->AddCC($cc, $cc);
	}
	
	if(is_array($bcc)){
	
		for($bcc=0;$bcc<count($bcc);$bcc++){
			
			// add values in to email log table
			$data 	= array();
			$data[] = $bcc[$bcc];
			$data[] = $subject;
			$data[] = $formname;
			$data[] = '3';
			Common::model()->addemaillog($data);
			
			$mail->AddBCC($bcc[$bcc], $bcc[$bcc]);
		}
	} else if($bcc != ''){
		
		// add values in to email log table
		$data 	= array();
		$data[] = $bcc;
		$data[] = $subject;
		$data[] = $formname;
		$data[] = '3';		
		Common::model()->addemaillog($data);
		
		$mail->AddBCC($bcc, $bcc);
	}
	
	
	
	for($i=0;$i<count($attachment);$i++){
		$mail->AddAttachment($attachment[$i]);
	}
	
	
	if(!$mail->Send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	}else {
		echo "Message sent!";
	}
	
	// Clear Recipients 
	$mail->ClearAllRecipients();	
}
?>