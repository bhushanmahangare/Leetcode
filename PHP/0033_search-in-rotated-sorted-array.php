<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 33. Search in Rotated Sorted Array
 * Medium
 * 
 * Given an integer array nums sorted in ascending order, and an integer target.
 * Suppose that nums is rotated at some pivot unknown to you beforehand (i.e., [0,1,2,4,5,6,7] 
 * might become [4,5,6,7,0,1,2]).
 * 
 * You should search for target in nums and if you found return its index, otherwise return -1.
 * 
 * Example 1:
 * Input: nums = [4,5,6,7,0,1,2], 
 * target = 0
 * Output: 4
 * 
 * Example 2:
 * Input: nums = [4,5,6,7,0,1,2], 
 * target = 3
 * Output: -1
 * 
 * Example 3:
 * Input: nums = [1], 
 * target = 0
 * Output: -1
 * 
 * Constraints:
 * 1 <= nums.length <= 5000
 * -10^4 <= nums[i] <= 10^4
 * All values of nums are unique.
 * nums is guranteed to be rotated at some pivot.
 * -10^4 <= target <= 10^4
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function search($nums, $target) {
        $low = 0; $high = count($nums) - 1;
        while ($low <= $high) {
            $m = intval(($low + $high) / 2);
            if ($nums[$m] == $target) {
                return $m;
            }
            if ($nums[$low] <= $nums[$m]) {
                if ($target >= $nums[$low] && $target <= $nums[$m]) {
                    $high = $m - 1;
                } else {
                    $low = $m + 1;
                }
            } else {
                if ($target >= $nums[$m] && $target <= $nums[$high]) {
                    $low = $m + 1;
                } else {
                    $high = $m - 1;
                }
            }
        }
        return -1;
    }
}
