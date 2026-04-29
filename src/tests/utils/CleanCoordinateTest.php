<?php

namespace matthieumastadenis\couleur\tests\utils;

use       matthieumastadenis\couleur\utils;
use       PHPUnit\Framework\TestCase;

class   CleanCoordinateTest
extends TestCase {

    public function test_loopWrapsValuesAboveMax(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 40.0,
            actual   : utils\cleanCoordinate(400, 0, 360, true),
            delta    : 0.001,
        );
    }

    public function test_loopWrapsValuesBelowMin(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 330.0,
            actual   : utils\cleanCoordinate(-30, 0, 360, true),
            delta    : 0.001,
        );
    }

    public function test_loopExactMaxBecomesMin(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 0.0,
            actual   : utils\cleanCoordinate(360, 0, 360, true),
            delta    : 0.001,
        );
    }

    public function test_loopFalseStillClampsAboveMax(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 360.0,
            actual   : utils\cleanCoordinate(400, 0, 360, false),
            delta    : 0.001,
        );
    }

    public function test_loopFalseStillClampsBelowMin(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 0.0,
            actual   : utils\cleanCoordinate(-30, 0, 360, false),
            delta    : 0.001,
        );
    }

    public function test_loopWithoutMaxClamps(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 0.0,
            actual   : utils\cleanCoordinate(-30, 0, null, true),
            delta    : 0.001,
        );
    }

    public function test_loopWithoutMinClamps(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 360.0,
            actual   : utils\cleanCoordinate(400, null, 360, true),
            delta    : 0.001,
        );
    }

    public function test_loopHandlesNonZeroMin(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 55.0,
            actual   : utils\cleanCoordinate(105, 50, 100, true),
            delta    : 0.001,
        );
    }

    public function test_loopLeavesInRangeValuesUnchanged(

    ) :void {
        $this->assertEqualsWithDelta(
            expected : 180.0,
            actual   : utils\cleanCoordinate(180, 0, 360, true),
            delta    : 0.001,
        );
    }

}
