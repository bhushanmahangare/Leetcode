<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 50. Pow(x,n)
 * 
 * Medium
 * 
 * Implement pow(x, n), which calculates x raised to the power n (i.e. xn).
 * 
 * Example 1:
 * Input: x = 2.00000, n = 10
 * Output: 1024.00000
 * 
 * Example 2:
 * Input: x = 2.10000, n = 3
 * Output: 9.26100
 * 
 * Example 3:
 * Input: x = 2.00000, n = -2
 * Output: 0.25000
 * Explanation: 2-2 = 1/22 = 1/4 = 0.25
 * 
 * Constraints:
 * -100.0 < x < 100.0
 * -231 <= n <= 231-1
 * -104 <= xn <= 104
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/


class Solution {

    /**
     * @param Float $x
     * @param Integer $n
     * @return Float
     */
    function myPow($x, $n) {
        if($x == 1) {
            return $x;
        }
        if($x == -1) {
            return $n % 2 == 0 ? 1 : -1;
        }
        if($n == 0) {
            return 1;
        }
        if($n < 0) {
            $x = 1/$x;
            $n = abs($n);
        }
        return self::helper($x, $n);
    }
    
    function helper($x, $n) {
        if ($x == 0) {
            return 0;
        }
        if ($n == 1) {
            return $x;
        }
        if ($n == 0) {
            return 1;
        }
        
        $output = self::helper($x, $n/2);
        
        if($n % 2 == 0) {
            return $output * $output;
        }else {
            return $output * $output * $x;
        }
    }
}
