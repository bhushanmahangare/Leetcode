<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 58. Length of Last Word
 * 
 * Easy
 * 
 * Given a string s consists of upper/lower-case alphabets and empty space characters ' ', 
 * return the length of last word (last word means the last appearing word if we loop from 
 * left to right) in the string.
 * If the last word does not exist, return 0.
 * 
 * Note: A word is defined as a maximal substring consisting of non-space characters only.
 * 
 * Example:
 * Input: "Hello World"
 * Output: 5
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {

        $length = 0;
		$first = false;
		
        for ($i = strlen($s) - 1; $i >= 0; $i--) {

            if ($s[$i] == ' ' && $first) {

				return $length;
				
            } else if ($s[$i] != ' ') {

				$first = true;
				
				$length++;
				
            }
		}
		
        return $length;
    }
}
