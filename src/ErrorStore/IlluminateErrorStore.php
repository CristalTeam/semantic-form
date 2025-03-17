<?php namespace Laravolt\SemanticForm\ErrorStore;

use Illuminate\Session\Store as Session;

class IlluminateErrorStore implements ErrorStoreInterface
{
    public function __construct(private Session $session)
    {
    }

    public function hasError($key)
    {
        if (! $this->hasErrors()) {
            return false;
        }

        $key = $this->transformKey($key);
        return $this->getErrors()->has($key);
    }

    public function getError($key)
    {
        if (! $this->hasError($key)) {
            return null;
        }

        $key = $this->transformKey($key);
        return $this->getErrors()->first($key);
    }

    protected function hasErrors()
    {
        return $this->session->has('errors');
    }

    protected function getErrors()
    {
        return $this->hasErrors() ? $this->session->get('errors') : null;
    }

    protected function transformKey($key)
    {
        return str_replace(['.', '[]', '[', ']'], ['_', '', '.', ''], $key);
    }
}
