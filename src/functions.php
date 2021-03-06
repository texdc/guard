<?php
/**
 * functions.php
 *
 * @license   http://creativecommons.org/licenses/by-nc-sa/4.0/ CC BY-NC-SA 4.0
 * @copyright 2017 George D. Cooksey, III
 */

namespace texdc\guard;

/**
 * Start validation on a value, returns {@link AssertionConcern}
 *
 * The invocation of this method starts an assertion concern that is happening on
 * the passed value.
 *
 * The assertion concern can be stateful, that means be careful when you reuse
 * it. You should never pass around the concern.
 *
 * @example \texdc\guard\verify($value)->notEmpty()->integer();
 * @example \texdc\guard\verify($value)->nullOr()->string()->startsWith("Foo");
 *
 * @param mixed  $value
 * @param string $defaultMessage
 * @param string $defaultPropertyPath
 *
 * @return AssertionConcern
 */
function verify($value, ?string $defaultMessage = null, ?string $defaultPropertyPath = null) : AssertionConcern
{
    return new AssertionConcern($value, $defaultMessage, $defaultPropertyPath);
}
