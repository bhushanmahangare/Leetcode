<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 14. Longest Common Prefix
 * Easy
 * 
 * Write a function to find the longest common prefix string amongst an array of strings.
 * 
 * If there is no common prefix, return an empty string "".
 * Example 1:
 * Input: ["flower","flow","flight"]
 * Output: "fl"
 * 
 * Example 2:
 * Input: ["dog","racecar","car"]
 * Output: ""
 * Explanation: There is no common prefix among the input strings.
 * 
 * Note:
 * All given inputs are in lowercase letters a-z.
 *  
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        if ($strs == null || count($strs) == 0)
            return "";
        $minLen = 2147483647;
        foreach ($strs as $str) {
            $minLen = min($minLen, strlen($str));
        }
        $low = 1;
        $high = $minLen;
        while ($low <= $high) {
            $middle = intval(($low + $high) / 2);
            if (self::isCommonPrefix($strs, $middle))
                $low = $middle + 1;
            else
                $high = $middle - 1;
        }
        return substr($strs[0], 0, intval(($low + $high) / 2));
    }

    function isCommonPrefix($strs, $len){
        $str1 = substr($strs[0], 0, $len);
        for ($i = 1; $i < count($strs); $i++) {
            if (!self::startsWith($strs[$i], $str1)) {
                return false;
            }
        }
        return true;
    }
    
    function startsWith($haystack, $needle) {
        return strncmp($haystack, $needle, strlen($needle)) === 0;
    }
}
