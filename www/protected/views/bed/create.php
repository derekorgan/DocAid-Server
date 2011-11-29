<?php
$this->breadcrumbs=array(
	'Beds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Bed', 'url'=>array('index')),
	array('label'=>'Manage Bed', 'url'=>array('admin')),
);
?>

<h1>Create Bed</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>