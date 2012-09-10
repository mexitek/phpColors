<?php

include("hsltohex.php");
include("hextohsl.php");

// Instantiate
$getHEX = new HslToHex();
$getHSL = new HexToHsl();

// Local var
$testColor = "369";
$testHSL = $getHSL->render($testColor);
$testHEX = $getHEX->render($testHSL);        

echo "Testing: $testColor ------\n";
print_r($testHSL);
echo "\n-----------\n";
print_r($testHEX);
echo "\n-----------\n";

