<?php
class HsvTest extends PHPUnit_Framework_TestCase{
    public function testCreateHsv() {
        $hsv = new Color\Hsv(1,1,1);
        $this->assertInstanceOf("Color\Hsv",$hsv);
    }

    public function testCreateHsvFromRgb() {
        $hsv = (new Color\Hsv)->fromRGB(new Color\Rgb(200,1,255));
        $this->assertInstanceOf("Color\Hsv",$hsv);
    }

    public function testCreatFromHsv() {
        $rgb1 = new Color\Rgb(200,1,255);
        $rgb2 = (new Color\Rgb)->fromHsv((new Color\Hsv)->fromRGB($rgb1));
        $this->assertEquals($rgb1,$rgb2);
    }
}
