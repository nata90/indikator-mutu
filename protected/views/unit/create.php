<?php
/* @var $this UnitController */
/* @var $model Unit */

$this->breadcrumbs=array(
	'Units'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Unit', 'url'=>array('index')),
	array('label'=>'Pengaturan Unit', 'url'=>array('admin')),
);
?>

<h1>Buat Unit Baru</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>