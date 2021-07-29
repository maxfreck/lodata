<?php

declare(strict_types=1);

namespace Flat3\Lodata\Annotation\Capabilities\V1;

use Flat3\Lodata\Annotation;
use Flat3\Lodata\Annotation\Capabilities\DeepInsertSupportType;
use Flat3\Lodata\Helper\PropertyValue;
use Flat3\Lodata\Type\Boolean;

/**
 * Deep insert support
 * @package Flat3\Lodata\Annotation\Capabilities\V1
 */
class DeepInsertSupport extends Annotation
{
    protected $name = 'Org.OData.Capabilities.V1.DeepInsertSupport';

    public function __construct()
    {
        $type = new DeepInsertSupportType();

        $value = new Annotation\Record();
        $value->setType($type);

        $value[] = (new PropertyValue())
            ->setProperty($type->getProperty(DeepInsertSupportType::supported))
            ->setValue(Boolean::factory(true));

        $value[] = (new PropertyValue())
            ->setProperty($type->getProperty(DeepInsertSupportType::contentIdSupported))
            ->setValue(Boolean::factory(true));

        $this->value = $value;
    }

    public function setSupported(bool $supported): self
    {
        $this->value[DeepInsertSupportType::supported]->setValue(Boolean::factory($supported));

        return $this;
    }

    public function setContentIDSupported(bool $contentIDSupported): self
    {
        $this->value[DeepInsertSupportType::contentIdSupported]->setValue(Boolean::factory($contentIDSupported));

        return $this;
    }
}