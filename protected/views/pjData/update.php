<?php
/* @var $this PjDataController */
/* @var $model PjData */

$this->breadcrumbs=array(
	'Pj Datas'=>array('index'),
	$model->id_pjdata=>array('view','id'=>$model->id_pjdata),
	'Update',
);

$this->menu=array(
	array('label'=>'List PjData', 'url'=>array('index')),
	array('label'=>'Create PjData', 'url'=>array('create')),
	array('label'=>'View PjData', 'url'=>array('view', 'id'=>$model->id_pjdata)),
	array('label'=>'Manage PjData', 'url'=>array('admin')),
);
?>

<h1>Update PjData <?php echo $model->id_pjdata; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>