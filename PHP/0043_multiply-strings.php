<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 43. Multiply Strings
 * 
 * Given two non-negative integers num1 and num2 represented as strings, return the product of 
 * num1 and num2, also represented as a string.
 * 
 * Example 1:
 * Input: num1 = "2", num2 = "3"
 * Output: "6"
 * 
 * Example 2:
 * Input: num1 = "123", num2 = "456"
 * Output: "56088"
 * 
 * Note:
 * The length of both num1 and num2 is < 110.
 * Both num1 and num2 contain only digits 0-9.
 * Both num1 and num2 do not contain any leading zero, except the number 0 itself.
 * You must not use any built-in BigInteger library or convert the inputs to integer directly.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/


class Solution {

    /**
     * @param String $num1
     * @param String $num2
     * @return String
     */

    function multiply($num1, $num2) {

        if ($num1 == "0" || $num2 == "0") return "0";

        $res = array_fill(0, strlen($num1) + strlen($num2), 0);
        $a = 0;

        for ($i = strlen($num2) - 1; $i >= 0; $i--) {

            $b = 0;

            for ($j = strlen($num1) - 1; $j >= 0; $j--) {

                $prod = (ord($num1[$j]) - ord('0')) * (ord($num2[$i]) - ord('0'));
                $prod += $res[$a+$b];
                $carry = intval($prod/10);
                $digit = $prod%10;
                $res[$a+$b] = $digit;
                $res[$a+$b+1] += $carry;
                $b++;

            }
            $a++;
        }
        
        $sb = "";
        for ($i = count($res) - 1; $i >= 0; $i--) {

            if ($i == count($res) -1 && $res[count($res) - 1] == 0) continue;
            $sb .= chr($res[$i] + ord('0'));

        }

        return $sb;

    }
}
