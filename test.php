<?php 

include("color.php");

$myBlue = new Color("#336699"); 

?>
<style>
	.testDiv{
		<?= $myBlue->getCssGradient();?>
		height:200px;
		width:400px;
	}
</style>
<div class="testDiv"></div>