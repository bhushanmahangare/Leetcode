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

 func insert(intervals [][]int, newInterval []int) [][]int {
    if len(intervals) == 0 {
        return append([][]int{}, newInterval)
    }
    
    if intervals[0][1] < newInterval[0] {
        return append(append([][]int{},intervals[0]),
                      insert(intervals[1:], newInterval)...)
    }
    
    if intervals[0][1] >= newInterval[0] && intervals[0][1] <= newInterval[1] {
        return append([][]int{},
                      insert(intervals[1:],
                             []int{min(intervals[0][0], newInterval[0]),
                                   newInterval[1]})...)
    }
    
    if intervals[0][1] >= newInterval[1] && intervals[0][0] <= newInterval[1] {
        intervals[0][0] = min(intervals[0][0], newInterval[0])
        return intervals
    }
    
    if intervals[0][0] > newInterval[1] {
        return append(append([][]int{}, newInterval), intervals...)
    }
    
    return nil
    
}

func min(a int, b int) int {
    if a < b {
        return a
    }
    return b
}

