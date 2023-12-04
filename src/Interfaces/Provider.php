<?php

namespace Xmo\Api\Interfaces;

use Xmo\Api\Core\Container;

/**
 * Interface Provider
 * @package JavaReact\AlibabaOpen\interfaces
 */
interface Provider
{
    /**
     * @param Container $container
     * @return void
     */
    public function serviceProvider(Container $container): void;
}
