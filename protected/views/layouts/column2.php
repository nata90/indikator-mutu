<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div>
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>

	<div class="span-5 last">
		<div id="sidebar">
			<?php
				$this->beginWidget('zii.widgets.CPortlet', array(
					'title'=>'Operations',
				));
				$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				));
				$this->endWidget();
			?>
						
			<div id="yw2" class="portlet">
				<div class="portlet-decoration">
					<div class="portlet-title">Master Data</div>
				</div>
				<div class="portlet">
					<div class="portlet-content">
						  <?php 
					  $this->widget('zii.widgets.CMenu', array(
					  /*'type'=>'list',*/
					  'encodeLabel'=>false,
						  'items'=>array(
							  array('label'=>'<i class="icon icon-home"></i> Dashboard', 'url'=>array('/site/index')),
							  array('label'=>'<i class="icon icon-tags"></i> Data Provinsi', 'url'=>array('/provinsi')),
							  array('label'=>'<i class="icon icon-tags"></i> Data Kabupaten', 'url'=>array('/kabupaten')),
							  array('label'=>'<i class="icon icon-tags"></i> Data Kecamatan', 'url'=>array('/kecamatan')),
							  array('label'=>'<i class="icon icon-tags"></i> Data Kelurahan/Desa', 'url'=>array('/kelurahan_desa')),
							  array('label'=>'<i class="icon icon-user"></i> Data Kependudukan', 'url'=>array('/rumah_tangga')),
							  array('label'=>'<i class="icon icon-user"></i> Account', 'url'=>array('/users')),
							  array('label'=>'<i class="icon icon-bookmark"></i> Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							  array('label'=>'<i class="icon icon-bookmark"></i> Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
						  ),
					  ));?>
					</div>
				</div>
			</div>
		</div> <!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>