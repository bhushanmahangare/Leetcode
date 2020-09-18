/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 41. First Missing Positive
 * Hard
 * 
 * Given an unsorted integer array, find the smallest missing positive integer.
 * 
 * Example 1:
 * Input: [1,2,0]
 * Output: 3
 * 
 * Example 2:
 * Input: [3,4,-1,1]
 * Output: 2
 * 
 * Example 3:
 * Input: [7,8,9,11,12]
 * Output: 1
 * 
 * Follow up:
 * Your algorithm should run in O(n) time and uses constant extra space.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 func firstMissingPositive(nums []int) int {

	for i := 0; i < len(nums); i++ {


		for 0 <= nums[i]-1 && nums[i]-1 < len(nums) && nums[i] != nums[nums[i]-1] {

			nums[i], nums[nums[i]-1] = nums[nums[i]-1], nums[i]

		}
	}

	for k := range nums {

		if nums[k] != k+1 {
			return k + 1
		}
	}
	return len(nums) + 1
}
