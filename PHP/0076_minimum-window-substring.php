<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 76. Minimum Window Substring
 *
 * Hard
 *
 * Given two strings s and t of lengths m and n respectively, return the minimum window in s
 * which will contain all the characters in t. If there is no such window in s that covers
 * all characters in t, return the empty string "".
 *
 * Note that If there is such a window, it is guaranteed that there will always be only
 * one unique minimum window in s.
 *
 * Example 1:
 * Input: s = "ADOBECODEBANC", t = "ABC"
 * Output: "BANC"
 *
 * Example 2:
 * Input: s = "a", t = "a"
 * Output: "a"
 *
 * Constraints:
 * m == s.length
 * n == t.length
 * 1 <= m, n <= 105
 * s and t consist of English letters.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param String $s
     * @param String $t
     * @return String
     */
    public function minWindow($s, $t)
    {
        $alphabetSize = 256;
        $T = strlen($t); //The number of characters in t
        $S = strlen($s);
        
        if ($S < $T) {
            return "";
        }
        $tCount = array_fill(0, $alphabetSize, 0);
        //Create  frequency table for the string t
        foreach (str_split($t) as $c) {
            $tCount[ord($c)]++;
        }
        
       
        $left = 0;
        $right = 0;
        
        $N = strlen($s);
        $min = 2147483647;
        $res = [-1, -1];
        
        while ($right < $N) {
            while ($right < $N && $T > 0) {
                if (--$tCount[ord($s[$right++])] >= 0) {
                    $T--;
                }
            }
            //At this point we are either at the end or we have a substring in S that covers all of T.
            while ($left < $right && $T == 0) {
                if ($right-$left < $min) {
                    $min = $right - $left;
                    $res = [$left, $right];
                }
                if (++$tCount[ord($s[$left++])] > 0) {
                    $T++;
                }
            }
        }
        
        return $min == 2147483647 ? "" : substr($s, $res[0], $res[1] - $res[0]);
    }
}
