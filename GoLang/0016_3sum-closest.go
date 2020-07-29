/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 15. 3 Sum Closest
 * Medium
 * 
 * Given an array nums of n integers and an integer target, find three integers in nums such 
 * that the sum is closest to target. Return the sum of the three integers. You may assume 
 * that each input would have exactly one solution.
 * 
 * Example 1:
 * Input: nums = [-1,2,1,-4], target = 1
 * Output: 2
 * 
 * Explanation: The sum that is closest to the target is 2. (-1 + 2 + 1 = 2).
 * 
 *  Constraints:
 * 3 <= nums.length <= 10^3
 * -10^3 <= nums[i] <= 10^3
 * -10^4 <= target  <= 10^4
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package problem0016

import (
	"math"
	"sort"
)

func threeSumClosest(nums []int, target int) int {

	sort.Ints(nums)
	res, delta := 0, math.MaxInt64

	for i := range nums {
		
		if i > 0 && nums[i] == nums[i-1] {
			continue
		}

		l, r := i+1, len(nums)-1

		for l < r {
			s := nums[i] + nums[l] + nums[r]
			switch {
			case s < target:
				l++
				if delta > target-s {
					delta = target - s
					res = s
				}
			case s > target:
				r--
				if delta > s-target {
					delta = s - target
					res = s
				}
			default:
				return s
			}
		}
	}

	return res
}
