<?php
/* @var $this IndSatkerController */
/* @var $data IndSatker */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ind_satker')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ind_satker), array('view', 'id'=>$data->id_ind_satker)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_indikator')); ?>:</b>
	<?php echo CHtml::encode($data->id_indikator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_satker')); ?>:</b>
	<?php echo CHtml::encode($data->id_satker); ?>
	<br />


</div>