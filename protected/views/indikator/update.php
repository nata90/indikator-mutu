<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	$model->id_indikator=>array('view','id'=>$model->id_indikator),
	'Update',
);

$this->menu=array(
	array('label'=>'List Indikator', 'url'=>array('index')),
	array('label'=>'Create Indikator', 'url'=>array('create')),
	array('label'=>'View Indikator', 'url'=>array('view', 'id'=>$model->id_indikator)),
	array('label'=>'Manage Indikator', 'url'=>array('admin')),
);
?>

<h1>Update Indikator <?php echo $model->id_indikator; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>