<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Daftar Pengguna', 'url'=>array('index')),
	array('label'=>'Pengaturan Pengguna', 'url'=>array('admin')),
);
?>

<h1>Buat Pengguna Baru</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>