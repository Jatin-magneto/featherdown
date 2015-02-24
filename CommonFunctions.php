<?php
// Print an array with HTML format
function pre($array){
    echo '<pre>';
    print_r($array);
    exit;
}

// Below function will used for to convert date format
function customDateFormat($origial_format,$required_format,$date){
    return DateTime::createFromFormat($origial_format, $date)->format($required_format);    
}

// Below function will return current date and time.
function customNow(){
    return new CDbExpression('NOW()');
}

?>