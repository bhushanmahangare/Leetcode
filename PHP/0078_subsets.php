<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 78. Subsets
 *
 * Medium
 *
 * Given an integer array nums of unique elements, return all possible subsets (the power set).
 *
 * The solution set must not contain duplicate subsets. Return the solution in any order.
 *
 * Example 1:
 * Input: nums = [1,2,3]
 * Output: [[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]
 *
 * Example 2:
 * Input: nums = [0]
 * Output: [[],[0]]
 *
 * Constraints:
 * 1 <= nums.length <= 10
 * -10 <= nums[i] <= 10
 * All the numbers of nums are unique.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer[][]
     */
    public function subsets($nums)
    {
        $count = intval(pow(2, count($nums)));
        $result = [];
        for ($i = 0; $i < $count; $i++) {
            $list = [];
            $temp = $i;
            $index = 0;
            while ($temp != 0) {
                if (($temp & 1) == 1) {
                    array_push($list, $nums[$index]);
                }
                $index++;
                $temp = $temp >> 1;
            }
            array_push($result, $list);
        }
        return $result;
    }
}
