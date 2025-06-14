<?php

namespace Predkit\Compound;

use Predkit\{ IPredicate, Predicate };

/**
 * OrPredicate class implements a logical OR operation for multiple predicates.
 * It tests if at least one of the provided predicates returns true for a given value.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class OrPredicate extends Predicate {

    /**
     * An array of predicates that will be combined using logical OR.
     * 
     * @api
     * @since 1.0.0
     * 
     * @var array<IPredicate> $predicates
     */
    public readonly array $predicates;

    /**
     * Constructs a new OrPredicate instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates The predicates to combine using logical OR.
     */
    public final function __construct(Predicate $p1, Predicate $p2, Predicate ...$predicates) {

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
            
            if ($predicate->test($value)) {
                
                return true;
            }
        }

        return false;
    }
}
