<?php
/* @var $this RekapIndikatorController */
/* @var $model RekapIndikator */

$this->breadcrumbs=array(
	'Rekap Indikators'=>array('index'),
	$model->id_rekap=>array('view','id'=>$model->id_rekap),
	'Update',
);

$this->menu=array(
	array('label'=>'List RekapIndikator', 'url'=>array('index')),
	array('label'=>'Create RekapIndikator', 'url'=>array('create')),
	array('label'=>'View RekapIndikator', 'url'=>array('view', 'id'=>$model->id_rekap)),
	array('label'=>'Manage RekapIndikator', 'url'=>array('admin')),
);
?>

<h1>Update RekapIndikator <?php echo $model->id_rekap; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>