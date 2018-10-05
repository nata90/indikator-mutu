<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#"><?php echo Yii::app()->name; ?></small></a>
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        array('label'=>'<i class="fa fa-institution"></i> Beranda', 'url'=>array('site/index')),
                        array('label'=>'<i class="fa fa-cube"></i> Master Data <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('label'=>'<i class="fa fa-cube"></i> Data Unit', 'url'=>array('/unit/admin')),
                            array('label'=>'<i class="fa fa-cube"></i> Data Satuan Kerja', 'url'=>array('/satker/admin')),
                            array('label'=>'<i class="fa fa-cube"></i> Data Kelompok Area', 'url'=>array('/klparea/admin')),
                            array('label'=>'<i class="fa fa-cube"></i> Data Indikator', 'url'=>array('/indikator/admin')),
							array('label'=>'<i class="fa fa-cube"></i> Data Indikator Satker', 'url'=>array('/indsatker/admin')),
							array('label'=>'<i class="fa fa-cube"></i> Data PJ Data', 'url'=>array('/pjdata/admin')),
							array('label'=>'<i class="fa fa-cube"></i> Data Pengguna', 'url'=>array('/user/admin')),
                        ), 'visible'=>Yii::app()->user->getLevel()==1),
                        //array('label'=>'<i class="fa fa-database"></i> Isi Rekap', 'url'=>array('rekapindikator/create'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'<i class="fa fa-user"></i> Rekap Harian', 'url'=>array('rekapindikator/admin'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'<i class="fa fa-list"></i> Grafik', 'url'=>array('grafik/indikator'), 'visible'=>Yii::app()->user->getLevel()==1),
                        array('label'=>'<i class="fa fa-list"></i> Laporan', 'url'=>array(''), 'visible'=>!Yii::app()->user->isGuest),
						// array('label'=>'<i class="fa fa-signal"></i> Grafik', 'url'=>array('rekapindikator/grafik_full')),
                        array('label'=>'<i class="fa fa-user"></i> Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'<i class="fa fa-share"></i> Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav">
    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/banner.jpg">
</div><!-- subnav -->