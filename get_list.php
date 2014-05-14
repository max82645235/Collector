<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-7
 * Time: 下午5:17
 */
header("Content-type:text/html;charset=utf-8");
require_once  '/config/main.php';

include  'phpQuery/querylist.php';
include  'DB/php.db.php';

$webname = 'yzwb';
$website = '';

//扬子晚报
switch($webname)
{
    case 'yzwb':
        $website = 'http://epaper.yzwb.net/html_t/';
        $date = date("Y-m/d", time());
        $url = $website  .  $date  . '/node_1.htm';

        //搜索规则

        $reg = array('title'=>array('a','text'),'url'=>array('a','href'));
        $rang = '#layer43 table .titss li';
        $querylist = new QueryList($url,$reg,$rang,$website . $date . '/');
        $json = $querylist->getJSON();
        break;
    default:
        echo 'No Rules';

}


//数据库操作,批量插入数据库
$listarr  =  json_decode($json);
$dbrow = new DB($config['dbConfig']);
$arrtemp = array();

//写入数据库
foreach($listarr as $key => $val)
{
    $arrtemp[$key]['title'] = $val->title;
    $arrtemp[$key]['linkurl'] = $val->url;
    $arrtemp[$key]['addtime'] = time();
}

$insertfield = 'title,linkurl,addtime';
//分为100为一个数据源的数组
$chunkarr = array_chunk($arrtemp,100,false);

foreach($chunkarr as $key=>$val)
{
    if($dbrow->multi_insert('collectlinks',$insertfield,$val))
    {
        echo "插入数据成功<br />";
    }
    else
    {
        echo "插入数据失败<br />";
    }
}


?>


