<?php
/* @var $this KlpAreaController */
/* @var $model KlpArea */

$this->breadcrumbs=array(
	'Klp Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Kelompok Area', 'url'=>array('index')),
	array('label'=>'Atur Kelompok Area', 'url'=>array('admin')),
);
?>

<h1>Buat Kelompok Area</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>