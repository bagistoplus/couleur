<?php

namespace matthieumastadenis\couleur\tests\colors;

use       matthieumastadenis\couleur\ColorFactory;
use       matthieumastadenis\couleur\ColorSpace;
use       PHPUnit\Framework\TestCase;

class   HueCleanWraparoundTest
extends TestCase {

    public function test_hslHueAbove360Wraps(

    ) :void {
        $color = ColorFactory::newHsl([ 400, 50, 50 ], from: ColorSpace::Hsl);

        $this->assertEqualsWithDelta(
            expected : 40.0,
            actual   : $color->hue,
            delta    : 0.001,
        );
    }

    public function test_hsvHueAbove360Wraps(

    ) :void {
        $color = ColorFactory::newHsv([ 400, 50, 50 ], from: ColorSpace::Hsv);

        $this->assertEqualsWithDelta(
            expected : 40.0,
            actual   : $color->hue,
            delta    : 0.001,
        );
    }

    public function test_hwbHueAbove360Wraps(

    ) :void {
        $color = ColorFactory::newHwb([ 400, 50, 50 ], from: ColorSpace::Hwb);

        $this->assertEqualsWithDelta(
            expected : 40.0,
            actual   : $color->hue,
            delta    : 0.001,
        );
    }

    public function test_lchHueAbove360Wraps(

    ) :void {
        $color = ColorFactory::newLch([ 50, 30, 400 ], from: ColorSpace::Lch);

        $this->assertEqualsWithDelta(
            expected : 40.0,
            actual   : $color->hue,
            delta    : 0.001,
        );
    }

    public function test_okLchHueAbove360Wraps(

    ) :void {
        $color = ColorFactory::newOkLch([ 70, 0.15, 400 ], from: ColorSpace::OkLch);

        $this->assertEqualsWithDelta(
            expected : 40.0,
            actual   : $color->hue,
            delta    : 0.001,
        );
    }

    public function test_okLchNegativeHueWrapsBackInto360Range(

    ) :void {
        $color = ColorFactory::newOkLch([ 70, 0.15, -30 ], from: ColorSpace::OkLch);

        $this->assertEqualsWithDelta(
            expected : 330.0,
            actual   : $color->hue,
            delta    : 0.001,
        );
    }

}
