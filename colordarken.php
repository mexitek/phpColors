<?php
/**
 *
 * A view helper to aid in color darkening
 *
 * @author Arlo Carreon <arlo.carreon@bookit.com>
 *
 */
class ColorDarken extends ViewHelper {
	
	private $_hsl = array();
	
	/**
	 * Outputs a given color
	 *
	 * @param string $color The color to be darkened, assumed that the color is HEX
	 * @param string $darkenAMount The color to be darkened, assumed that the color is HEX
	 * @return string
	 */
	public function render($color = "",$darkenAmount = FALSE) {
		// Strip # sign is present
		$color = str_replace("#", "", $color);

		// Make sure it's 6 digits
		if( strlen($color) == 3 ) {
			$color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
		} else if( strlen($color) != 6 ) {
			throw new Exception("HEX color needs to be 6 or 3 digits long");
		}

		// Convert HEX to HSV
		$this->_hsl = $this->_view->hexToHsl($color);
		
		// Darken our hsl
		$this->darkenBy($darkenAmount);
		
		// Convert back to HEX
		return $this->_view->HslToHex( $this->_hsl );
		
	}
	
	/**
	 *  Accepts a percentage (0-100) or a boolean (FALSE) and darkens by that amoun. FALSE results in a halfway
	 * point between current value and 0 (black).
	 * @param (int | bool) $amount
	 */
	private function darkenBy( $amount ) {
		// Check if we were provided a number
		if( $amount ) {
			$this->_hsl['L'] = ($this->_hsl['L'] * 100) - $amount;
			$this->_hsl['L'] = ($this->_hsl['L'] < 0) ? 0:$this->_hsl['L']/100;
			
			return;
		}
		
		// We need to find out how much to darken
		$this->_hsl['L'] = $this->_hsl['L']  /2 ;
		
	}
	

}
