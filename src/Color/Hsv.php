<?php
/**
* Hsv Class for Color Class
*/
namespace Color;

class Hsv
{
    public $hue;
    public $saturation;
    public $value;

    public function __construct($h = 0, $s = 0, $v = 0)
    {
        $this->hue = $h;
        $this->saturation = $s;
        $this->value = $v;

        return $this;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function fromRGB(Rgb $rgb)
    {
        $h = 0;
        $s = 0;
        $v = 0;
        $r = $rgb->red   / 255;
        $g = $rgb->green  / 255;
        $b = $rgb->blue / 255;
        $max = max($r, $g, $b);
        $min = min($r, $g, $b);
        switch (true) {
            case ($max === $min):
                $this->hue = 0;
                break;
            case ($max === $r):
                $this->hue = (60 * ($g - $b) / ($max - $min) + 360) % 360;
                break;
            case ($max === $g):
                $this->hue = 60 * ($b - $r) / ($max - $min) + 120;
                break;
            case ($max === $b):
                $this->hue = 60 * ($r - $g) / ($max - $min) + 240;
                break;
        }

        $this->saturation = ($max === 0) ? 0 : 1 - $min / $max;
        $this->value = $max;
        
        return $this;
    }
}
