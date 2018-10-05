<?php
/* @var $this KlpAreaController */
/* @var $data KlpArea */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_klp')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_klp), array('view', 'id'=>$data->id_klp)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_klp')); ?>:</b>
	<?php echo CHtml::encode($data->nama_klp); ?>
	<br />


</div>