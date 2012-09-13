<?php 

include("color.php");

$myBlue = new Color("#336699"); 

// Ask for gradient
$grad = $myBlue->makeGradient();
?>
<style>
	.testDiv{
		background-image: linear-gradient(top, <?="#".$grad['light']?>, <?="#".$grad['dark']?>);
		background-image: -o-linear-gradient(top, <?="#".$grad['light']?>, <?="#".$grad['dark']?>);
		background-image: -moz-linear-gradient(top, <?="#".$grad['light']?>, <?="#".$grad['dark']?>);
		background-image: -webkit-linear-gradient(top, <?="#".$grad['light']?>, <?="#".$grad['dark']?>);
		background-image: -ms-linear-gradient(top, <?="#".$grad['light']?>, <?="#".$grad['dark']?>);

		background-image: -webkit-gradient(
			linear,
			left bottom,
			left top,
			color-stop(0.75, <?="#".$grad['light']?>),
			color-stop(0.25, <?="#".$grad['dark']?>)
		);
		
		height:200px;
		width:400px;
	}
</style>
<div class="testDiv"></div>