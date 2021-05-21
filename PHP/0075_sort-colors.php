<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 75. Sort Colors
 *
 * Medium
 *
 * Given an array nums with n objects colored red, white, or blue, sort them in-place so that
 * objects of the same color are adjacent, with the colors in the order red, white, and blue.
 *
 * We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.
 * You must solve this problem without using the library's sort function.
 *
 * Example 1:
 * Input: nums = [2,0,2,1,1,0]
 * Output: [0,0,1,1,2,2]
 *
 * Example 2:
 * Input: nums = [2,0,1]
 * Output: [0,1,2]
 *
 * Example 3:
 * Input: nums = [0]
 * Output: [0]
 *
 * Example 4:
 * Input: nums = [1]
 * Output: [1]
 *
 * Constraints:
 * n == nums.length
 * 1 <= n <= 300
 * nums[i] is 0, 1, or 2.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return NULL
     */
    public function sortColors(&$nums)
    {
        $red = 0;
        $white;
        $temp = 0;
        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 0) {
                self::swap($nums, $red, $i);
                $red++;
            }
        }
        $white = $red;

        for ($i = 0; $i < count($nums); $i++) {
            if ($nums[$i] == 1) {
                self::swap($nums, $white, $i);
                $white++;
            }
        }
    }
    
    public function swap(&$array, $i, $j)
    {
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;
    }
}
