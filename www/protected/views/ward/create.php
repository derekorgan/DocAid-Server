<?php
$this->breadcrumbs=array(
	'Wards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ward', 'url'=>array('index')),
	array('label'=>'Manage Ward', 'url'=>array('admin')),
);
?>

<h1>Create Ward</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>