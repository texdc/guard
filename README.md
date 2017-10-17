# guard

An extension for [beberlei/assert](https://github.com/beberlei/assert) that adds some
extra assertions and a factory function to simplify usage.

## installation
```sh
composer require texdc/guard
```

## usage
```php
namespace my\lib;

use function texdc\guard\verify;

function storeRating(int $rating) : void {
    verify($rating)->numericRange(1, 10, 'rating should be from 1 - 10');
    // ...
}

function speak(string $message, ?int $times = null) : void {
    verify($message)->notEmpty('message is required')->length(256, 'message is too long');
    verify($times, 'invalid multiplier')->nullOr()->isModulus(8);
    // ...
}
```
