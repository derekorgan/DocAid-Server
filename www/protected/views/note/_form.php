<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'note-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'chart_id'); ?>
		<?php 		
		 	echo $form->dropDownList($model,'chart_id', CHtml::listData(Chart::model()->findAll(), 'id', 'id')); 			
		?>
		<?php echo $form->error($model,'chart_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'staff_id'); ?>
		<?php echo $form->dropDownList($model,'staff_id', CHtml::listData(Staff::model()->findAll(), 'id', 'name')); ?>
		<?php echo $form->error($model,'staff_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php 
                    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                      $this->widget('CJuiDateTimePicker',array(
                           'model'=>$model, //Model object
                        'attribute'=>'created', //attribute name
                                'mode'=>'datetime', //use "time","date" or "datetime" (default)
                             
                        'options'=>array( 'dateFormat'=>'yy-mm-dd', 'timeFormat'=>'hh-mm-ss','showAnim'=>'clip' ), // jquery plugin options
                        'language' => ''
                ));
            ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'updated'); ?>
		<?php 
                    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                      $this->widget('CJuiDateTimePicker',array(
                           'model'=>$model, //Model object
                        'attribute'=>'updated', //attribute name
                                'mode'=>'datetime', //use "time","date" or "datetime" (default)
                             
                        'options'=>array( 'dateFormat'=>'yy-mm-dd', 'timeFormat'=>'hh-mm-ss','showAnim'=>'clip' ), // jquery plugin options
                        'language' => ''
                ));
            ?>
		<?php echo $form->error($model,'updated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->