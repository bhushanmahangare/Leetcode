<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 65. Valid Number
 *
 * Hard
 *
 * A valid number can be split up into these components (in order):
 *      1.  A decimal number or an integer.
 *      2.  (Optional) An 'e' or 'E', followed by an integer.
 *
 * A decimal number can be split up into these components (in order):
 *      1. (Optional) A sign character (either '+' or '-').
 *      2.  One of the following formats:
 *          1.  At least one digit, followed by a dot '.'.
 *          2.  At least one digit, followed by a dot '.', followed by at least one digit.
 *          3.  A dot '.', followed by at least one digit.
 *
 * An integer can be split up into these components (in order):
 *      1.  (Optional) A sign character (either '+' or '-').
 *      2.  At least one digit.
 *
 * For example, all the following are valid numbers:
 * ["2", "0089", "-0.1", "+3.14", "4.", "-.9", "2e10", "-90E3", "3e+7", "+6e-1", "53.5e93", "-123.456e789"],
 *
 * while the following are not valid numbers:
 * ["abc", "1a", "1e", "e3", "99e2.5", "--6", "-+3", "95a54e53"].
 *
 * Given a string s, return true if s is a valid number.
 *
 * Example 1:
 * Input: s = "0"
 * Output: true
 *
 * Example 2:
 * Input: s = "e"
 * Output: false
 *
 * Example 3:
 * Input: s = "."
 * Output: false
 *
 * Example 4:
 * Input: s = ".1"
 * Output: true
 *
 * Constraints:
 * 1 <= s.length <= 20
 * s consists of only English letters (both uppercase and lowercase), digits (0-9), plus '+', minus '-', or dot '.'.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param String $s
     * @return Boolean
     */
    public function isNumber($s)
    {
        $isE = false;
        $isPoint = false;
        $lastChar = -1;
        $llastChar = -1;
        if (strlen($s)==1 && !(ord($s[0])>=48 && ord($s[0])<=57)) {
            return false;
        }
        $s=trim($s);
        for ($i=0;$i<strlen($s);$i++) {
            $t = ord($s[$i]);
            if ($i==0 && $t==101) {
                return false;
            }
            if (!(($t>=48 && $t<=57) || $t==101 || $t== 43 || $t==45 || $t==46)) {
                return false;
            }
            if ($t == 101) {
                if ($isE) {
                    return false;
                }
                if ($i == strlen($s)-1) {
                    return false;
                }
                if ($lastChar==43 || $lastChar==45 || $lastChar==46) {
                    if ($llastChar == -1) {
                        return false;
                    }
                }
                $isE = true;
            }
            if ($t == 46) {
                if ($isE) {
                    return false;
                }
                if ($i == strlen($s)-1 && !($lastChar>=48 && $lastChar<=57)) {
                    return false;
                }
                if ($isPoint) {
                    return false;
                }
                $isPoint  = true;
            }
            if (($t==43 || $t==45)&& $i!=0 && ($lastChar!=101 ||($lastChar==101 && $i == strlen($s)-1))) {
                return false;
            }
            $llastChar = $lastChar;
            $lastChar = $t;
        }
        return true;
    }
}
