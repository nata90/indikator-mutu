<?php
/* @var $this PjDataController */
/* @var $model PjData */

$this->breadcrumbs=array(
	'Pj Datas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PjData', 'url'=>array('index')),
	array('label'=>'Manage PjData', 'url'=>array('admin')),
);
?>

<h1>Buat Penanggung Jawab Data</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>