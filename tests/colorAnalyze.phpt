<?php

require __DIR__ . '/bootstrap.php';

use Mexitek\PHPColors\Color;
use Tester\Assert;


$isDark = array(
	"000000" => TRUE,
	"336699" => TRUE,
	"913399" => TRUE,
	"E5C3E8" => FALSE,
	"D7E8DD" => FALSE,
	"218A47" => TRUE,
	"3D41CA" => TRUE,
	"E5CCDD" => FALSE,
	"FFFFFF" => FALSE,
);

foreach ($isDark as $colorHex => $state) {
	$color = new Color($colorHex);
	Assert::same($state, $color->isDark(), 'Incorrect dark color analyzed (#'. $colorHex .').');
}

$isLight = array(
	"FFFFFF" => TRUE,
	"A3FFE5" => TRUE,
	"000000" => FALSE,
);

foreach ($isLight as $colorHex => $state) {
	$color = new Color($colorHex);
	Assert::same($state, $color->isLight(), 'Incorrect light color analyzed (#'. $colorHex .').');
}
