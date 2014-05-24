<?php
/**
 * Created by PhpStorm.
 * User: eliorb
 * Date: 3/12/14
 * Time: 2:47 PM
 */

namespace Wix\UiBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class LanguagePickerType extends AbstractType
{

	public function getParent(array $options)
	{
		return 'text';
	}

	public function getName()
	{
		return 'wix_lang_picker';
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'wixOptions' => '{}',
			'wixModel' => '',
			'langs' => 'En'
		);
	}

	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->setAttribute('wixOptions', $options['wixOptions']);
		$builder->setAttribute('wixModel', $options['wixModel']);
		$builder->setAttribute('langs', $options['langs']);
	}

	public function buildView(FormView $view, FormInterface $form)
	{
		$view->set('wixOptions', $form->getAttribute('wixOptions'));
		$view->set('wixModel', $form->getAttribute('wixModel'));
		$view->set('langs', $form->getAttribute('langs'));
	}
}
