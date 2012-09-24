### Last Build: [![Build Status](https://secure.travis-ci.org/mexitek/phpColors.png)](http://travis-ci.org/mexitek/phpColors)

## How it works
Instantiate an object of the color class with a hex color string `$foo = new Color("336699")`.  That's it!  Now, call the methods you need for different color variants.

## Available Methods
- <strong>darken( [$amount] )</strong> : Allows you to obtain a darker shade of your color. Optionally you can decide to darken using a desired percentage.
- <strong>lighten( [$amount] )</strong> : Allows you to obtain a lighter shade of your color. Optionally you can decide to lighten using a desired percentage.
- <strong>isLight( [$hex] )</strong> : Determins whether your color (or the provide param) is considered a "light" color. Returns `TRUE` if color is light.
- <strong>isDark( [$hex] )</strong> : Determins whether your color (or the provide param) is considered a "dark" color. Returns `TRUE` if color is dark.
- <strong>makeGradient( [$amount] )</strong> : Returns an array with 2 indices `light` and `dark`, the initial color will either be selected for `light` or `dark` depending on its brightness, then the other color will be generated.  The optional param allows for a static lighten or darkened amount.
- <strong>complementary()</strong> : Returns the color "opposite" or complementary to your color.
- <strong>getHex()</strong> : Returns the original hex color.
- <strong>getHsl()</strong> : Returns HSL array for your color.

> Auto lightens/darkens by 10% for sexily-subtle gradients

```php
/**
 * Using The Class
 */

using phpColors\Color;

// Initialize my color
$myBlue = new Color("#336699");

echo $myBlue->darken();
// 1a334d

echo $myBlue->lighten(); 
// 8cb3d9

echo $myBlue->isLight();
// false

echo $myBlue->isDark();
// true

echo $myBlue->complementary();
// 996633

echo $myBlue->getHex();
// 336699

print_r( $myBlue->getHsl() );
// array( "H"=> 210, "S"=> 0.5, "L"=>0.4 );

print_r($myBlue->makeGradient());
// array( "light"=>"8cb3d9" ,"dark"=>"336699" )

```


## Static Methods
- <strong>hslToHex( $hsl )</strong> : Convert a HSL array to a HEX string.
- <strong>hexToHsl( $hex )</strong> : Convert a HEX string into an HSL array.

```php
/**
 * On The Fly Custom Calculations
 */
 
using phpColors\Color;

 // Convert my HEX
 $myBlue = Color::hexToHsl("#336699");
 
 // Get crazy with the HUE
 $myBlue["H"] = 295;
 
 // Gimme my new color!!
 echo Color::hslToHex($myBlue);
 // 913399

```

## CSS Helpers
- <strong>getCssGradient( [$amount] )</strong> : Generates the CSS3 gradients for safari, chrome, opera, firefox and IE10. Optional percentage amount for lighter/darker shade.

> Would like to add support to custom gradient stops

```php

using phpColors\Color;

// Initialize my color
$myBlue = new Color("#336699");

// Get CSS
echo $myBlue->getCssGradient();
/* - Actual output doesn't have comments and is single line
  
  // fallback background
  background: #336699;

  /* IE Browsers */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#8cb3d9', endColorstr='#336699'); 
 
  // Safari 4+, Chrome 1-9
  background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#8cb3d9), to(#336699));
  
  // Safari 5.1+, Mobile Safari, Chrome 10+
  background-image: -webkit-linear-gradient(top, #8cb3d9, #336699);
  
  // Firefox 3.6+
  background-image: -moz-linear-gradient(top, #8cb3d9, #336699);
  
  // IE 10+
  background-image: -ms-linear-gradient(top, #8cb3d9, #336699);
  
  // Opera 11.10+
  background-image: -o-linear-gradient(top, #8cb3d9, #336699);
  
*/

```

# License: [arlo.mit-license.org](http://arlo.mit-license.org)