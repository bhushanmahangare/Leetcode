<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 84. Largest Rectangle in Histogram
 *
 * Hard
 *
 * Given an array of integers heights representing the histogram's bar height where the width of
 * each bar is 1, return the area of the largest rectangle in the histogram.
 *
 * Example 1:
 * Input: heights = [2,1,5,6,2,3]
 *
 * Output: 10
 * Explanation: The above is a histogram where width of each bar is 1.
 * The largest rectangle is shown in the red area, which has an area = 10 units.
 *
 * Example 2:
 * Input: heights = [2,4]
 * Output: 4
 *
 * Constraints:
 * 1 <= heights.length <= 105
 * 0 <= heights[i] <= 104
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    public function largestRectangleArea($heights)
    {
        $max = 0;
        $i = 0;
        $stack = [];
        while ($i < count($heights) || count($stack) != 0) {
            if ($i < count($heights) && (count($stack) == 0  || $heights[$i] >= $heights[end($stack)])) {
                array_push($stack, $i++);
            } else {
                $max = max($max, $heights[array_pop($stack)] * (count($stack) == 0 ? $i : $i - end($stack) - 1));
            }
        }
        return $max;
    }
}
