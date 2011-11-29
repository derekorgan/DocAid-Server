<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'patient-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>



	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>225)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>
	<?php 
            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
			  $this->widget('CJuiDateTimePicker',array(
				   'model'=>$model, //Model object
				'attribute'=>'dob', //attribute name
						'mode'=>'date', //use "time","date" or "datetime" (default)
				'options'=>array( 'dateFormat'=>'yy-mm-dd'), // jquery plugin options
				'language' => ''
        ));
    ?>
	<div class="row">
		<?php echo $form->labelEx($model,'sex'); 
      		  $sex['Male']='Male';
				$sex['Female']='Female';			
			 	echo $form->dropDownList($model,'sex', $sex , ''); ?>
		<?php echo $form->error($model,'sex'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->