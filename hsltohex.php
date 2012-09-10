<?php
  class HslToHex {
    
    /**
     * Outputs a given color
     * Algorithm: http://www.easyrgb.com/index.php?X=MATH&H=19#text19
     * @param string $color The color to convert to HSV array
     * @return string
     */
    public function render($hsl = FALSE) {
        // Make sure it's HSV
        if(     empty($hsl) || !isset($hsl["H"]) || !isset($hsl["S"]) || !isset($hsl["L"]) ) {
            throw new Exception("Param was not an HSL array");
        }
        
        list($H,$S,$L) = array( $hsl['H']/360,$hsl['S'],$hsl['L'] );
        
	if( $S == 0 ) {
            $r = $L * 255;
            $g = $L * 255;
            $b = $L * 255;
        } else {
            
            if($L<0.5) {
                $var_2 = $L*(1+$S);
            } else {
                $var_2 = ($L+$S) - ($S*$L);
            }
            
            $var_1 = 2 * $L - $var_2;
            
	    $r = 255 * $this->huetorgb( $var_1, $var_2, $H + (1/3) );
            $g = 255 * $this->huetorgb( $var_1, $var_2, $H );
            $b = 255 * $this->huetorgb( $var_1, $var_2, $H - (1/3) );
            
        }
	
	return dechex(round($r)).dechex(round($g)).dechex(round($b));
    }
    
    /**
     * Private helper for converting Hue to RGB
     * Algorithm: http://www.easyrgb.com/index.php?X=MATH&H=19#text19
     */
    private function huetorgb( $v1,$v2,$vH ) {
        
        if( $vH < 0 ) {
            $vH += 1;
        }
        
        if( $vH > 1 ) {
            $vH -= 1;
        }
        
        if( (6*$vH) < 1 ) { 
               return ($v1 + ($v2 - $v1) * 6 * $vH);       
        }
        
        if( (2*$vH) < 1 ) { 
            return $v2; 
        }
        
        if( (3*$vH) < 2 ) { 
            return ($v1 + ($v2-$v1) * ( (2/3)-$vH ) * 6); 
        }
        
        return $v1;
            
    }

}
