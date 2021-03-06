<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 29. Divide Two Integers
 * Medium
 * 
 * Given two integers dividend and divisor, divide two integers without using multiplication, 
 * division and mod operator.
 * 
 * Return the quotient after dividing dividend by divisor.
 * 
 * The integer division should truncate toward zero, which means losing its fractional part. 
 * For example, truncate(8.345) = 8 and truncate(-2.7335) = -2.
 * 
 * Example 1:
 * Input: dividend = 10, divisor = 3
 * Output: 3
 * Explanation: 10/3 = truncate(3.33333..) = 3.
 * 
 * Example 2:
 * Input: dividend = 7, divisor = -3
 * Output: -2
 * Explanation: 7/-3 = truncate(-2.33333..) = -2.
 * Note:
 * Both dividend and divisor will be 32-bit signed integers.
 * The divisor will never be 0.
 * Assume we are dealing with an environment which could only store integers within the 32-bit 
 * signed integer range: [−231,  231 − 1]. For the purpose of this problem, assume that your 
 * function returns 231 − 1 when the division result overflows.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer $dividend
     * @param Integer $divisor
     * @return Integer
     */
    function divide($dividend, $divisor) {
        if ($dividend == -2147483648 && $divisor == -1) return 2147483647;
        if (abs($divisor) == 1) {
            if ($divisor > 0) return $dividend;
            else return -$dividend;
        }
        $l1 = abs($dividend); $l2 = abs($divisor);
        $sol = 0;
        while($l1 >= $l2){
            $x = $l2; $y = 1;
            while($l1 >= $x){
                $l1-=$x;
                $sol+=$y;
                $y+=$y;
                $x+=$x;
            }
        }
        if ($dividend > 0 && $divisor < 0 || $dividend<0 && $divisor>0) $sol = -$sol;
        return $sol;
    }
}
