'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''
 
 class Solution(object):
    def threeSumClosest(self, nums, target):
        """
        :type nums: List[int]
        :type target: int
        :rtype: int
        """
        
        nums.sort()
        result, min_diff = 0, float('inf')

        for index in range(len(nums)-1):
        	left = index + 1
        	right = len(nums) - 1

        	while left < right:
        		currSum = nums[index] + nums[left] + nums[right]
        		diff = abs(target - currSum)

        		if diff == 0:
        			return target
        		if diff < min_diff:
        			min_diff = diff
        			result = currSum

        		if currSum < target:
        			left += 1
        		else:
        			right -= 1
        return result


# Space: O(1)
# Time: O(N^2)