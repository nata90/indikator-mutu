<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->id_user,
);

$this->menu=array(
	array('label'=>'Daftar Pengguna', 'url'=>array('index')),
	array('label'=>'Buat Pengguna', 'url'=>array('create')),
	array('label'=>'Ubah Pengguna', 'url'=>array('update', 'id'=>$model->id_user)),
	array('label'=>'Hapus Pengguna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_user),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Atur Pengguna', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id_user; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_user',
		'nip',
		'nama_user',
		'jabatan',
		'level',
		'id_satker',
		'username',
		'password',
	),
)); ?>
