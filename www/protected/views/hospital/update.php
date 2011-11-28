<?php
$this->breadcrumbs=array(
	'Hospitals'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Hospital', 'url'=>array('index')),
	array('label'=>'Create Hospital', 'url'=>array('create')),
	array('label'=>'View Hospital', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Hospital', 'url'=>array('admin')),
);
?>

<h1>Update Hospital <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>