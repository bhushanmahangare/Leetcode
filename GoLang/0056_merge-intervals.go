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

import (
	"sort"
)

type Interval struct {
	Start int
	End   int
}

func merge(its []Interval) []Interval {
	if len(its) <= 1 {
		return its
	}

	sort.Slice(its, func(i int, j int) bool {
		return its[i].Start < its[j].Start
	})

	res := make([]Interval, 0, len(its))

	temp := its[0]
	for i := 1; i < len(its); i++ {
		if its[i].Start <= temp.End {
			temp.End = max(temp.End, its[i].End)
		} else {
			res = append(res, temp)
			temp = its[i]
		}
	}
	res = append(res, temp)

	return res
}

func max(a, b int) int {
	if a > b {
		return a
	}
	return b
}