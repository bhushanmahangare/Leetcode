<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 41. First Missing Positive
 * Hard
 * 
 * Given an unsorted integer array, find the smallest missing positive integer.
 * 
 * Example 1:
 * Input: [1,2,0]
 * Output: 3
 * 
 * Example 2:
 * Input: [3,4,-1,1]
 * Output: 2
 * 
 * Example 3:
 * Input: [7,8,9,11,12]
 * Output: 1
 * 
 * Follow up:
 * Your algorithm should run in O(n) time and uses constant extra space.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */

    function firstMissingPositive($nums) {
    
        if(count($nums) == 0) return 1;
    
        for($i =  0;$i < count($nums);$i++) {
    
            while( ( $nums[$i] != $i + 1 ) && $nums[$i] >= 1 && $nums[$i] <= count($nums) && $nums[$nums[$i] - 1] != $nums[$i] ) {
    
                $tmp = $nums[$i] - 1;
    
                $nums[$i] = $nums[$tmp];
    
                $nums[$tmp] = $tmp + 1;                    
            }
        }
    
        for($i = 0;$i < count($nums);$i++) {
    
            if( $nums[$i] != $i + 1 ) return $i + 1;
        }
    
        return count($nums) + 1;
    }
}