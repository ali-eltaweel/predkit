<?php

namespace Predkit;

/**
 * Predicate class provides a base implementation of the IPredicate interface.
 * It allows for the creation of predicates that can be combined using logical operations.
 * 
 * @api
 * @abstract
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
abstract class Predicate implements IPredicate {

    /**
     * Tests a value against the predicate.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param mixed $value The value to test against the predicate.
     * @return bool True if the value satisfies the predicate, false otherwise.
     */
    public final function __invoke(mixed $value): bool {

        return $this->test($value);
    }

    /**
     * Combines this predicate with one or more predicates using logical AND.
     * 
     * @api
     * @verride
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical AND of this predicate and the provided predicates.
     */
    public function and(IPredicate $predicate, IPredicate ...$predicates): IPredicate {

        return new Compound\AndPredicate($this, $predicate, ...$predicates);
    }

    /**
     * Combines this predicate with one or more predicates using logical OR.
     * 
     * @api
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical OR of this predicate and the provided predicates.
     */
    public function or(IPredicate $predicate, IPredicate ...$predicates): IPredicate {

        return new Compound\OrPredicate($this, $predicate, ...$predicates);
    }

    /**
     * Negates this predicate, creating a new predicate that tests for the opposite condition.
     * 
     * @api
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @return IPredicate A new predicate that represents the negation of this predicate.
     */
    public function not(): IPredicate {

        return new Compound\NotPredicate($this);
    }

    /**
     * Combines this predicate with one or more predicates using logical NAND.
     * 
     * @api
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical NAND of this predicate and the provided predicates.
     */
    public function nand(IPredicate $predicate, IPredicate ...$predicates): IPredicate {

        return new Compound\NandPredicate($this, $predicate, ...$predicates);
    }

    /**
     * Combines this predicate with one or more predicates using logical NOR.
     * 
     * @api
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical NOR of this predicate and the provided predicates.
     */
    public function nor(IPredicate $predicate, IPredicate ...$predicates): IPredicate {

        return new Compound\NorPredicate($this, $predicate, ...$predicates);
    }
    
    /**
     * Combines this predicate with one or more predicates using logical XOR.
     * 
     * @api
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical XOR of this predicate and the provided predicates.
     */
    public function xor(IPredicate $predicate, Predicate ...$predicates): IPredicate {

        return new Compound\XorPredicate($this, $predicate, ...$predicates);
    }
    
    /**
     * Combines this predicate with one or more predicates using logical XNOR.
     * 
     * @api
     * @override
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical XNOR of this predicate and the provided predicates.
     */
    public function xnor(IPredicate $predicate, Predicate ...$predicates): IPredicate {

        return new Compound\XnorPredicate($this, $predicate, ...$predicates);
    }

    /**
     * Creates a new predicate from a callable function.
     * 
     * @api
     * @final
     * @static
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param callable(mixed): bool $callable
     * @return IPredicate A new predicate that tests values using the provided callable.
     */
    public static final function fromCallable(callable $callable): IPredicate {

        return new class($callable) extends Predicate {

            private $callable;

            public function __construct(callable $callable) {

                $this->callable = $callable;
            }

            public final function test(mixed $value): bool {

                return ($this->callable)($value);
            }
        };
    }
}
