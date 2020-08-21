<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 31. Next Permutation
 * Medium
 * 
 * Implement next permutation, which rearranges numbers into the lexicographically next 
 * greater permutation of numbers.
 * 
 * If such arrangement is not possible, it must rearrange it as the lowest possible order 
 * (ie, sorted in ascending order).
 * 
 * The replacement must be in-place and use only constant extra memory.
 * Here are some examples. Inputs are in the left-hand column and its corresponding outputs 
 * are in the right-hand column.
 * 
 * 1,2,3 → 1,3,2
 * 3,2,1 → 1,2,3
 * 1,1,5 → 1,5,1
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    function nextPermutation(&$nums) {
        if(count($nums) == 0) return;
        for($i = count($nums) - 2; $i >= 0; $i--){
            if($nums[$i] < $nums[$i + 1]){
                $j = $i + 1;
                while($j < count($nums) && $nums[$j] > $nums[$i]) $j++;
                self::swap($nums, $i, $j - 1);
                self::reverse($nums, $i + 1, count($nums) - 1);
                return;
            }
        }
        self::reverse($nums, 0, count($nums) - 1);
    }
    function reverse(&$nums, $i, $j){
        while($i < $j) self::swap($nums, $i++, $j--);
    }
    function swap(&$nums, $a, $b){
        $temp = $nums[$a];
        $nums[$a] = $nums[$b];
        $nums[$b] = $temp;
    }
}
