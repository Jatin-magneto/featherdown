<?php

$form = $this->beginWidget('CActiveForm', array(
    'id' => 'home-newsletter-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
));

echo $form->textField($newsletterSubscribeForm, 'email');
echo $form->error($newsletterSubscribeForm, 'email');
echo CHtml::link("subscribe", "#", array('class'=>'btSubscribe'));
$this->endWidget();

?>