<?php
/* @var $this SatkerController */
/* @var $data Satker */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_satker')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_satker), array('view', 'id'=>$data->id_satker)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_unit')); ?>:</b>
	<?php echo CHtml::encode($data->id_unit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_satker')); ?>:</b>
	<?php echo CHtml::encode($data->nama_satker); ?>
	<br />


</div>