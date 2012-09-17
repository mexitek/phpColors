<?php

require_once __DIR__ . "/../color.php";

class ColorTest extends PHPUnit_Framework_TestCase {

    protected function setUp() {}

    public function testDarkenWithDefaultAdjustment() {

        $expected = array(
            "336699" => "264d73",
            "913399" => "6d2673"
        );

        foreach ($expected as $original => $darker) {

            $color = new Color($original);

            $this->assertEquals(
                $darker,
                $color->darken(),
                "Incorrect darker color returned."
            );
        }
    }

    public function testLightenWithDefaultAdjustment() {

        $expected = array(
            "336699" => "4080bf",
            "913399" => "b540bf"
        );

        foreach ($expected as $original => $darker) {

            $color = new Color($original);

            $this->assertEquals(
                $darker,
                $color->lighten(),
                "Incorrect lighter color returned."
            );
        }
    }

}

/* End of file color.php */