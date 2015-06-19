<?php

namespace Core;

trait ModelService
{
    public function get($model)
    {
        $model = "Front\\Model\\". ucfirst($model);
        
        return new $model();
    }
}