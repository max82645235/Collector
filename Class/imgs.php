<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-5-12
 * Time: 下午7:32
 */

class imgs {

    private $url=null;
    private $download = 'download/imgs/';

    function __construct($url)
    {
        $this->url = $url;
    }

    public function download()
    {
        $imgfile = file_get_contents($this->url);
        $imgtype = $this->file_extend($this->url);
        $this->imgsave($imgtype,$imgfile);
    }

    private  function file_extend($file_name)
    {
        $extend = pathinfo($file_name);
        $extend = strtolower($extend["extension"]);
        return $extend;
    }


    private  function imgsave($imgtype,$imgfile)
    {
        file_put_contents($this->download . $this->imgnamerand() . "." . $imgtype,$imgfile);
    }


    private function imgnamerand()
    {
        $str = "1234567890abcdefghijklmnopqrstuvwxyz";
        $ret = "";
        for($i=0;$i<10;$i++)
        {
            $ret .= substr($str,rand(0,35),1);
        }
        return $ret;
    }

} 