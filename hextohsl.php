<?php
class HexToHsl {
    
    /**
     * Outputs a given color
     *
     * @param string $color The color to convert to HSV array
     * @return string
     */
    public function render($hexColor = FALSE) {
        // Strip # sign is present
        $color = str_replace("#", "", $hexColor);
        
        // Make sure it's 6 digits
        if( strlen($color) == 3 ) {
            $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        } else if( strlen($color) != 6 ) {
            throw new Exception("HEX color needs to be 6 or 3 digits long");
        }
        
        // Convert HEX to DEC
        $R = hexdec($color[0].$color[1]);
        $G = hexdec($color[2].$color[3]);
        $B = hexdec($color[4].$color[5]);
        
        $HSL = array();
	
        $var_R = ($R / 255);
        $var_G = ($G / 255);
        $var_B = ($B / 255);
        
	$var_Min = min($var_R, $var_G, $var_B);
        $var_Max = max($var_R, $var_G, $var_B);
        $del_Max = $var_Max - $var_Min;

        $L = ($var_Max + $var_Min)/2;

        if ($del_Max == 0)
        {
            $H = 0;
            $S = 0;
        }
        else
        {
	    if ( $L < 0.5 ) $S = $del_Max / ( $var_Max + $var_Min );
   	    else            $S = $del_Max / ( 2 - $var_Max - $var_Min );
            
	    $del_R = ( ( ( $var_Max - $var_R ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_G = ( ( ( $var_Max - $var_G ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;
            $del_B = ( ( ( $var_Max - $var_B ) / 6 ) + ( $del_Max / 2 ) ) / $del_Max;

            if      ($var_R == $var_Max) $H = $del_B - $del_G;
            else if ($var_G == $var_Max) $H = ( 1 / 3 ) + $del_R - $del_B;
            else if ($var_B == $var_Max) $H = ( 2 / 3 ) + $del_G - $del_R;
            
	    if ($H<0) $H++;
            if ($H>1) $H--;
        }

        $HSL['H'] = ($H*360);
        $HSL['S'] = $S;
        $HSL['L'] = $L;

        return $HSL;
    }

}
