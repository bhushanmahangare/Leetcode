/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 77. Combinations
 *
 * Medium
 *
 * Given two integers n and k, return all possible combinations of k numbers out of the range [1, n].
 *
 * You may return the answer in any order.
 *
 * Example 1:
 * Input: n = 4, k = 2
 * Output:
 * [
 *  [2,4],
 *  [3,4],
 *  [2,3],
 *  [1,2],
 *  [1,3],
 *  [1,4],
 * ]
 *
 * Example 2:
 * Input: n = 1, k = 1
 * Output: [[1]]
 *
 * Constraints:
 * 1 <= n <= 20
 * 1 <= k <= n
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 func combine(n int, k int) [][]int {
	 combination := make([]int, k)
	 res := [][]int{}
 
	 var dfs func(int, int)
	 dfs = func(idx, begin int) {
		 if idx == k {
			 temp := make([]int, k)
			 copy(temp, combination)
			 res = append(res, temp)
			 return
		 }
 
		 for i := begin; i <= n+1-k+idx; i++ {
			 combination[idx] = i
			 dfs(idx+1, i+1)
		 }
	 }
 
	 dfs(0, 1)
 
	 return res
 }
 