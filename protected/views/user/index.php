<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users',
);

$this->menu=array(
	array('label'=>'Buat Pengguna', 'url'=>array('create')),
	array('label'=>'Pengaturan Pengguna', 'url'=>array('admin')),
);
?>

<h1>Daftar Pengguna</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
