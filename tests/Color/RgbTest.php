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

    public function testFromHsvCaseHueValiation() {
        $rgb = new Color\Rgb;
        $rgbString1 = $rgb->fromHsv(new Color\Hsv(0,1,1));
        $rgbString2 = $rgb->fromHsv(new Color\Hsv(60,1,1));
        $rgbString3 = $rgb->fromHsv(new Color\Hsv(120,1,1));
        $rgbString4 = $rgb->fromHsv(new Color\Hsv(180,1,1));
        $rgbString5 = $rgb->fromHsv(new Color\Hsv(240,1,1));
        $rgbString6 = $rgb->fromHsv(new Color\Hsv(300,1,1));
        $this->assertEquals("255,0,0",sprintf("%s",$rgbString1));
        $this->assertEquals("255,255,0",sprintf("%s",$rgbString2));
        $this->assertEquals("0,255,0",sprintf("%s",$rgbString3));
        $this->assertEquals("0,255,255",sprintf("%s",$rgbString4));
        $this->assertEquals("0,0,255",sprintf("%s",$rgbString5));
        $this->assertEquals("255,0,255",sprintf("%s",$rgbString6));
    }
}
