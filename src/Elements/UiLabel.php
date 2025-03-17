<?php namespace Laravolt\SemanticForm\Elements;

class UiLabel extends Element
{
    protected $attributes = [
        'class' => 'ui label',
    ];

    /**
     * Icon constructor.
     * @param string icon name
     */
    public function __construct(protected $text)
    {
    }


    public function render()
    {

        $html = '<div';
        $html .= $this->renderAttributes();
        $html .= '>';

        $html .= $this->text;

        $html .= '</div>';

        return $html;
    }

}
