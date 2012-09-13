# phpColors

A series of PHP classes that let you manipulate colors. Just incase you ever need different shades of one color on the fly.

## How it works
Instantiate an object of the color class with a hex color string `$foo = new Color("336699")`.  That's it!  Now, call the methods you need for different color variants.

## Available Methods
- <strong>darken( [$amount] )</strong> : Allows you to obtain a darker shade of your color. Optionally you can decide to darken using a desired percentage.
- <strong>lighten( [$amount] )</strong> : Allows you to obtain a lighter shade of your color. Optionally you can decide to lighten using a desired percentage.
- <strong>isLight( [$hex] )</strong> : Determins whether your color (or the provide param) is considered a "light" color. Returns `TRUE` if color is light.
- <strong>isDark( [$hex] )</strong> : Determins whether your color (or the provide param) is considered a "dark" color. Returns `TRUE` if color is dark.
- <strong>makeGradient( [$amount] )</strong> : Returns an array with 2 indices `light` and `dark`, the initial color will either be selected for `light` or `dark` dependings on it's brightness, then the other color will be generated.  The optional param allows for a static lighten or darkened amount.

*If a darker is lighter color is automatically generated the class will choose the shade halfway between your color and black (for dark) or halfway between your color and white (for light)*

## Examples

```php

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

print_r($myBlue->makeGradient());
// array( "light"=>"8cb3d9" ,"dark"=>"336699" )

```
