<?php

namespace matthieumastadenis\couleur\tests\utils;

use       matthieumastadenis\couleur\utils;
use       PHPUnit\Framework\TestCase;

class   ChangeCoordinateTest
extends TestCase {

    public function test_hueParamWrapsResultAbove360(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 10.0,
            actual   : utils\changeCoordinate(350, '+20', false, true, true),
            delta    : 0.001,
        );
    }

    public function test_hueParamWrapsNegativeResultIntoRange(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 350.0,
            actual   : utils\changeCoordinate(10, '-20', false, true, true),
            delta    : 0.001,
        );
    }

    public function test_hueParamCollapses360ToZero(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 0.0,
            actual   : utils\changeCoordinate(340, '+20', false, true, true),
            delta    : 0.001,
        );
    }

    public function test_hueParamLeavesInRangeValuesUnchanged(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 105.0,
            actual   : utils\changeCoordinate(100, '+5', false, true, true),
            delta    : 0.001,
        );
    }

    public function test_hueDefaultsToFalseAndDoesNotWrap(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 370.0,
            actual   : utils\changeCoordinate(350, '+20'),
            delta    : 0.001,
        );
    }

    public function test_hueParamHandlesLargePositiveDeltas(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 9.0,
            actual   : utils\changeCoordinate(29, '+340', false, true, true),
            delta    : 0.001,
        );
    }

    public function test_hueParamHandlesLargeNegativeDeltas(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 349.0,
            actual   : utils\changeCoordinate(29, '-400', false, true, true),
            delta    : 0.001,
        );
    }

    public function test_hueParamIgnoredWhenHexIsTrue(

    ) :void {
        $this->assertSame(
            expected : utils\changeCoordinate('A0', '+20', true, true),
            actual   : utils\changeCoordinate('A0', '+20', true, true, true),
        );
    }

}
