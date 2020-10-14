<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 56. Merge Intervals
 * 
 * Medium
 * 
 * Given a collection of intervals, merge all overlapping intervals.
 * 
 * Example 1:
 * Input: intervals = [[1,3],[2,6],[8,10],[15,18]]
 * Output: [[1,6],[8,10],[15,18]]
 * Explanation: Since intervals [1,3] and [2,6] overlaps, merge them into [1,6].
 * 
 * Example 2:
 * Input: intervals = [[1,4],[4,5]]
 * Output: [[1,5]]
 * Explanation: Intervals [1,4] and [4,5] are considered overlapping.
 * 
 * NOTE: input types have been changed on April 15, 2019. Please reset to default code 
 * definition to get new method signature.
 * 
 * Constraints:
 * intervals[i][0] <= intervals[i][1]
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[][] $intervals
     * @return Integer[][]
     */
    function merge($intervals) {
        if (empty($intervals)) {
            return $intervals;
        }
        
        sort($intervals);
        
        $result = array($intervals[0]);
        
        for($i = 1; $i < sizeof($intervals); $i++) {
            $length = sizeof($result);
            $end = $result[$length - 1][sizeof($result[$length - 1]) - 1];
            
            $start = $intervals[$i][0];
            $currentEnd = $intervals[$i][sizeof($intervals[$i]) - 1];
            
            if ($end >= $start && $currentEnd > $end) {
                $currentEnd = $intervals[$i][sizeof($intervals[$i]) - 1];
                $result[$length - 1][sizeof($result[$length - 1]) - 1] = $currentEnd;
            } elseif ($end < $start) {
                $result[] = $intervals[$i];
            }
        }
        
        return $result;
    }
}