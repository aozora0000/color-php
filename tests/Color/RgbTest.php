<?php
class RgbTest extends PHPUnit_Framework_TestCase{

    public function testCreateRgb() {
        $this->assertInstanceOf("Color\Rgb",new Color\Rgb(255,255,255));
    }

    public function testCreateRgbFromHex() {
        $hex = new Color\Hex("#232323"); // equel r35,g35,b35
        $rgb = (new Color\Rgb)->fromHex($hex);
        $this->assertEquals(new Color\Rgb(35,35,35),$rgb);
    }
}
