/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 18. 4 Sum
 * Medium
 * 
 * Given an array nums of n integers and an integer target, are there elements a, b, c, and d 
 * in nums such that a + b + c + d = target? Find all unique quadruplets in the array which gives 
 * the sum of target.
 * 
 * Note:
 * The solution set must not contain duplicate quadruplets.
 * 
 * Example:
 * Given array nums = [1, 0, -1, 0, -2, 2], and target = 0.
 * 
 * A solution set is:
 * [
 *   [-1,  0, 0, 1],
 *   [-2, -1, 1, 2],
 *   [-2,  0, 0, 2]
 * ]
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package problem0018

 import (
	 "sort"
 )
 
 func fourSum(nums []int, target int) [][]int {
	 res := [][]int{}
	 sort.Ints(nums)
 
	 for i := 0; i < len(nums)-3; i++ {
		 
		 if i > 0 && nums[i] == nums[i-1] {
			 continue
		 }
 
		 for j := i + 1; j < len(nums)-2; j++ {
		
			 if j > i+1 && nums[j] == nums[j-1] {
				 continue
			 }
 
			 l, r := j+1, len(nums)-1
			 for l < r {
				 s := nums[i] + nums[j] + nums[l] + nums[r]
				 switch {
				 case s < target:
					 l++
				 case s > target:
					 r--
				 default:
					 res = append(res, []int{nums[i], nums[j], nums[l], nums[r]})
					 l, r = next(nums, l, r)
				 }
			 }
		 }
 
	 }
	 return res
 }
 
 func next(nums []int, l, r int) (int, int) {
	 for l < r {
		 switch {
		 case nums[l] == nums[l+1]:
			 l++
		 case nums[r] == nums[r-1]:
			 r--
		 default:
			 l++
			 r--
			 return l, r
		 }
	 }
 
	 return l, r
 }
 