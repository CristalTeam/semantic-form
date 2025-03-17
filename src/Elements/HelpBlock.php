<?php namespace Laravolt\SemanticForm\Elements;

use Laravolt\SemanticForm\Elements\Element;

class HelpBlock extends Element
{
	public function __construct(private $message)
	{
		$this->addClass('help-block');
	}

	public function render()
	{
		$html = '<p';
		$html .= $this->renderAttributes();
		$html .= '>';
		$html .= $this->message;
		$html .= '</p>';

		return $html;
	}
}
