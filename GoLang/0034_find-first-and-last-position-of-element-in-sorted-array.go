/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 34. Find First and Last Position of Element in Sorted Array
 * Medium
 * 
 * Given an array of integers nums sorted in ascending order, find the starting and ending 
 * position of a given target value.
 * 
 * Your algorithm's runtime complexity must be in the order of O(log n).
 * 
 * If the target is not found in the array, return [-1, -1].
 * 
 * Example 1:
 * Input: nums = [5,7,7,8,8,10], target = 8
 * Output: [3,4]
 * 
 * Example 2:
 * Input: nums = [5,7,7,8,8,10], target = 6
 * Output: [-1,-1]
 * 
 * Constraints:
 * 0 <= nums.length <= 10^5
 * -10^9 <= nums[i] <= 10^9
 * nums is a non decreasing array.
 * -10^9 <= target <= 10^9
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 package problem0034

func searchRange(nums []int, target int) []int {
	
	index := search(nums, target)
	if index == -1 {
		return []int{-1, -1}
	}

	
	first := index
	for {
		f := search(nums[:first], target)
		if f == -1 {
			break
		}
		first = f
	}

	
	last := index
	for {
		l := search(nums[last+1:], target)
		if l == -1 {
			break
		}
		
		last += l + 1
	}

	return []int{first, last}
}

func search(nums []int, target int) int {
	low, high := 0, len(nums)-1
	var median int

	for low <= high {
		median = (low + high) / 2

		switch {
		case nums[median] < target:
			low = median + 1
		case nums[median] > target:
			high = median - 1
		default:
			return median
		}
	}
	return -1
}
