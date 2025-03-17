<?php namespace Laravolt\SemanticForm\OldInput;

use Illuminate\Session\Store as Session;

class IlluminateOldInputProvider implements OldInputInterface
{
    public function __construct(private readonly Session $session)
    {
    }

    public function hasOldInput()
    {
        return ($this->session->get('_old_input')) ? true : false ;
    }

    public function getOldInput($key)
    {
        return $this->session->getOldInput($this->transformKey($key));
    }

    protected function transformKey($key)
    {
        return str_replace(['.', '[]', '[', ']'], ['_', '', '.', ''], $key);
    }
}
