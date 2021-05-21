/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 75. Sort Colors
 *
 * Medium
 *
 * Given an array nums with n objects colored red, white, or blue, sort them in-place so that
 * objects of the same color are adjacent, with the colors in the order red, white, and blue.
 *
 * We will use the integers 0, 1, and 2 to represent the color red, white, and blue, respectively.
 * You must solve this problem without using the library's sort function.
 *
 * Example 1:
 * Input: nums = [2,0,2,1,1,0]
 * Output: [0,0,1,1,2,2]
 *
 * Example 2:
 * Input: nums = [2,0,1]
 * Output: [0,1,2]
 *
 * Example 3:
 * Input: nums = [0]
 * Output: [0]
 *
 * Example 4:
 * Input: nums = [1]
 * Output: [1]
 *
 * Constraints:
 * n == nums.length
 * 1 <= n <= 300
 * nums[i] is 0, 1, or 2.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 
 func sortColors(a []int) {
	 i, j, k := 0, 0, len(a)-1
 
	 for j <= k {
		 switch a[j] {
		 case 0:
			 a[i], a[j] = a[j], a[i]
			 i++
			 j++
		 case 1:
			 j++
		 case 2:
			 a[j], a[k] = a[k], a[j]
			 k--
		 }
	 }
 
 }
 