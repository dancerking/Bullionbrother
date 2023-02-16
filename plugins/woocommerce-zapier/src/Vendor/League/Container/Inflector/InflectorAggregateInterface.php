<?php

namespace OM4\WooCommerceZapier\Vendor\League\Container\Inflector;

use OM4\WooCommerceZapier\Vendor\League\Container\ImmutableContainerAwareInterface;
interface InflectorAggregateInterface extends \OM4\WooCommerceZapier\Vendor\League\Container\ImmutableContainerAwareInterface
{
    /**
     * Add an inflector to the aggregate.
     *
     * @param  string   $type
     * @param  callable $callback
     * @return \League\Container\Inflector\Inflector
     */
    public function add($type, callable $callback = null);
    /**
     * Applies all inflectors to an object.
     *
     * @param  object $object
     * @return object
     */
    public function inflect($object);
}
