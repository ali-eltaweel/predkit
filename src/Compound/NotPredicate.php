<?php

namespace Predkit\Compound;

use Predkit\{ IPredicate, Predicate };

/**
 * NotPredicate class implements a logical NOT operation for a single predicate.
 * It tests if the provided predicate returns false for a given value.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
class NotPredicate extends Predicate {

    /**
     * Constructs a new NotPredicate instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate $predicate The predicate to negate.
     */
    public function __construct(public readonly IPredicate $predicate) {}

    /**
     * Tests a value against the predicate.
     * 
     * @api
     * @final
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param mixed $value The value to test against the predicate.
     * @return boolean True if the value satisfies the predicate, false otherwise.
     */
    public final function test(mixed $value): bool {

        return !$this->predicate->test($value);
    }
}
