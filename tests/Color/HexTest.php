<?php
class HexTest extends PHPUnit_Framework_TestCase{

    public function testCreateHex() {
        $hex = new Color\Hex("#232323");
        $this->assertInstanceOf("Color\Hex",$hex);
    }

    public function testCreateHexFromRGB() {
        $hex = (new Color\Hex)->fromRGB(new Color\Rgb(35,35,35));
        $this->assertEquals(new Color\Hex("#232323"),$hex);
    }

    public function testTrimHex() {
        Closure::bind(function(){
            $obj = new Color\Hex;
            $res = $obj->trimHex("#232323");
            $this->assertEquals($res,array(23,23,23));
        }, $this, 'Color\Hex')->__invoke();
    }
    public function testSetHex() {
        $hex1 = new Color\Hex("#232323");
        $hex2 = new Color\Hex;
        $hex2->red = 23;
        $hex2->green = 23;
        $hex2->blue = 23;
        $this->assertEquals($hex1,$hex2);
    }
}
