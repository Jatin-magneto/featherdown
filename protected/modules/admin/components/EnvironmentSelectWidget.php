<?php

class EnvironmentSelectWidget extends CWidget
{
    /**
     * @var CFormModel
     */
    public $form;

    public function run()
    {
        if (! $this->form instanceof CFormModel) {
            throw new RuntimeException('No valid form available.');
        }
        $this->render('environmentSelectWidget', array('form'=>$this->form));
    }
}

?>