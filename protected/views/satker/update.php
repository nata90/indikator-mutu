<?php
/* @var $this SatkerController */
/* @var $model Satker */

$this->breadcrumbs=array(
	'Satkers'=>array('index'),
	$model->id_satker=>array('view','id'=>$model->id_satker),
	'Update',
);

$this->menu=array(
	array('label'=>'List Satker', 'url'=>array('index')),
	array('label'=>'Create Satker', 'url'=>array('create')),
	array('label'=>'View Satker', 'url'=>array('view', 'id'=>$model->id_satker)),
	array('label'=>'Manage Satker', 'url'=>array('admin')),
);
?>

<h1>Update Satker <?php echo $model->id_satker; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>