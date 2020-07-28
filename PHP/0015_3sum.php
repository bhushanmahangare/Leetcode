<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 15. 3 Sum 
 * Medium
 * 
 * Given an array nums of n integers, are there elements a, b, c in nums such that a + b + c = 0? 
 * Find all unique triplets in the array which gives the sum of zero.
 * 
 * Note:
 * The solution set must not contain duplicate triplets.
 * 
 * Example:
 * Given array nums = [-1, 0, 1, 2, -1, -4],
 * A solution set is:
 * [ [-1, 0, 1],
 *   [-1, -1, 2] ]
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    function threeSum($nums) {
        $res = [];
        sort($nums);
        $i = 0; $j = 0; $n = count($nums); $k = $n - 1;
        if ($k < 2 || $nums[$k] < 0) {
            return $res;
        }
        while ($i < $n - 2) {
            if ($nums[$i] > 0) {
                break;
            }
            $target = -$nums[$i];
            $j = $i + 1;
            $k = $n - 1;
            while ($j < $k) {
                if ($nums[$k] < 0) {
                    break;
                }
                if ($nums[$j] + $nums[$k] == $target) {
                    $res[] = [$nums[$i], $nums[$j], $nums[$k]];
                    while($j < $k && $nums[$j] == $nums[++$j]);
                    while($j < $k && $nums[$k] == $nums[--$k]);
                } else if ($nums[$j] + $nums[$k] > $target) {
                    $k--;
                } else {
                    $j++;
                }
            }
            while ($i < $n - 2 && $nums[$i] == $nums[++$i]);
        }
        return $res;
    }
}
