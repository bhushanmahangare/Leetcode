<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 28. Implement strStr()
 * Easy
 * 
 * Implement strStr().
 * Return the index of the first occurrence of needle in haystack, or -1 if needle is 
 * not part of haystack.
 * 
 * Example 1:
 * Input: haystack = "hello", needle = "ll"
 * Output: 2
 * 
 * Example 2:
 * Input: haystack = "aaaaa", needle = "bba"
 * Output: -1
 * 
 * Clarification:
 * What should we return when needle is an empty string? This is a great question
 * to ask during an interview.
 * 
 * For the purpose of this problem, we will return 0 when needle is an empty string. 
 * This is consistent to C's strstr() and Java's indexOf().
 * 
 * Constraints:
 * haystack and needle consist only of lowercase English characters.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        if(strlen($needle) == 0) return 0;
        if(strlen($haystack) == 0) return -1;
        if(strlen($haystack) == 1 && strlen($needle) == 1){
            if($haystack[0] == $needle[0]){
                return 0;
            }
        }
        
        for($i = 0; $i < strlen($haystack) - strlen($needle) + 1; $i++){
            if($needle === substr($haystack, $i, strlen($needle))){
                return $i;
            }
        }
        return -1; 
    }
}
