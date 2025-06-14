<?php

namespace Predkit\Compound;

use Predkit\{ IPredicate, Predicate };

/**
 * AndPredicate class implements a logical AND operation for multiple predicates.
 * It tests if all provided predicates return true for a given value.
 *
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class AndPredicate extends Predicate {

    /**
     * An array of predicates that will be combined using logical AND.
     * 
     * @api
     * @since 1.0.0
     * 
     * @var array<IPredicate> $predicates
     */
    public readonly array $predicates;

    /**
     * Constructs a new AndPredicate instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates The predicates to combine using logical AND.
     */
    public final function __construct(IPredicate $p1, IPredicate $p2, IPredicate ...$predicates) {

        $this->predicates = [ $p1, $p2, ...$predicates ];
    }

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

        foreach ($this->predicates as $predicate) {
            
            if (!$predicate->test($value)) {
                
                return false;
            }
        }

        return true;
    }
}
