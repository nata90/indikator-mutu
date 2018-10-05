<?php
/* @var $this KlpAreaController */
/* @var $model KlpArea */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_klp'); ?>
		<?php echo $form->textField($model,'id_klp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_klp'); ?>
		<?php echo $form->textField($model,'nama_klp',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->