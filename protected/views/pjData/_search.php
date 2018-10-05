<?php
/* @var $this PjDataController */
/* @var $model PjData */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pjdata'); ?>
		<?php echo $form->textField($model,'id_pjdata'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_pjdata'); ?>
		<?php echo $form->textField($model,'nama_pjdata',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->