<?php
/**
 * Created by PhpStorm.
 * User: eliorb
 * Date: 1/12/14
 * Time: 1:10 PM
 */

namespace Wix\UiBundle\Twig;


class WixStyleExtension extends \Twig_Extension
{
	public function getFilters()
	{
		return array(
			'wixStyle' => new \Twig_Filter_Method($this, 'wixStyleFilter')
		);
	}

	public function wixStyleFilter($value, $param)
	{
		return "{{style.$param $value}}";
	}

	public function getName()
	{
		return 'wix_style_extension';
	}
}
