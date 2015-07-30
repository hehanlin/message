<?php

/**
 * Created by IntelliJ IDEA.
 * User: hehanlin
 * Date: 2015/7/29
 * Time: 13:28
 */
session_start();
class ValidateCode
{

    public $str;

    public $handle;

    private $width;

    private $height;

    public function __construct($width=80,$height=20,$strLength=4)
    {
        $this->setImgSize($width,$height);

        $this->setStr($strLength);

        $this->create();

    }

    private function setImgSize($width,$height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    private function setStr($strLength)
    {
        $dictionary = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

        for($i=0;$i<$strLength;$i++)
        {
            $this->str .= substr($dictionary,mt_rand(0,strlen($dictionary)-1),1);
        }
    }

    public function create()
    {
        $this->handle = imagecreate($this->width,$this->height);

        $backGroudColor = imagecolorallocate($this->handle,255,255,255);

        imagefill($this->handle,0,0,$backGroudColor);

        $strColor = imagecolorallocate($this->handle,0,0,0);

        imagestring($this->handle,30,10,0,$this->str,$strColor);

        $this->interferce();

        header("Content-Type:image/png");

        imagepng($this->handle);

    }

    private function interferce()
    {
        for($i=0;$i<3;$i++)
        {
            $lineColor = imagecolorallocate($this->handle,rand(0,255),rand(0,255),rand(0,255));

            imageline($this->handle,rand(0,80),rand(0,20),rand(0,80),rand(0,20),$lineColor);
        }

        for($i=0;$i<100;$i++)
        {
            $pxColor = imagecolorallocate($this->handle,rand(0,255),rand(0,255),rand(0,255));

            imagesetpixel($this->handle,rand(0,80),rand(0,20),$pxColor);
        }
    }
}


$validateCode = new ValidateCode();

$_SESSION['code'] = $validateCode->str;

$validateCode->create();