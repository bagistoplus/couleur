<?php

namespace matthieumastadenis\couleur\tests\colors;

use       matthieumastadenis\couleur\ColorFactory;
use       matthieumastadenis\couleur\ColorSpace;
use       PHPUnit\Framework\TestCase;

class   HueChangeWraparoundTest
extends TestCase {

    public function test_hslChangeHueWrapsAbove360(

    ) :void {
        $color = ColorFactory::newHsl([ 350, 50, 50 ], from: ColorSpace::Hsl);

        $this->assertEqualsWithDelta(
            expected : 10.0,
            actual   : $color->change(hue: '+20')->hue,
            delta    : 0.001,
        );
    }

    public function test_hsvChangeHueWrapsAbove360(

    ) :void {
        $color = ColorFactory::newHsv([ 350, 50, 50 ], from: ColorSpace::Hsv);

        $this->assertEqualsWithDelta(
            expected : 10.0,
            actual   : $color->change(hue: '+20')->hue,
            delta    : 0.001,
        );
    }

    public function test_hwbChangeHueWrapsAbove360(

    ) :void {
        $color = ColorFactory::newHwb([ 350, 50, 50 ], from: ColorSpace::Hwb);

        $this->assertEqualsWithDelta(
            expected : 10.0,
            actual   : $color->change(hue: '+20')->hue,
            delta    : 0.001,
        );
    }

    public function test_lchChangeHueWrapsAbove360(

    ) :void {
        $color = ColorFactory::newLch([ 50, 30, 350 ], from: ColorSpace::Lch);

        $this->assertEqualsWithDelta(
            expected : 10.0,
            actual   : $color->change(hue: '+20')->hue,
            delta    : 0.001,
        );
    }

    public function test_okLchChangeHueWrapsAbove360(

    ) :void {
        $color = ColorFactory::newOkLch([ 70, 0.15, 350 ], from: ColorSpace::OkLch);

        $this->assertEqualsWithDelta(
            expected : 10.0,
            actual   : $color->change(hue: '+20')->hue,
            delta    : 0.001,
        );
    }

    public function test_okLchChangeHueWrapsNegativeBackInto360Range(

    ) :void {
        $color = ColorFactory::newOkLch([ 70, 0.15, 10 ], from: ColorSpace::OkLch);

        $this->assertEqualsWithDelta(
            expected : 350.0,
            actual   : $color->change(hue: '-20')->hue,
            delta    : 0.001,
        );
    }

}
