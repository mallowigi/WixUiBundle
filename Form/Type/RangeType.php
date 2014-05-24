<?php
/**
 * Created by PhpStorm.
 * User: eliorb
 * Date: 12/18/13
 * Time: 8:16 PM
 */

namespace Wix\UiBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;

class RangeType extends AbstractType
{
	/**
	 * Get parent
	 *
	 * @return string
	 */
	public function getParent(array $options)
	{
		return 'integer';
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName()
	{
		return 'range';
	}

	public function getDefaultOptions(array $options)
	{
		return array(
			'min' => 0,
			'max' => 100,
			'step' => 1
		);
	}

	public function buildForm(FormBuilder $builder, array $options)
	{
		$builder->setAttribute('min', $options['min']);
		$builder->setAttribute('max', $options['max']);
		$builder->setAttribute('step', $options['step']);
	}

	public function buildView(FormView $view, FormInterface $form)
	{
		$view->set('min', $form->getAttribute('min'));
		$view->set('max', $form->getAttribute('max'));
		$view->set('step', $form->getAttribute('step'));
	}


}
