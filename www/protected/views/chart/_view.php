<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('patient_id')); ?>:</b>
	<?php echo CHtml::encode($data->patient_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admitted')); ?>:</b>
	<?php echo CHtml::encode($data->admitted); ?>
	<br />


</div>