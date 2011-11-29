<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'chart-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'patient_id'); ?>
		<?php  echo $form->dropDownList($model,'patient_id', CHtml::listData(Patient::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'patient_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'admitted'); ?>
		<?php 
                    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                      $this->widget('CJuiDateTimePicker',array(
                           'model'=>$model, //Model object
                        'attribute'=>'admitted', //attribute name
                                'mode'=>'datetime', //use "time","date" or "datetime" (default)
                             
                        'options'=>array( 'dateFormat'=>'yy-mm-dd', 'timeFormat'=>'hh-mm-ss','showAnim'=>'clip'), // jquery plugin options
                        'language' => ''
                ));
            ?>
		<?php echo $form->error($model,'admitted'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->