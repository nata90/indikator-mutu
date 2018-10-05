<!-- <script src="http://code.highcharts.com/highcharts.js"></script> -->

<?php 
$this->breadcrumbs=array(
    'Grafik Indikator'=>array('index'),
    'Manage',
);

/* $this->menu=array(
    array('label'=>'Daftar Rekapitulasi', 'url'=>array('index')),
    array('label'=>'Isi Rekapitulasi', 'url'=>array('create')),
); */

$cs = Yii::app()->getClientScript();
$urlloadChart1 = Yii::app()->createUrl('grafik/loadgrafik2', array('id'=>$_GET['id']));

$js=<<<EOP
    
    $(document).on("click", "#search-grafik", function () {
        var tahun = $('#tahun').val();

        $.ajax({
            type: 'get',
            url: '$urlloadChart1',
            data: {'tahun':tahun},  
            dataType:'json',
            success: function(v) {

                $('#line-chart').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text:  v.nama
                    },
                   
                    xAxis: {
                         title: {
                            text: 'Bulan'
                        },
                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Nilai ( % )'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        line: {
                            pointPadding: 0.2,
                            borderWidth: 0,
                             dataLabels : {
                                enabled : true
                            }
                        }
                    },
                    series: v.data
                });
            }
        
        });
    });

    $.ajax({
        type: 'post',
        url: '$urlloadChart1',
        dataType:'json',
        success: function(v) {
            $('#line-chart').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text:  v.nama
                },
               
                xAxis: {
                     title: {
                        text: 'Bulan'
                    },
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Nilai ( % )'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    line: {
                        pointPadding: 0.2,
                        borderWidth: 0,
                         dataLabels : {
                            enabled : true
                        }
                    }
                },
                series: v.data
            });
        }
    
    });

   
EOP;
	$ukey = md5(uniqid(mt_rand(), true));
	$cs->registerScript($ukey, $js);
?>


<div id="frame">
    <div id="frame_title">
        <h3 align="left">Grafik</h3>
    </div>
  
    <fieldset class="fieldset">
        <div>
            Tahun <?php echo CHtml::dropDownList('tahun', date('Y'), array(2015=>2015, 2016=>2016, 2017=>2017, 2018=>2018, 2019=>2019, 2020=>2020));?> 
            <button id="search-grafik">CARI</button>      
        </div>
        <table border="1">
            <tr>
                <td>
                    <div id="line-chart" style="width:70%; height:60%;"></div>
                </td>
            </tr>
        </table>
    </fieldset>

</div>


