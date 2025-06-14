<?php

namespace Predkit\Compound;

use Predkit\IPredicate;

/**
 * XnorPredicate class implements a logical XNOR operation for multiple predicates.
 * It tests if all provided predicates return the same boolean value for a given value.
 * 
 * @api
 * @final
 * @since 1.0.0
 * @version 1.0.0
 * @package Predkit
 * @author Ali M. Kamel <ali.kamel.dev@gmail.com>
 */
final class XnorPredicate extends NotPredicate {

    public final function __construct(IPredicate $p1, IPredicate $p2, IPredicate ...$predicates) {

        parent::__construct(new XorPredicate($p1, $p2, ...$predicates));
    }
}
