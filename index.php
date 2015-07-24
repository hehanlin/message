<?php

/**
 * @author  hehanlin
 * @time    2015-7-24
 */

define('DATA_FILE',__DIR__.'/data/data.txt');
if(!file_exists(DATA_FILE))exit('data.txt is not exists!');

class Controller{

    public function index()
    {
        $this->Redirect(__DIR__.'/static/home.html',true);
    }

    public function getList()
    {
        echo $this->readAllFile();
    }

    public function create()
    {
        $content = isset($_POST['data'])   ?   $_POST['data']    :   '';

        echo $this->appendToFile($content)    ?   '1' :   '0';
    }

    private function openFile($openType)
    {
        if(!$handle=fopen(DATA_FILE,$openType))exit('open file failed');

        return $handle;
    }

    private function readAllFile()
    {
        $handle = $this->openFile('r');

        return fread($handle,filesize(DATA_FILE)) AND fclose($handle);
    }

    private function appendToFile($content)
    {
        $handle = $this->openFile('a');

        if(!fwrite($handle,$content))exit('write file failed');

        return true;
    }

    private function Redirect($url, $permanent = false)
    {
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }

        exit();
    }
}



