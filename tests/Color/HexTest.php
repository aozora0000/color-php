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
}
