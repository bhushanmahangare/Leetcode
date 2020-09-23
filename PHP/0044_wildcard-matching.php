<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 44. Wildcard Matching
 * 
 * Given an input string (s) and a pattern (p), implement wildcard pattern matching with 
 * support for '?' and '*'.
 * 
 * '?' Matches any single character.
 * '*' Matches any sequence of characters (including the empty sequence).
 * The matching should cover the entire input string (not partial).
 * 
 * Note:
 * s could be empty and contains only lowercase letters a-z.
 * p could be empty and contains only lowercase letters a-z, and characters like ? or *.
 * 
 * 
 * Example 1:
 * Input:
 * s = "aa"
 * p = "a"
 * Output: false
 * Explanation: "a" does not match the entire string "aa".
 * 
 * Example 2:
 * Input:
 * s = "aa"
 * p = "*"
 * Output: true
 * Explanation: '*' matches any sequence.
 * 
 * Example 3:
 * Input:
 * s = "cb"
 * p = "?a"
 * Output: false
 * Explanation: '?' matches 'c', but the second letter is 'a', which does not match 'b'.
 * 
 * Example 4:
 * Input:
 * s = "adceb"
 * p = "*a*b"
 * Output: true
 * Explanation: The first '*' matches the empty sequence, while the second '*' matches the substring "dce".
 * 
 * Example 5:
 * Input:
 * s = "acdcb"
 * p = "a*c?b"
 * Output: false
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param String $s
     * @param String $p
     * @return Boolean
     */
    function isMatch($s, $p) {
        $dp = array_fill(0, strlen($p) + 1, array_fill(0, strlen($s) + 1, 0));
        $dp[0][0] = 1;
        for ($i = 0; $i < strlen($p); $i++) {
            if ($p[$i] == '?') {
                for ($j = 0; $j < strlen($s); $j++) {
                    if ($dp[$i][$j] == 1)
                        $dp[$i + 1][$j + 1] = 1;
                }
            } else if ($p[$i] == '*') {
                $a = 0;
                for ($j = 0; $j < count($dp[$i]); $j++) {
                    if ($dp[$i][$j] == 1) $a = 1;
                    $dp[$i + 1][$j] = $a;
                }
            } else {
                for ($j = 0; $j < strlen($s); $j++) {
                    if ($dp[$i][$j] == 1 && $p[$i] == $s[$j])
                        $dp[$i + 1][$j + 1] = 1;
                }
            }
        }
        return $dp[strlen($p)][strlen($s)] == 1;
    }
}