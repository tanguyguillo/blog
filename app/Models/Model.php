<?php

namespace Application\Models\Model;

/**
 *  class Model
 */
class Model
{
    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->myHydrate($datas);
        }
    }
    /**
     * function to hydrate the objet
     *
     * @param [type] $datas
     * @return void
     */
    public function myHydrate($datas): void
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }
}
