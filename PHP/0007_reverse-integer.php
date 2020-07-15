<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 7. Reverse Integer
 * Easy
 * Given a 32-bit signed integer, reverse digits of an integer.
 * 
 * Example 1:
 * Input: 123
 * Output: 321
 * 
 * Example 2:
 * Input: -123
 * Output: -321
 * 
 * Example 3:
 * Input: 120
 * Output: 21
 * 
 * Note:
 * Assume we are dealing with an environment which could only store integers within the 32-bit 
 * signed integer range: [−231,  231 − 1]. For the purpose of this problem, 
 * assume that your function returns 0 when the reversed integer overflows.
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $rev = 0; 
        while ($x != 0) {
            $rev = ($rev * 10) + ($x % 10);
            $x = intval($x / 10);
        }
        if (intval($rev) > 2147483647  || intval($rev) < -2147483647 ) return 0;
        return intval($rev);
    }
}

$ob = new Solution;
echo $ob->reverse(120);