<?php
/**
 * Utility class file
 *
 * Contains many function that most used
 */

class Utility
{

	public static function  curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
			$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}

	/*
	* Return setting template with typePage: public, admin_sweeto or back_office
	*/
	public static function getPublishedToImg($pub) {
		if($pub == 1)
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/publish.png', 'published', array('title'=>Yii::t('site', 'published')));
		else
			return CHtml::image(Yii::app()->theme->baseUrl .'/img/icons/unpublish.png', 'un-published', array('title'=>Yii::t('site', 'unpublished')));
	}

	public static function listBulanArr($key = null) {
		$bulanArr = array(
			'01'=>'Januari',
			'02'=>'Februari',
			'03'=>'Maret',
			'04'=>'April',
			'05'=>'Mei',
			'06'=>'Juni',
			'07'=>'Juli',
			'08'=>'Agustus',
			'09'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);
		if($key == null){
			return $bulanArr;
		}else {
			return $bulanArr[$key];
		}
		
	}
	
	
	public static function listBulanArr2($key = null) {
		$bulanArr = array(
			'1'=>'Januari',
			'2'=>'Februari',
			'3'=>'Maret',
			'4'=>'April',
			'5'=>'Mei',
			'6'=>'Juni',
			'7'=>'Juli',
			'8'=>'Agustus',
			'9'=>'September',
			'10'=>'Oktober',
			'11'=>'November',
			'12'=>'Desember'
		);
		if($key == null){
			return $bulanArr;
		}else {
			return $bulanArr[$key];
		}
	}
	
	public static function listTahunArr($start, $end) {
		$tahunArr1 = range($start, $end);
		$tahunArr2 = range($start, $end);
		$arr = array_combine($tahunArr1,$tahunArr2);
		return $arr;
	}

}
