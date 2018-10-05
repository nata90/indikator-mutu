<?php

class GrafikController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','rekaplaporan2','grafik','grafikbulanan','loadgrafik1','loadgrafik2','indikator'),
				//'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	

	/*public function actionGrafik(){

		$this->render('grafik');
	}*/

	public function actionIndikator()
	{
		$this->layout = 'column1';

		$model=new Indikator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Indikator']))
			$model->attributes=$_GET['Indikator'];

		$this->render('indikator',array(
			'model'=>$model,
		));
	}

	/*public function actionGrafik()
	{
		
		$this->render('tes_grafik');
	}*/

	public function actionGrafik()
	{
		$this->layout = 'column1';

		$model=new Indikator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Indikator']))
			$model->attributes=$_GET['Indikator'];

		$listBulan = Utility::listBulanArr();

		$listPeriode = PeriodeMinggu::model()->findAll(array(
			'condition'=>'status = 1'
		));

		$this->render('grafik2',array(
			'model'=>$model,
			'listBulan'=>$listBulan,
			'listPeriode'=>$listPeriode
		));
	}

	public function actionGrafikBulanan()
	{
		$this->layout = 'column1';

		$model=new Indikator('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Indikator']))
			$model->attributes=$_GET['Indikator'];

		$listBulan = Utility::listBulanArr();
		$this->render('grafik_bulanan',array(
			'model'=>$model,
			'listBulan'=>$listBulan
		));
	}

	public function actionLoadGrafik1($id){
		$id = $_GET['id'];
		$arrData = array();

		if(isset($_GET['tahun']) && $_GET['tahun'] != ''){
			$year = $_GET['tahun'];
		}else{
			$year = date('Y');
		}

		$indikator = Indikator::model()->findByPk($id);

		$model = PeriodeMinggu::model()->findAll(array(
			'condition'=>'tahun = :y AND status = 1 AND date(start_date) <= CURDATE()',
			'params'=>array(':y'=>$year)
		));

		$arrSumbuX = array();
		if($model != null){
			foreach($model as $val){
				$arrSumbuX[] = $val->nama_periode;

				$rekapIndikator = RekapIndikator::model()->findAll(array(
					'with' => array(
						'idIndSatker'=>array('alias'=>'a'),
						'idIndSatker.idIndikator'=>array('alias'=>'b'),
					),
					'condition'=>'b.id_indikator= :id AND tgl BETWEEN "'.date('Y-m-d', strtotime($val->start_date)).'" AND "'.date('Y-m-d', strtotime($val->end_date)).'"',
					'params'=>array(':id'=>$id),
				));

				$totalNumerator = 0;
				$totalDenumerator = 0;
				if($rekapIndikator != null){
					foreach($rekapIndikator as $row){
						$totalNumerator = $totalNumerator + $row->numerator;
						$totalDenumerator = $totalDenumerator + $row->denumerator;
					}
					$prosentase = ($totalNumerator / $totalDenumerator) * 100;	
				}else{
					$prosentase = 0;
				}

				$isiData[] = round($prosentase);
			}
		}
		/*for($i=1;$i<=12;$i++){
			$model = RekapIndikator::model()->findAll(array(
				'with' => array(
					'idIndSatker'=>array('alias'=>'a'),
					'idIndSatker.idIndikator'=>array('alias'=>'b'),
				),
				'condition'=>'b.id_indikator= :id AND YEAR(tgl) = :year AND MONTH(tgl) = :month',
				'params'=>array(':year'=>$year, ':month'=>$i, ':id'=>$id),
			));

			$totalNumerator = 0;
			$totalDenumerator = 0;
			if($model != null){
				foreach($model as $val){
					$totalNumerator = $totalNumerator + $val->numerator;
					$totalDenumerator = $totalDenumerator + $val->denumerator;
				}
			}

			$prosentase = ($totalNumerator / $totalDenumerator) * 100;
			$arrData[] = round($prosentase);
		}*/

		$arrData['sumbux'] = $arrSumbuX;
		$arrData['data'] = array(
			//array('name'=>'Standar', 'data'=>array(7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6)),
			array('name'=>'Capaian', 'data'=>$isiData),
		);

		$arrData['nama'] = $indikator->uraian_ind;



		$this->_sendResponse(200, CJSON::encode($arrData));
	}

	public function actionLoadGrafik2($id){
		$id = $_GET['id'];
		$arrData = array();

		if(isset($_GET['tahun']) && $_GET['tahun'] != ''){
			$year = $_GET['tahun'];
		}else{
			$year = date('Y');
		}

		$indikator = Indikator::model()->findByPk($id);

		
		for($i=1;$i<=12;$i++){
			$model = RekapIndikator::model()->findAll(array(
				'with' => array(
					'idIndSatker'=>array('alias'=>'a'),
					'idIndSatker.idIndikator'=>array('alias'=>'b'),
				),
				'condition'=>'b.id_indikator= :id AND YEAR(tgl) = :year AND MONTH(tgl) = :month',
				'params'=>array(':year'=>$year, ':month'=>$i, ':id'=>$id),
			));

			$totalNumerator = 0;
			$totalDenumerator = 0;
			if($model != null){
				foreach($model as $val){
					$totalNumerator = $totalNumerator + $val->numerator;
					$totalDenumerator = $totalDenumerator + $val->denumerator;
				}
			}

			$prosentase = ($totalNumerator / $totalDenumerator) * 100;
			$arrData[] = round($prosentase);
		}

		$arrData['data'] = array(
			//array('name'=>'Standar', 'data'=>array(7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6)),
			array('name'=>'Capaian', 'data'=>$arrData),
		);

		$arrData['nama'] = $indikator->uraian_ind;



		$this->_sendResponse(200, CJSON::encode($arrData));
	}

	

	// Uncomment the following methods and override them if needed
	private function _sendResponse($status = 200, $body = '', $content_type = 'text/html') {
        // set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->_getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        // pages with body are easy
        if ($body != '') {
            // send the body
            echo $body;
        }
        // we need to create the body if none is passed
        else {
            // create some body messages
            $message = '';
            switch ($status) {
                case 401:
                    $message = 'You must be authorized to view this page.';
                    break;
                case 404:
                    $message = 'The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found.';
                    break;
                case 500:
                    $message = 'The server encountered an error processing your request.';
                    break;
                case 501:
                    $message = 'The requested method is not implemented.';
                    break;
            }

            // servers don't always have a signature turned on
            // (this is an apache directive "ServerSignature On")
            $signature = ($_SERVER['SERVER_SIGNATURE'] == '') ? $_SERVER['SERVER_SOFTWARE'] . ' Server at ' . $_SERVER['SERVER_NAME'] . ' Port ' . $_SERVER['SERVER_PORT'] : $_SERVER['SERVER_SIGNATURE'];

            // this should be templated in a real-world solution
            $body = '
			<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
			<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
				<title>' . $status . ' ' . $this->_getStatusCodeMessage($status) . '</title>
			</head>
			<body>
				<h1>' . $this->_getStatusCodeMessage($status) . '</h1>
				<p>' . $message . '</p>
				<hr />
				<address>' . $signature . '</address>
			</body>
			</html>';

            echo $body;
        }
        Yii::app()->end();
    }
	
	private function _getStatusCodeMessage($status) {
        // these could be stored in a .ini file and loaded
        // via parse_ini_file()... however, this will suffice
        // for an example
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}
