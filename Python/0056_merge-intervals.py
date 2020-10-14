"""=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""
 
 class Solution:
    def merge(self, intervals: List[List[int]]) -> List[List[int]]:

        # sort
        intervals.sort(key=lambda item: item[0])

        i = 0
        # no neeed to check the last array
        while (i + 1) < len(intervals):

            curr_a = intervals[i]
            next_a = intervals[i+1]

            # check for overlap
            if curr_a[1] >= next_a[0]:

                # merge
                # we use max coz of such a case: [[1,4],[2,3]]
                # make the last element of the first array be the furthest(largest value)
                intervals[i][1] = max(curr_a[1], next_a[1])

                # delete the second array
                intervals.pop(i+1)

            else:
                i += 1

        return intervals
