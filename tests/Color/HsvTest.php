<?php
class HsvTest extends PHPUnit_Framework_TestCase{
    public function testCreateHsv() {
        $hsv = new Color\Hsv(1,1,1);
        $this->assertInstanceOf("Color\Hsv",$hsv);
    }

    public function testCreateHsvFromRgb() {
        $this->assertInstanceOf("Color\Hsv",(new Color\Hsv)->fromRGB(new Color\Rgb(0,0,0)));
        $this->assertInstanceOf("Color\Hsv",(new Color\Hsv)->fromRGB(new Color\Rgb(255,0,0)));
        $this->assertInstanceOf("Color\Hsv",(new Color\Hsv)->fromRGB(new Color\Rgb(0,255,0)));
        $this->assertInstanceOf("Color\Hsv",(new Color\Hsv)->fromRGB(new Color\Rgb(0,0,255)));
        $this->assertInstanceOf("Color\Hsv",(new Color\Hsv)->fromRGB(new Color\Rgb(255,255,255)));
    }

    public function testCreatFromHsv() {
        $rgb1 = new Color\Rgb(200,1,255);
        $rgb2 = (new Color\Rgb)->fromHsv((new Color\Hsv)->fromRGB($rgb1));
        $this->assertEquals($rgb1,$rgb2);
    }

    public function testSetHsv() {
        $hsv = new Color\Hsv;
        $hsv->__set("hue",1);
        $hsv->__set("saturation",1);
        $hsv->__set("value",1);
        $this->assertEquals($hsv,new Color\Hsv(1,1,1));
    }
}
