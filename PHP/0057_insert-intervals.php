<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 57. Insert Intervals
 * 
 * Medium
 * 
 * Given a set of non-overlapping intervals, insert a new interval into the intervals (merge if necessary).
 * 
 * You may assume that the intervals were initially sorted according to their start times.
 * 
 * Example 1:
 * Input: intervals = [[1,3],[6,9]], newInterval = [2,5]
 * Output: [[1,5],[6,9]]
 * 
 * Example 2:
 * Input: intervals = [[1,2],[3,5],[6,7],[8,10],[12,16]], newInterval = [4,8]
 * Output: [[1,2],[3,10],[12,16]]
 * Explanation: Because the new interval [4,8] overlaps with [3,5],[6,7],[8,10].
 * 
 * Example 3:
 * Input: intervals = [], newInterval = [5,7]
 * Output: [[5,7]]
 * 
 * Example 4:
 * Input: intervals = [[1,5]], newInterval = [2,3]
 * Output: [[1,5]]
 * 
 * Example 5:
 * Input: intervals = [[1,5]], newInterval = [2,7]
 * Output: [[1,7]]
 * 
 * Constraints:
 * 0 <= intervals.length <= 104
 * intervals[i].length == 2
 * 0 <= intervals[i][0] <= intervals[i][1] <= 105
 * intervals is sorted by intervals[i][0] in ascending order.
 * newInterval.length == 2
 * 0 <= newInterval[0] <= newInterval[1] <= 105
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

function insert($intervals, $newInterval) {
	$n1 = $newInterval[0];
	$n2 = $newInterval[1];
	$len = count($intervals);
	$start = false;
	$end = false;
	for($i=0; $i<$len; $i++) {
		$i1=$intervals[$i][0];
		$i2=$intervals[$i][1];
		if ($start===false) {
			if ($n2 <= $i2) {
				if ($n2<$i1) {
					array_splice($intervals,$i,0, [$newInterval]);
					return $intervals;
				} elseif ($i1<=$n1) {
					return $intervals;
				} else {
					$intervals[$i][0] = $n1;
					return $intervals;
				}
			} elseif ($n1<$i1) {
				$start = $i;
			} elseif ($i1<=$n1 && $n1<=$i2) {
				$n1 = $i1;
				$start = $i;
			}
		} else {
			if ($n2<=$i2) {
				if ($n2<$i1) {
					$end = $i - 1;
					break;
				} else {
					$n2 = $i2;
					$end = $i;
					break;
				}
			}
		}
	}
	if ($start===false) {
		$intervals[] = $newInterval;
		return $intervals;
	} elseif ($end===false) {
		$end = $len - 1;
	}
	array_splice($intervals , $start, $end-$start+1, [[$n1, $n2]]);
	return $intervals;
}