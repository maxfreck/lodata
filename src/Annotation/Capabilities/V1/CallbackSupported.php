<?php

declare(strict_types=1);

namespace Flat3\Lodata\Annotation\Capabilities\V1;

use Flat3\Lodata\Annotation;
use Flat3\Lodata\Annotation\Capabilities\CallbackType;
use Flat3\Lodata\Helper\PropertyValue;
use Flat3\Lodata\Type\Collection;
use Flat3\Lodata\Type\String_;

/**
 * Callback Supported
 * @package Flat3\Lodata\Annotation\Capabilities\V1
 */
class CallbackSupported extends Annotation
{
    protected $name = 'Org.OData.Capabilities.V1.CallbackSupported';

    public function __construct()
    {
        $callbackProtocolType = new Annotation\Capabilities\CallbackProtocol();
        $callbackProtocol = new Annotation\Record();
        $callbackProtocol->setType($callbackProtocolType);
        $callbackProtocol[] = (new PropertyValue())
            ->setProperty($callbackProtocolType->getProperty(Annotation\Capabilities\CallbackProtocol::id))
            ->setValue(new String_(Annotation\Capabilities\CallbackProtocol::http));

        $callbackProtocols = new Collection();
        $callbackProtocols->add($callbackProtocol);

        $callbackType = new CallbackType();
        $record = new Annotation\Record();
        $record->setType($callbackType);
        $record[] = (new PropertyValue())
            ->setProperty($callbackType->getProperty(CallbackType::callbackProtocols))
            ->setValue($callbackProtocols);

        $this->value = $record;
    }
}