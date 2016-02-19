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
}, 'Exception', 'Given RBG array has to contain exactly 3 values');

Assert::exception(function() {
    Color::rgbToHex(['R' => 0, 'G' => 0, 'B' => 4, 'A' => 8]);
}, 'Exception', 'Given RBG array has to contain exactly 3 values');

Assert::exception(function() {
    Color::rgbToHex(['R' => 0, 'G' => 0, 'A' => 8]);
}, 'Exception', 'Given RBG array has to contain R, G and B keys');

Assert::exception(function() {
    Color::rgbToHex(['R' => 0, 'G' => 'dog', 'B' => 8]);
}, 'Exception', 'RGB array has to contain only integer values (invalid key "G")');

Assert::exception(function() {
    Color::rgbToHex(['R' => 0, 'G' => 824, 'B' => 8]);
}, 'Exception', 'RGB array has to contain integer values >= 0 and <= 255 (invalid key "G")');
