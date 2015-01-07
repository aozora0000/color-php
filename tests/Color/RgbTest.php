<?php
class RgbTest extends PHPUnit_Framework_TestCase{
    public function testCreateRgb() {
        $this->assertInstanceOf("Color\Rgb",new Color\Rgb(255,255,255));
    }

    public function testCreateRgbCaseFailed() {
        try {
            new Color\Rgb(256,-1,"helloworld");
        } catch(Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testCreateRgbFromHex() {
        $hex = new Color\Hex("#232323"); // equel r35,g35,b35
        $rgb = (new Color\Rgb)->fromHex($hex);
        $this->assertEquals(new Color\Rgb(35,35,35),$rgb);
    }

    public function testSetRgb() {
        $rgb = new Color\Rgb;
        $rgb->__set("red",255);
        $rgb->__set("green",255);
        $rgb->__set("blue",255);
        $this->assertEquals($rgb,new Color\Rgb(255,255,255));
    }

    public function testSetRgbCaseFailed() {
        try {
            $rgb = new Color\Rgb;
            $rgb->__set("red","FF");
            $rgb->__set("green","FF");
            $rgb->__set("blue","FF");
            $this->fail('例外検知なし');
        } catch(Exception $e) {
            $this->assertTrue(true);
        }
    }

    public function testFromHsv() {
        $rgb1 = (new Color\Rgb)->fromHsv(new Color\Hsv(0,0,0));
        $rgb2 = new Color\Rgb(0,0,0);
        $this->assertEquals($rgb1,$rgb2);
    }

    public function testisRange() {
        $this->assertNotTrue(Color\Rgb::isRange("FF"));
    }
}
