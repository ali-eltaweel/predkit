<?php

namespace Predkit\Compound;

use Predkit\{ IPredicate, Predicate };

/**
 * XorPredicate class implements a logical XOR operation for multiple predicates.
 * It tests if an odd number of the provided predicates return true for a given value.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class XorPredicate extends Predicate {

    /**
     * An array of predicates that will be combined using logical XOR.
     * 
     * @api
     * @since 1.0.0
     * 
     * @var array<IPredicate> $predicates
     */
    public readonly array $predicates;

    /**
     * Constructs a new XorPredicate instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates The predicates to combine using logical XOR.
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

        $trues = array_reduce($this->predicates, function(int $trues, IPredicate $predicate) use ($value) {

            return $trues + intval($predicate->test($value));

        }, 0);

        return ($trues % 2) === 1;
    }
}
