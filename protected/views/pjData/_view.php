<?php
/* @var $this PjDataController */
/* @var $data PjData */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pjdata')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pjdata), array('view', 'id'=>$data->id_pjdata)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_pjdata')); ?>:</b>
	<?php echo CHtml::encode($data->nama_pjdata); ?>
	<br />


</div>