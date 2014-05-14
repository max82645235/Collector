<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-9
 * Time: 下午
 */
header("Content-type:text/html;charset=utf-8");

include  'phpQuery/querylist.php';
include  'DB/php.db.php';
include  'Class/imgs.php';

$dbrow = new DB();
$stri = 'select * from collectlinks';
$ret = $dbrow->get_one($stri,1);

$url = $ret['linkUrl'];

$reg = array('time'=>array('#layer71 #layer712','text'),'content'=>array('#layer72','html'),'imgs'=>array('#layer72 img','src'));
$rang = '#layer4';
$querylist = new QueryList($url,$reg,$rang,'');
$json = $querylist->getJSON();


//图片下载类



$arr = json_decode($json);

echo $arr[0]->imgs;
var_dump($arr);

$imgsdownload = new imgs("http://epaper.yzwb.net/images/2014-05/13/A04/res03_attpic_brief.jpg");
$imgsdownload->download();


