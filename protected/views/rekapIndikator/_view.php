<?php
/* @var $this RekapIndikatorController */
/* @var $data RekapIndikator */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rekap')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rekap), array('view', 'id'=>$data->id_rekap)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_ind_satker')); ?>:</b>
	<?php echo CHtml::encode($data->id_ind_satker); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tgl')); ?>:</b>
	<?php echo CHtml::encode($data->tgl); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numerator')); ?>:</b>
	<?php echo CHtml::encode($data->numerator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('denumerator')); ?>:</b>
	<?php echo CHtml::encode($data->denumerator); ?>
	<br />


</div>