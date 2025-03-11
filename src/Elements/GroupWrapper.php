<?php namespace Laravolt\SemanticForm\Elements;

class GroupWrapper implements \Stringable
{
	public function __construct(protected $formGroup)
    {
    }

	public function render()
	{
		return $this->formGroup->render();
	}

	public function helpBlock($text)
	{
		$this->formGroup->helpBlock($text);
		return $this;
	}

	public function __toString(): string
	{
		return (string) $this->render();
	}

	public function labelClass($class)
	{
		$this->formGroup->label()->addClass($class);
		return $this;
	}

	public function hideLabel()
	{
		$this->labelClass('sr-only');
		return $this;
	}

	public function inline()
	{
		$this->formGroup->inline();
		return $this;
	}

	public function __call($method, $parameters)
	{
		call_user_func_array([$this->formGroup->control(), $method], $parameters);
		return $this;
	}
}
