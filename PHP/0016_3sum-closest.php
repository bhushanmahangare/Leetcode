<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 15. 3 Sum Closest
 * Medium
 * 
 * Given an array nums of n integers and an integer target, find three integers in nums such 
 * that the sum is closest to target. Return the sum of the three integers. You may assume 
 * that each input would have exactly one solution.
 * 
 * Example 1:
 * Input: nums = [-1,2,1,-4], target = 1
 * Output: 2
 * 
 * Explanation: The sum that is closest to the target is 2. (-1 + 2 + 1 = 2).
 * 
 *  Constraints:
 * 3 <= nums.length <= 10^3
 * -10^3 <= nums[i] <= 10^3
 * -10^4 <= target  <= 10^4
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function threeSumClosest($nums, $target) {
        sort($nums);
        $min = 2147483647;
        $res = 0;
        for($i=2;$i<count($nums);$i++){
            $l=0;$r=$i-1;

            while($l<$r){
                $sum = $nums[$l]+$nums[$r]+$nums[$i];
                if($sum == $target){
                    return $target;
                }
                $diff= abs($target-$sum);
                if($diff<$min){
                    $min = $diff;
                    $res = $sum;
                }
                if($sum<$target){
                    $l++;
                }
                else{
                    $r--;
                }
            }
        }
        return $res;
    }
}