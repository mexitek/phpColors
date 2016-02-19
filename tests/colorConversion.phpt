<?php

require __DIR__ . '/bootstrap.php';

use Mexitek\PHPColors\Color;
use Tester\Assert;


$expected = array(
    '000000' => ['R' => 0, 'G' => 0, 'B' => 0],
    'ffffff' => ['R' => 255, 'G' => 255, 'B' => 255],
    '080c18' => ['R' => 8, 'G' => 12, 'B' => 24],
);

foreach ($expected as $hex => $rgb) {
    Assert::same($hex, Color::rgbToHex($rgb));
    Assert::same($rgb, Color::hexToRgb($hex));
}

Assert::exception(function() {
    Color::rgbToHex(['R' => 0, 'G' => 0]);
}, 'Exception', 'Param was not an RGB array');

Assert::exception(function() {
    Color::rgbToHex(['R' => 0, 'G' => 0, 'B' => 4, 'A' => 8]);
}, 'Exception', 'Param was not an RGB array');
