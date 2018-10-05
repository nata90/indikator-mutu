<?php
/* @var $this IndikatorController */
/* @var $model Indikator */

$this->breadcrumbs=array(
	'Indikators'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Indikator', 'url'=>array('index')),
	array('label'=>'Pengaturan Indikator', 'url'=>array('admin')),
);
?>

<h1>Buat Indikator</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>