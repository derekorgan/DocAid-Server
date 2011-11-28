<?php
$this->breadcrumbs=array(
	'Charts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Chart', 'url'=>array('index')),
	array('label'=>'Create Chart', 'url'=>array('create')),
	array('label'=>'Update Chart', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Chart', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Chart', 'url'=>array('admin')),
);
?>

<h1>View Chart #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'patient_id',
		'admitted',
	),
)); ?>
