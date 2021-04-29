<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 67. Add Binary
 *
 * Easy
 *
 * Given two binary strings a and b, return their sum as a binary string.
 *
 * Example 1:
 * Input: a = "11", b = "1"
 * Output: "100"
 *
 * Example 2:
 * Input: a = "1010", b = "1011"
 * Output: "10101"
 *
 * Constraints:
 * 1 <= a.length, b.length <= 104
 * a and b consist only of '0' or '1' characters.
 * Each string does not contain leading zeros except for the zero itself.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param String $a
     * @param String $b
     * @return String
     */
    public function addBinary($a, $b)
    {
        $sb = "";
        $i = strlen($a) - 1;
        $j = strlen($b) - 1;
        $carry = 0;
        
        while ($i >= 0 || $j >= 0 || $carry > 0) {
            $sum = $carry;
            if ($i >= 0) {
                $sum += ord($a[$i--]) - ord('0');
            }
            if ($j >= 0) {
                $sum += ord($b[$j--]) - ord('0');
            }
            $sb .= chr($sum % 2 + ord('0'));
            $carry = intval($sum / 2);
        }
        return strrev($sb);
    }
}
