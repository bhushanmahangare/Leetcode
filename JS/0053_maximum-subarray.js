/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 53. Maximum Subarray
 * 
 * Esay
 * 
 * Given an integer array nums, find the contiguous subarray (containing at least one number) 
 * which has the largest sum and return its sum.
 * 
 * Follow up: If you have figured out the O(n) solution, try coding another solution using the 
 * divide and conquer approach, which is more subtle.
 * 
 * Example 1:
 * Input: nums = [-2,1,-3,4,-1,2,1,-5,4]
 * Output: 6
 * Explanation: [4,-1,2,1] has the largest sum = 6.
 * 
 * Example 2:
 * Input: nums = [1]
 * Output: 1
 * 
 * Example 3:
 * Input: nums = [0]
 * Output: 0
 * 
 * Example 4:
 * Input: nums = [-1]
 * Output: -1
 * 
 * Example 5:
 * Input: nums = [-2147483647]
 * Output: -2147483647
 * 
 *  Constraints:
 * 1 <= nums.length <= 2 * 104
 * -231 <= nums[i] <= 231 - 1
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/


 /**
 * @param {number[]} nums
 * @return {number}
 */
// 64ms faster than ~95.04% and space 35.7mb less than ~20%
var maxSubArray = function(nums) {
    const len = nums.length;
    let maxSum = -Infinity;
    let currentSum = 0;
  
    if (len < 2) return nums;
  
    for (let i = 0; i < len; i++) {
      currentSum += nums[i];
      maxSum = Math.max(maxSum, currentSum);
      if (currentSum < 0) currentSum = 0;
    }
  
    return maxSum;
  };
  
  
  // Terrible n^2 solution
  var maxSubArray = function(nums) {
    const n = nums.length;
    let max = nums[0];
    if (n === 2) {
      max = Math.max(max, nums[1], max + nums[1]);
      return max;
    }
  
    for (var i = 0; i < n; i++) {
      if (nums[i] > max) max = nums[i];
      let sum = nums[i];
      for (var j = i + 1; j < n; j++) {
        sum += nums[j];
        if (sum > max) max = sum;
      }
    }
    return max;
  };
  
