<?php
/* @var $this KlpAreaController */
/* @var $model KlpArea */

$this->breadcrumbs=array(
	'Klp Areas'=>array('index'),
	$model->id_klp,
);

$this->menu=array(
	array('label'=>'List KlpArea', 'url'=>array('index')),
	array('label'=>'Create KlpArea', 'url'=>array('create')),
	array('label'=>'Update KlpArea', 'url'=>array('update', 'id'=>$model->id_klp)),
	array('label'=>'Delete KlpArea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_klp),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage KlpArea', 'url'=>array('admin')),
);
?>

<h1>View KlpArea #<?php echo $model->id_klp; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_klp',
		'nama_klp',
	),
)); ?>
