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

 /**
 * @param {number[][]} intervals
 * @return {number[][]}
 */
var merge = function(intervals) {
    if(!intervals || !intervals.length) {
        return intervals;
    }
    
    const outputInterval = [];
    intervals.sort((a,b) => a[0] - b[0]);
    outputInterval.push(intervals[0]);
    for(let index = 1; index < intervals.length; index++) {
        if(intervals[index][0] >= outputInterval[outputInterval.length - 1][0] && intervals[index][0] <= outputInterval[outputInterval.length - 1][1]) {
            outputInterval[outputInterval.length - 1][1] = intervals[index][1] > outputInterval[outputInterval.length - 1][1] ? intervals[index][1] : outputInterval[outputInterval.length - 1][1];
        } else {
            outputInterval.push(intervals[index]);
        }
    };
    return outputInterval;
};