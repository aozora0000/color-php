<?php
/**
* ColorCode Class for Color Class
*/
namespace Color;

use Exception;

/**
 * クラスの説明
 *
 * @category Color
 * @package Color\Hex
 * @author Kohei Kinoshita
 * @since 2014
 * @copyright 1997-2005 The PHP Group
 * @license MIT
 * @link None
 * @see Color
 * @version 0.0.1
 */
class Hex
{
    /**
     * @access public
     * @var string
     */
    public $red;
    public $green;
    public $blue;

    /**
     * @access public
     * @param  string    $string
     * @return Color\Hex Object
     */
    public function __construct($string = "#000000")
    {
        $hexArray = self::trimHex($string);
        $this->red = $hexArray[0];
        $this->green = $hexArray[1];
        $this->blue = $hexArray[2];

        return $this;
    }

    /**
     * @access public
     * @param  Color\Rgb $rgb
     * @return Color\Hex Object
     */
    public function fromRGB(Rgb $rgb)
    {
        $this->red = dechex($rgb->red);
        $this->green = dechex($rgb->green);
        $this->blue = dechex($rgb->blue);

        return $this;
    }

    /**
     * @access public
     * @param  string $value
     * @return void
     */
    public function __set($name, $value)
    {
        if (!self::isHex($value)) {
            throw new Exception("{$value} is not HexStrings");
        }
        $this->$name = $value;
    }

    public function __toString()
    {
        return sprintf("%2X%2X%2X", $this->red, $this->green, $this->blue);
    }

    /**
     * @access private
     * @param  string $string
     * @return Array
     */
    private static function trimHex($string)
    {
        $hexArray = str_split(strtolower(ltrim($string, "#")), 2);
        foreach ($hexArray as $hex) {
            if (!self::isHex($hex)) {
                throw new Exception("{$string} is not HexStrings");
            }
        }

        return $hexArray;
    }

    /**
     * @access private
     * @param  string $hexValue
     * @return boolen
     */
    private static function isHex($hexValue)
    {
        $hexValue = ($hexValue[0] == 0) ? $hexValue[1] : $hexValue;

        return (strtolower($hexValue) == dechex(hexdec(strtolower($hexValue))) && 0 <= hexdec($hexValue) && hexdec($hexValue) <= 255);
    }
}
