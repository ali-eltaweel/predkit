# Predkit

**Composable predicate classes for PHP, allowing flexible combination of conditions using binary operations.**

- [Predkit](#predkit)
  - [Installation](#installation)
  - [Usage](#usage)
    - [Creating predicates](#creating-predicates)
      - [By extending the Predicate class](#by-extending-the-predicate-class)
      - [By speciying a callable](#by-speciying-a-callable)
    - [Using predicates](#using-predicates)
    - [Combining predicates](#combining-predicates)

***

## Installation

Install *predkit* via Composer:

```bash
composer require ali-eltaweel/predkit
```

## Usage

### Creating predicates

#### By extending the Predicate class

```php
use Predkit\Predicate;

class IsEven extends Predicate {

    public function test(mixed $number): bool {

        return $number % 2 === 0;
    }
}

$predicate = new IsEven();
```

#### By speciying a callable

```php
use Predkit\Predicate;

$predicate = Predicate::fromCallable(function (mixed $number): bool {
    
    return $number % 2 === 0;
});
```

***

### Using predicates

```php
$predicate->test(4); // true
$predicate->test(5); // false

$evenNumbers = array_filter([1, 2, 3, 4, 5], $predicate); // [2, 4]
```

***

### Combining predicates

Predicates can be combined using binary operations. The result is a new predicate that represents the combination of the original predicates.

```php
use Predkit\Predicate;

$evenPredicate = Predicate::fromCallable(function (mixed $number): bool {

    return $number % 2 === 0;
});

$greaterThanFivePredicate = Predicate::fromCallable(function (mixed $number): bool {

    return $number > 5;
});

// and
$evenAndGreaterThanFivePredicate = $evenPredicate->and($greaterThanFivePredicate);
array_filter(range(0, 10), $evenAndGreaterThanFivePredicate); // [6, 8, 10]

// or
$evenOrGreaterThanFivePredicate  = $evenPredicate->or($greaterThanFivePredicate);
array_filter(range(0, 10), $evenOrGreaterThanFivePredicate); // [0, 2, 4, 6, 7, 8, 9, 10]

// not
$oddPredicate = $evenPredicate->not();
array_filter(range(0, 10), $oddPredicate); // [1, 3, 5, 7, 9]

// nand
$evenNandGreaterThanFivePredicate = $evenPredicate->nand($greaterThanFivePredicate);
array_filter(range(0, 10), $evenNandGreaterThanFivePredicate); // [0, 1, 2, 3, 4, 5, 7, 9]

// nor
$evenNorGreaterThanFivePredicate = $evenPredicate->nor($greaterThanFivePredicate);
array_filter(range(0, 10), $evenNorGreaterThanFivePredicate); // [1, 3, 5]

// xor
$evenXorGreaterThanFivePredicate = $evenPredicate->xor($greaterThanFivePredicate);
array_filter(range(0, 10), $evenXorGreaterThanFivePredicate); // [ 0, 2, 4, 7, 9 ]

// xnor
$evenXnorGreaterThanFivePredicate = $evenPredicate->xnor($greaterThanFivePredicate);
array_filter(range(0, 10), $evenXnorGreaterThanFivePredicate); // [ 1, 3, 5, 6, 8, 10 ]
```
