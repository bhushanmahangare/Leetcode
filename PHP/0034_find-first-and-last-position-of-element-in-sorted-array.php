<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 34. Find First and Last Position of Element in Sorted Array
 * Medium
 * 
 * Given an array of integers nums sorted in ascending order, find the starting and ending 
 * position of a given target value.
 * 
 * Your algorithm's runtime complexity must be in the order of O(log n).
 * 
 * If the target is not found in the array, return [-1, -1].
 * 
 * Example 1:
 * Input: nums = [5,7,7,8,8,10], target = 8
 * Output: [3,4]
 * 
 * Example 2:
 * Input: nums = [5,7,7,8,8,10], target = 6
 * Output: [-1,-1]
 * 
 * Constraints:
 * 0 <= nums.length <= 10^5
 * -10^9 <= nums[i] <= 10^9
 * nums is a non decreasing array.
 * -10^9 <= target <= 10^9
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function searchRange($nums, $target) {
        $n = count($nums);
        $res = array_fill(0, 2, 0);
        $beg = 0;
        $end = $n-1;
        while ($beg <= $end) {
            $mid = $beg + intval(($end-$beg)/2);
            if ($nums[$mid] < $target) {
                $beg = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }
        $res[0] = ($beg >= $n || $nums[$beg] != $target) ? -1 : $beg;
        
        $beg = 0;
        $end = $n-1;
        while ($beg <= $end) {
            $mid = $beg + intval(($end-$beg)/2);
            if ($nums[$mid] <= $target) {
                $beg = $mid + 1;
            } else {
                $end = $mid - 1;
            }
        }
        $res[1] = ($end < 0 || $nums[$end] != $target) ? -1 : $end;
        return $res;
    }
}
