'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 1. Two Sum
 * 
 *  Given an array of integers, return indices of the two numbers such that they add up to a specific target.
 *  You may assume that each input would have exactly one solution, and you may not use the same element twice.
 *
 *  Example:
 *  Given nums = [2, 7, 11, 15], target = 9,
 *  Because nums[0] + nums[1] = 2 + 7 = 9,
 *  return [0, 1].
 *
 * Iteration   target 9 
 *  1st :    i = 0   array count count 6   Outerloop
 *   1st :  j = 1  (i + 1) array count 6   innerloop
 *     if  7 ==  9 - 2     if array(j)  == array(i) 
 *        return array(0 , 1);
 *
 *
 * Iteration  target 20
 *  1st :  i = 0   array count count 6   Outerloop
 *   1st :  j = 1  (i + 1) array count 6   innerloop
 *     if  7 ==  20 - 2  false   if array(j)  == array(i) 
 *   
 *   2nd : j = 2  (i + 1)     
 *
 * Space: O(N)
 * Time: O(N)
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''

class helperFun(object) :

	def twoSum(self, nums, target):
		mapping = {}

		for index, val in enumerate(nums):
			diff = target - val
			if diff in mapping:
				return [index, mapping[diff]]
			else:
				mapping[val] = index
