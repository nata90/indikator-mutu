<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<?php 
	$controller = strtolower(Yii::app()->controller->id);
	$action = strtolower(Yii::app()->controller->action->id);
?>
 <div class="row-fluid">
	<?php 
	if($controller == 'rekapindikator' && ($action == 'admin' || $action == 'laporan')){ ?>
		<div class="span12">
		
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>CHtml::link('Dashboard'),
				'htmlOptions'=>array('class'=>'breadcrumb')
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		
		<!-- Include content pages -->
		<?php echo $content; ?>

		</div>
		
	<?php 
	}else {
	?>


		<div class="span9">
		
		<?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>CHtml::link('Dashboard'),
				'htmlOptions'=>array('class'=>'breadcrumb')
			)); ?><!-- breadcrumbs -->
		<?php endif?>
		
		<!-- Include content pages -->
		<?php echo $content; ?>

		</div><!--/span-->
	  
		<div class="span3">
		<div class="sidebar-nav">
		  <div class="portlet">
			<div class="portlet-decoration">
			  <div class="portlet-title">
				<i class="icon icon-wrench"></i> MENU
			  </div>
			</div>
			<div class="portlet-content">
			
			  <?php 
			  $this->widget('zii.widgets.CMenu', array(
			  /*'type'=>'list',*/
			  'encodeLabel'=>false,
			  'items'=>array(
				array('label'=>'','items'=>$this->menu),
			  ),
			  ));?>
			</div>
		  </div>


		 <!-- <div class="portlet">
			<div class="portlet-decoration">
			  <div class="portlet-title">
				<i class="icon icon-wrench"></i> ADMINISTRATOR
			  </div>
			</div>
			<div class="portlet-content">

			  <?php 
			  $this->widget('zii.widgets.CMenu', array(
			  /*'type'=>'list',*/
			  'encodeLabel'=>false,
				  'items'=>array(
					  array('label'=>'<i class="icon icon-tags"></i> Data Unit', 'url'=>array('/unit/admin')),
					  array('label'=>'<i class="icon icon-tags"></i> Data Satuan Kerja', 'url'=>array('/satker/admin')),
					  array('label'=>'<i class="icon icon-tags"></i> Data Kelompok Area', 'url'=>array('/klparea/admin')),
					  array('label'=>'<i class="icon icon-tags"></i> Data Indikator', 'url'=>array('/indikator/admin')),
					  array('label'=>'<i class="icon icon-user"></i> Data Indikator Satker', 'url'=>array('/indsatker/admin')),
					  array('label'=>'<i class="icon icon-user"></i> Data Pengguna', 'url'=>array('/user/admin')),
					),
			  ));?>
			</div>
		  </div>

		</div> -->
		
		</div><!--/span-->
	<?php } ?>
</div><!--/row-->


<?php $this->endContent(); ?>