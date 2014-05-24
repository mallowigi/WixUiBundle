<?php
/**
 * Created by PhpStorm.
 * User: eliorb
 * Date: 1/13/14
 * Time: 1:00 PM
 */

namespace Wix\UiBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class WixColorPickerType extends AbstractType
{
	public function getParent(array $options)
	{
		return 'text';
	}

	public function getName()
	{
		return 'wix_color';
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'wixModel' => '',
			'wixOptions' => "{startWithColor:'black/white'}"
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
		$view->set('wixOptions', $form->getAttribute('wixOptions'));
	}
} 
