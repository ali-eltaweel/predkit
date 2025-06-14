<?php

namespace Predkit;

/**
 * IPredicate interface defines a contract for predicate objects.
 * It provides methods to test values against the predicate and to combine predicates using logical operations.
 * 
 * @api
 * @interface
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
interface IPredicate {

    /**
     * Tests a value against the predicate.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param mixed $value The value to test against the predicate.
     * @return boolean True if the value satisfies the predicate, false otherwise.
     */
    function test(mixed $value): bool;

    /**
     * Combines this predicate with one or more predicates using logical AND.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical AND of this predicate and the provided predicates.
     */
    function and(IPredicate $predicate, IPredicate ...$predicates): IPredicate;

    /**
     * Combines this predicate with one or more predicates using logical OR.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical OR of this predicate and the provided predicates.
     */
    function or(IPredicate $predicate, IPredicate ...$predicates): IPredicate;

    /**
     * Negates this predicate, creating a new predicate that tests for the opposite condition.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @return IPredicate A new predicate that represents the negation of this predicate.
     */
    function not(): IPredicate;

    /**
     * Combines this predicate with one or more predicates using logical NAND.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical NAND of this predicate and the provided predicates.
     */
    function nand(IPredicate $predicate, IPredicate ...$predicates): IPredicate;

    /**
     * Combines this predicate with one or more predicates using logical NOR.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical NOR of this predicate and the provided predicates.
     */
    function nor(IPredicate $predicate, IPredicate ...$predicates): IPredicate;
    
    /**
     * Combines this predicate with one or more predicates using logical XOR.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical XOR of this predicate and the provided predicates.
     */
    function xor(IPredicate $predicate, Predicate ...$predicates): IPredicate;
    
    /**
     * Combines this predicate with one or more predicates using logical XNOR.
     * 
     * @api
     * @abstract
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates One or more predicates to combine with this predicate.
     * @return IPredicate A new predicate that represents the logical XNOR of this predicate and the provided predicates.
     */
    function xnor(IPredicate $predicate, Predicate ...$predicates): IPredicate;
}
