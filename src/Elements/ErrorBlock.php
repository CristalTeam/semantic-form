<?php namespace Laravolt\SemanticForm\Elements;

use Laravolt\SemanticForm\Elements\Element;

class ErrorBlock extends Element
{
	public function __construct(private $message)
	{
		$this->addClass('ui pointing red basic label');
	}

	public function render()
	{
		$html = '<div';
		$html .= $this->renderAttributes();
		$html .= '>';
		$html .= $this->message;
		$html .= '</div>';

		return $html;
	}
}
