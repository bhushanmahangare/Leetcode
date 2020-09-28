"""=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 47. Permutations II
 * 
 * Medium
 * 
 * Given a collection of numbers that might contain duplicates, return all possible unique permutations.
 * 
 * Example:
 * Input: [1,1,2]
 * Output:
 * [
 *  [1,1,2],
 *  [1,2,1],
 *  [2,1,1]
 * ]
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""

 class Solution:
    def permuteUnique(self, nums: List[int]) -> List[List[int]]:
        result = [] 
        def dfs(space, path):
            if not space:
                result.append(tuple(path))
        
            for i in range(len(space)):
                dfs(space[:i]+space[i+1:], path+[space[i]])    
        dfs(nums, [])
        ans = set(result)
        
        return ans