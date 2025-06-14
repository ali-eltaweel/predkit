<?php

namespace Predkit\Compound;

use Predkit\IPredicate;

/**
 * NorPredicate class implements a logical NOR operation for multiple predicates.
 * It tests if all provided predicates return false for a given value.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class NorPredicate extends NotPredicate {

    /**
     * Constructs a new NorPredicate instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates The predicates to combine using logical NOR.
     */
    public final function __construct(IPredicate $p1, IPredicate $p2, IPredicate ...$predicates) {

        parent::__construct(new OrPredicate($p1, $p2, ...$predicates));
    }
}
