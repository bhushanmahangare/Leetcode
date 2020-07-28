/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 15. 3 Sum 
 * Medium
 * 
 * Given an array nums of n integers, are there elements a, b, c in nums such that a + b + c = 0? 
 * Find all unique triplets in the array which gives the sum of zero.
 * 
 * Note:
 * The solution set must not contain duplicate triplets.
 * 
 * Example:
 * Given array nums = [-1, 0, 1, 2, -1, -4],
 * A solution set is:
 * [ [-1, 0, 1],
 *   [-1, -1, 2] ]
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {number[]} nums
 * @return {number[][]}
 */

var threeSum = function(nums) {
    nums.sort((a, b) => a - b);
    const result = [];
    const n = nums.length;
  
    for (let A = 0; A < n - 2; A++) {
      if (nums[A] > 0) return result;
      if (nums[A] === nums[A - 1]) continue;
  
      let B = A + 1;
      let C = n - 1;
      while (B < C) {
        const sum = nums[A] + nums[B] + nums[C];
        if (sum < 0) B++;
        else if (sum > 0) C--;
        else {
          result.push([nums[A], nums[B], nums[C]]);
          while (nums[B] === nums[B + 1]) B++;
          while (nums[C] === nums[C - 1]) C--;
          B++;
          C--;
        }
      }
    }
    return result;
  };
  