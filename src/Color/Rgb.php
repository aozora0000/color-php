<?php
/**
* RgbColor Class for Color Class
*/
namespace Color;

use Exception;

class Rgb
{
    /**
     * @var integer
     */
    public $red;
    public $green;
    public $blue;
    public function __construct($r = 0, $g = 0, $b = 0)
    {
        if (!self::isRange($r) && !self::isRange($g) && !self::isRange($b)) {
            throw new Exception("{$r},{$g},{$b} is Not Valid");
        }
        $this->red   = intval($r);
        $this->green = intval($g);
        $this->blue  = intval($b);

        return $this;
    }

    public function __set($name, $value)
    {
        if (!self::isRange($value)) {
            throw new Exception("{$value} is Not Valid");
        }
        $this->$name = intval($value);
    }
    /**
     * @param Hex Object
     * @return this
     */
    public function fromHex(Hex $hex)
    {
        $this->red = hexdec($hex->red);
        $this->green = hexdec($hex->green);
        $this->blue = hexdec($hex->blue);

        return $this;
    }

    /**
     * @param Hsv Object
     * @return Rgb Object
     */
    public function fromHsv(Hsv $hsv)
    {
        if ($hsv->saturation === 0) {
            return new Rgb($hsv->value * 255,$hsv->value * 255,$hsv->value * 255);
        } else {
            $hsv->hue = ($hsv->hue >= 0) ? $hsv->hue % 360 / 360 : $hsv->hue % 360 / 360 + 1;
            $var_h = $hsv->hue * 6;

            $i = (int)$var_h;
            $f = $var_h - $i;

            $p = $hsv->value * ( 1 - $hsv->saturation );
            $q = $hsv->value * ( 1 - $hsv->saturation * $f );
            $t = $hsv->value * ( 1 - $hsv->saturation * ( 1 - $f ) );

            switch($i){
                case 0:
                    return new Rgb((int)round($hsv->value * 255), (int)round($t * 255), (int)round($p * 255));
                    break;
                case 1:
                    return new Rgb((int)round($q * 255), (int)round($hsv->value * 255), (int)round($p * 255));
                    break;
                case 2:
                    return new Rgb((int)round($p * 255), (int)round($hsv->value * 255), (int)round($t * 255));
                    break;
                case 3:
                    return new Rgb((int)round($p * 255), (int)round($q * 255), (int)round($hsv->value * 255));
                    break;
                case 4:
                    return new Rgb((int)round($t * 255), (int)round($p * 255), (int)round($hsv->value * 255));
                    break;
                default:
                    return new Rgb((int)round($hsv->value * 255), (int)round($p * 255), (int)round($q * 255));
                    break;
            }
        }
    }
    /**
     * @param integer $value
     * @return boolean
     */
    public static function isRange($value)
    {
        return (is_int($value) && 0 <= (int)$value && (int)$value <= 255);
    }
}
