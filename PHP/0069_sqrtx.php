<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 69. Sqrt(x)
 *
 * Easy
 *
 * Given a non-negative integer x, compute and return the square root of x.
 *
 * Since the return type is an integer, the decimal digits are truncated, and only the integer
 * part of the result is returned.
 *
 * Example 1:
 * Input: x = 4
 * Output: 2
 *
 * Example 2:
 * Input: x = 8
 * Output: 2
 *
 *
 * Explanation: The square root of 8 is 2.82842..., and since the decimal part is truncated,
 * 2 is returned.
 *
 * Constraints:
 * 0 <= x <= 231 - 1
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer $x
     * @return Integer
     */
    public function mySqrt($x)
    {
        if ($x <= 1) {
            return $x;
        }
        return self::binarySearch(1, intval($x / 2) + 1, $x);
    }

    public function binarySearch($l, $r, $val)
    {
        while ($l < $r) {
            $m = intval(($r - $l) / 2) + $l;
            $v = $m * $m;
            if ($v == $val) {
                return $m;
            } elseif ($v > $val) {
                $r = $m;
            } else {
                $l = $m + 1;
            }
        }
        return $l - 1;
    }
}
