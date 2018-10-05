<?php
/* @var $this IndSatkerController */
/* @var $model IndSatker */

$this->breadcrumbs=array(
	'Ind Satkers'=>array('index'),
	$model->id_ind_satker=>array('view','id'=>$model->id_ind_satker),
	'Update',
);

$this->menu=array(
	// array('label'=>'List IndSatker', 'url'=>array('index')),
	array('label'=>'Create IndSatker', 'url'=>array('create')),
	array('label'=>'View IndSatker', 'url'=>array('view', 'id'=>$model->id_ind_satker)),
	array('label'=>'Manage IndSatker', 'url'=>array('admin')),
);
?>

<h1>Update IndSatker <?php //echo $model->id_ind_satker; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'listSatker'=>$listSatker,)); ?>