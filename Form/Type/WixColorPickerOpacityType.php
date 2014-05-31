<?php
/**
 * Created by PhpStorm.
 * User: eliorb
 * Date: 1/13/14
 * Time: 1:00 PM
 */

namespace Wix\InstagramBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class WixColorPickerOpacityType extends AbstractType
{
	public function getParent(array $options)
	{
		return 'text';
	}

	public function getName()
	{
		return 'wix_color_opacity';
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'wixModel' => '',
			'wixOptions' => array('startWithColor' => "white/black")
		);
	}

	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->setAttribute('wixModel', $options['wixModel']);
		$builder->setAttribute('wixOptions', $options['wixOptions']);
	}

	public function buildView(FormView $view, FormInterface $form)
	{
		$view->set('wixModel', $form->getAttribute('wixModel'));
		$view->set('wixOptions', stripslashes(json_encode($form->getAttribute('wixOptions'))));
	}
} 
