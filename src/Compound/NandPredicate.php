<?php

namespace Predkit\Compound;

use Predkit\IPredicate;

/**
 * NandPredicate class implements a logical NAND operation for multiple predicates.
 * It tests if at least one of the provided predicates returns false for a given value.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class NandPredicate extends NotPredicate {

    /**
     * Constructs a new NandPredicate instance.
     * 
     * @api
     * @final
     * @since 1.0.0
     * @version 1.0.0
     * 
     * @param IPredicate ...$predicates The predicates to combine using logical NAND.
     */
    public final function __construct(IPredicate $p1, IPredicate $p2, IPredicate ...$predicates) {

        parent::__construct(new AndPredicate($p1, $p2, ...$predicates));
    }
}
