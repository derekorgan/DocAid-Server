<?php
$this->breadcrumbs=array(
	'Hospitals'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Hospital', 'url'=>array('index')),
	array('label'=>'Create Hospital', 'url'=>array('create')),
	array('label'=>'Update Hospital', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Hospital', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Hospital', 'url'=>array('admin')),
);
?>

<h1>View Hospital #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
