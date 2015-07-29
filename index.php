<?php

/**
 * @author  hehanlin
 * @time    2015-7-24
 */
session_start();
define('DATA_FILE',__DIR__.'/data/data.txt');
if(!file_exists(DATA_FILE))exit('data.txt is not exists!');

class Controller{

    public function index()
    {
        require_once __DIR__.'/static/home.html';
    }

    public function getList()
    {
        echo $this->readAllFile();
    }

    public function create()
    {
        $content = isset($_POST['data'])   ?   $_POST['data']    :   '';

        echo $this->appendToFile($content)  ?   '1' :   '0';
    }

    public function compareCode()
    {
        
        $code = isset($_GET['code'])   ?   trim($_GET['code'])    :   '';

        if(strtolower($code)==strtolower($_SESSION['code']))
        {
            echo "1";exit;
        }else{
            echo "0";exit;
        }

    }

    public function getLineNum()
    {
        $handle = $this->openFile('r');

        $count = 0;

        while(fgets($handle))
        {
            $count++;
        }

        fclose($handle);


        echo $count;exit;
    }

    private function openFile($openType)
    {
        if(!$handle=fopen(DATA_FILE,$openType))exit('open file failed');

        return $handle;
    }

    private function readAllFile()
    {
        $handle = $this->openFile('r');

        echo fread($handle,filesize(DATA_FILE));

        fclose($handle);
    }

    private function appendToFile($content)
    {
        $handle = $this->openFile('a');

        if(!fwrite($handle,$content))exit('write file failed');

        fclose($handle);

        return true;
    }

}

$obj = new Controller();

$method = isset($_GET['m']) ?   trim($_GET['m'])  :   '';


switch($method)
{
    case 'getList':
        $obj->getList();
        break;
    case '':
        $obj->index();
        break;
    case 'create':
        $obj->create();
        break;
    case 'getLineNum':
        $obj->getLineNum();
    case 'compareCode':
        $obj->compareCode();
}
exit;


