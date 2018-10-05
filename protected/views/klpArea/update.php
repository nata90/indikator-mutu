<?php
/* @var $this KlpAreaController */
/* @var $model KlpArea */

$this->breadcrumbs=array(
	'Klp Areas'=>array('index'),
	$model->id_klp=>array('view','id'=>$model->id_klp),
	'Update',
);

$this->menu=array(
	array('label'=>'List KlpArea', 'url'=>array('index')),
	array('label'=>'Create KlpArea', 'url'=>array('create')),
	array('label'=>'View KlpArea', 'url'=>array('view', 'id'=>$model->id_klp)),
	array('label'=>'Manage KlpArea', 'url'=>array('admin')),
);
?>

<h1>Update KlpArea <?php echo $model->id_klp; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>