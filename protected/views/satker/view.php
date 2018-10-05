<?php
/* @var $this SatkerController */
/* @var $model Satker */

$this->breadcrumbs=array(
	'Satkers'=>array('index'),
	$model->id_satker,
);

$this->menu=array(
	array('label'=>'List Satker', 'url'=>array('index')),
	array('label'=>'Create Satker', 'url'=>array('create')),
	array('label'=>'Update Satker', 'url'=>array('update', 'id'=>$model->id_satker)),
	array('label'=>'Delete Satker', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_satker),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Satker', 'url'=>array('admin')),
);
?>

<h1>View Satker #<?php echo $model->id_satker; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_satker',
		'id_unit',
		'nama_satker',
	),
)); ?>
