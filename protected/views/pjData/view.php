<?php
/* @var $this PjDataController */
/* @var $model PjData */

$this->breadcrumbs=array(
	'Pj Datas'=>array('index'),
	$model->id_pjdata,
);

$this->menu=array(
	array('label'=>'List PjData', 'url'=>array('index')),
	array('label'=>'Create PjData', 'url'=>array('create')),
	array('label'=>'Update PjData', 'url'=>array('update', 'id'=>$model->id_pjdata)),
	array('label'=>'Delete PjData', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_pjdata),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PjData', 'url'=>array('admin')),
);
?>

<h1>View PjData #<?php echo $model->id_pjdata; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_pjdata',
		'nama_pjdata',
	),
)); ?>
