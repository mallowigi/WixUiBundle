<?php
/**
 * Created by PhpStorm.
 * User: eliorb
 * Date: 1/12/14
 * Time: 1:10 PM
 */

namespace Wix\UiBundle\Twig;


class HexToRgbaExtension extends \Twig_Extension
{
	public function getFilters()
	{
		return array(
			'hexToRgba' => new \Twig_Filter_Method($this, 'hexToRgbaFilter')
		);
	}

	public function hexToRgbaFilter($hex, $opacity, $isTransparent = true)
	{
		$hex = str_replace("#", "", $hex);
		if ($isTransparent) {
			$opacity = $opacity < 1 ? $opacity : $opacity / 100;
		} else {
			$opacity = 1;
		}

		if (strlen($hex) == 3) {
			$r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
			$g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
			$b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
		} else {
			$r = hexdec(substr($hex, 0, 2));
			$g = hexdec(substr($hex, 2, 2));
			$b = hexdec(substr($hex, 4, 2));
		}
		$rgb = array($r, $g, $b, $opacity);
		return 'rgba(' . implode(",", $rgb) . ')'; // returns the rgb values separated by commas
	}

	public function getName()
	{
		return 'hex_to_rgba_extension';
	}
}
