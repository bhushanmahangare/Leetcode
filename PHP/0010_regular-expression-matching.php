<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 10. Regular Expression Matching
 * Hard
 * 
 * 
 * Given an input string (s) and a pattern (p), implement regular expression matching with 
 * support for '.' and '*'.
 * 
 * '.' Matches any single character.
 * '*' Matches zero or more of the preceding element.
 * 
 * The matching should cover the entire input string (not partial).
 * 
 * Note:
 * s could be empty and contains only lowercase letters a-z.
 * p could be empty and contains only lowercase letters a-z, and characters like . or *.
 * 
 * Example 1:
 * 
 * Input:
 * s = "aa"
 * p = "a"
 * 
 * Output: false
 * Explanation: "a" does not match the entire string "aa".
 * 
 * Example 2:
 * 
 * Input:
 * s = "aa"
 * p = "a*"
 * 
 * Output: true
 * Explanation: '*' means zero or more of the preceding element, 'a'. Therefore, by 
 * repeating 'a' once, it becomes "aa".
 * 
 * Example 3:
 * 
 * Input:
 * s = "ab"
 * p = ".*"
 * Output: true
 * Explanation: ".*" means "zero or more (*) of any character (.)".
 * 
 * 
 * Example 4:
 * 
 * Input:
 * s = "aab"
 * p = "c*a*b"
 * Output: true
 * Explanation: c can be repeated 0 times, a can be repeated 1 time. Therefore, it matches "aab".
 * 
 * Example 5:
 * Input:
 * s = "mississippi"
 * p = "mis*is*p*."
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

        $dp = array_fill(0, strlen($s) + 1, array_fill(0, strlen($p) + 1, false));
        
        $dp[strlen($s)][strlen($p)] = true;

        for ($i = strlen($s); $i >= 0; $i--){
        
            for ($j = strlen($p) - 1; $j >= 0; $j--){
                
                $first_match = ($i < strlen($s) && ($p[$j] == $s[$i] || $p[$j] == '.'));
                
                if ($j + 1 < strlen($p) && $p[$j+1] == '*'){
                
                    $dp[$i][$j] = $dp[$i][$j+2] || $first_match && $dp[$i+1][$j];
                
                } else {
                
                    $dp[$i][$j] = $first_match && $dp[$i+1][$j+1];
                
                }
            }
        }
        
        return $dp[0][0];

    }
}