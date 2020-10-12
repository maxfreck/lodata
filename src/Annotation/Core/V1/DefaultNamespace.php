<?php

namespace Flat3\Lodata\Annotation\Core\V1;

use Flat3\Lodata\Annotation;
use Flat3\Lodata\Type\Boolean;

class DefaultNamespace extends Annotation
{
    protected $name = 'Org.OData.Core.V1.DefaultNamespace';

    public function __construct()
    {
        $this->type = new Boolean(true);
        $this->type->seal();
    }
}