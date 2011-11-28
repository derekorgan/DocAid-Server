<?php
$this->breadcrumbs=array(
	'Staffs',
);

$this->menu=array(
	array('label'=>'Create Staff', 'url'=>array('create')),
	array('label'=>'Manage Staff', 'url'=>array('admin')),
);
?>

<h1>Staffs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
