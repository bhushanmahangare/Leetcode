"""=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 60. Permutation Sequence
 * 
 * Hard 
 * 
 * The set [1,2,3,...,n] contains a total of n! unique permutations.
 *  
 * By listing and labeling all of the permutations in order, we get the following sequence for n = 3:
 * "123"
 * "132"
 * "213"
 * "231"
 * "312"
 * "321"
 * 
 * Given n and k, return the kth permutation sequence.
 * 
 * Note:
 * Given n will be between 1 and 9 inclusive.
 * Given k will be between 1 and n! inclusive.
 * 
 * Example 1:
 * Input: n = 3, k = 3
 * Output: "213"
 * 
 * Example 2:
 * Input: n = 4, k = 9
 * Output: "2314"
 * 
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""
 
 class Solution(object):
    def getPermutation(self, n, k):
        """
        :type n: int
        :type k: int
        :rtype: str
        """
        
        nums = []
        for index in range(1, n+1):
        	nums.append(index)

        def permute(nums):
        	if len(nums) == 0:
        		return []
        	if len(nums) == 1:
        		return [nums]

        	result = []
        	for index in range(len(nums)):
        		for p in permute(nums[0:index] + nums[index+1:]):
        			result.append([nums[index]] + p)

        	return result

        value = permute(nums)[k-1]
        result = ""
        for val in value:
        	result += str(val)
        return result