<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 3. Longest Substring Without Repeating Characters
 * Medium
 * 
 * Given a string, find the length of the longest substring without repeating characters.
 * 
 * Example 1:
 * Input: "abcabcbb"
 * Output: 3 
 * Explanation: The answer is "abc", with the length of 3. 
 * 
 * Example 2:
 * Input: "bbbbb"
 * Output: 1
 * Explanation: The answer is "b", with the length of 1.
 * 
 * Example 3:
 * Input: "pwwkew"
 * Output: 3
 * Explanation: The answer is "wke", with the length of 3. 
 * Note that the answer must be a substring, "pwke" is a subsequence and not a substring.
 * 
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {

        if (strlen($s) == 0 ) return 0;

        $map = [];
        $max = 0;

        for ( $i=0, $j=0; $i < strlen($s); ++$i ) {

            if ( array_key_exists($s[$i], $map )){
                $j = max( $j, $map[$s[$i]] + 1 );
            }
            $map[$s[$i]] = $i;

            $max = max($max, $i - $j + 1);

        }

        return $max;

    }
}

$ob = new Solution;
echo $ob->lengthOfLongestSubstring("abcabcbb");