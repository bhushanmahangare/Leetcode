/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 39. Combination Sum
 * Medium
 * 
 * Given a set of candidate numbers (candidates) (without duplicates) and a target number (target), 
 * find all unique combinations in candidates where the candidate numbers sums to target.
 * 
 * The same repeated number may be chosen from candidates unlimited number of times.
 * 
 * Note:
 * All numbers (including target) will be positive integers.
 * The solution set must not contain duplicate combinations.
 * 
 * Example 1:
 * Input: candidates = [2,3,6,7], target = 7,
 * A solution set is:
 * [ 
 *  [7],
 *  [2,2,3]
 * ]
 * 
 * Example 2:
 * Input: candidates = [2,3,5], target = 8,
 * A solution set is:
 * [
 *  [2,2,2,2],
 *  [2,3,3],
 *  [3,5]
 * ]
 * 
 *  Constraints:
 * 1 <= candidates.length <= 30
 * 1 <= candidates[i] <= 200
 * Each element of candidate is unique.
 * 1 <= target <= 500
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package problem0039

 import (
	 "sort"
 )
 
 func combinationSum(candidates []int, target int) [][]int {
	 sort.Ints(candidates)
 
	 res := [][]int{}
	 solution := []int{}
	 cs(candidates, solution, target, &res)
 
	 return res
 }
 
 func cs(candidates, solution []int, target int, result *[][]int) {
	 if target == 0 {
		 *result = append(*result, solution)
	 }
 
	 if len(candidates) == 0 || target < candidates[0] {
		 
		 return
	 }
 
	 
	 solution = solution[:len(solution):len(solution)]
 
	 cs(candidates, append(solution, candidates[0]), target-candidates[0], result)
 
	 cs(candidates[1:], solution, target, result)
 }
 