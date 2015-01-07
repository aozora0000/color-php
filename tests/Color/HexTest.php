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
            $this->assertEquals($res,array("23","23","23"));
        }, $this, 'Color\Hex')->__invoke();
    }

    public function testTrimHexFailedCase() {
        Closure::bind(function(){
            $obj = new Color\Hex;
            try {
                $res = $obj->trimHex("#GEKJTLKJ");
                $this->fail('例外検知なし');
            } catch(Exception $e) {
                $this->assertTrue(true);
            }
        }, $this, 'Color\Hex')->__invoke();
    }

    public function testToString() {
        $hex = new Color\Hex("#232323");
        $this->assertEquals($hex->__toString(),"232323");
    }

    public function testSetHex() {
        $hex1 = new Color\Hex("#232323");
        $hex2 = new Color\Hex;
        $hex2->__set("red","23");
        $hex2->__set("green","23");
        $hex2->__set("blue","23");
        $this->assertEquals($hex1,$hex2);
    }

    public function testSetHexFailedCase() {
        try {
            $hex = new Color\Hex;
            $hex->__set("red","tr");
            $hex->__set("green","td");
            $hex->__set("blue","th");
            $this->fail("例外検知無し");
        } catch(Exception $e) {
            $this->assertTrue(true);
        }
    }
}
