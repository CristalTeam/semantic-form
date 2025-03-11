<?php 

namespace Laravolt\SemanticForm\Elements;

class InputWrapper extends Wrapper
{

    protected $attributes = [
        'class' => 'ui input'
    ];

    protected $controlsLeft = [];

    protected $controlsRight = [];

    // ça c'est nous
    protected $errorBlock;

    public function __construct()
    {
        $this->controls = func_get_args();

        if (empty($this->controls)) {
            $this->controls[] = new Text('');
        }
    }

    protected function beforeRender()
    {
        $this->controls = array_merge(array_merge($this->controlsLeft, $this->controls), $this->controlsRight);

        // ça c'est nous
        if($error = $this->hasError()) {
        	$this->addClass('error');
        	$this->appendIcon('remove', 'red');
        	$this->errorBlock($error);
        }

    }

    // ça c'est nous
    protected function afterRender()
    {
        return $this->errorBlock;
    }

    // ça c'est nous
    public function errorBlock($error)
    {
        if (isset($this->errorBlock)) {
            return;
        }
        $this->errorBlock = new ErrorBlock($error);

        return $this;
    }


    public function prependIcon($icon, $class = null)
    {
        $this->clearRightIcon();

        $icon = (new Icon($icon))->addClass($class);

        $this->addClass('left icon');
        $this->controlsLeft = array_prepend($this->controlsLeft, $icon);

        return $this;
    }

    public function appendIcon($icon, $class = null)
    {
        $this->clearLeftIcon();

        $icon = (new Icon($icon))->addClass($class);

        $this->addClass('icon');
        $this->controlsRight = array_prepend($this->controlsRight, $icon);

        return $this;
    }

    public function prependLabel($text, $class = null)
    {
        $this->addClass('labeled');
        $this->controlsLeft = array_prepend($this->controlsLeft, (new UiLabel($text))->addClass($class));

        return $this;
    }

    public function appendLabel($text, $class = null)
    {
        $this->removeClass('labeled')->addClass('right labeled');
        $this->controlsRight = array_prepend($this->controlsRight, (new UiLabel($text))->addClass($class));

        return $this;
    }

    public function placeholder($placeholder)
    {
        $this->getPrimaryControl()->placeholder($placeholder);

        return $this;
    }

    protected function clearLeftIcon()
    {
        $this->removeClass('left icon');

        foreach($this->controlsLeft as $key => $control) {
            if ($control instanceof  Icon) {
                unset($this->controlsLeft[$key]);
            }
        }
    }

    protected function clearRightIcon()
    {
        $this->removeClass('icon');

        foreach($this->controlsRight as $key => $control) {
            if ($control instanceof  Icon) {
                unset($this->controlsRight[$key]);
            }
        }
    }

    // ça c'est nous
    public function hasError() {

    	$error = null;
        foreach($this->controls as $control) {
        	$error .= @$control->hasError();
        }
        
        return $error;

    }

}
