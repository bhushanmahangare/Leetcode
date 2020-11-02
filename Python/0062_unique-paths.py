"""=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 62. Unique Paths
 * 
 * Medium
 * 
 * A robot is located at the top-left corner of a m x n grid (marked 'Start' in the diagram below).
 * 
 * The robot can only move either down or right at any point in time. The robot is trying to 
 * reach the bottom-right corner of the grid (marked 'Finish' in the diagram below).
 * 
 * How many possible unique paths are there?
 * 
 * Example 1:
 * Input: m = 3, n = 7
 * Output: 28
 * 
 * Example 2:
 * Input: m = 3, n = 2
 * Output: 3
 * Explanation:
 * From the top-left corner, there are a total of 3 ways to reach the bottom-right corner:
 * 1. Right -> Down -> Down
 * 2. Down -> Down -> Right
 * 3. Down -> Right -> Down
 * 
 * Example 3:
 * Input: m = 7, n = 3
 * Output: 28
 * 
 * Example 4:
 * Input: m = 3, n = 3
 * Output: 6
 * 
 * Constraints:
 * 1 <= m, n <= 100
 * It's guaranteed that the answer will be less than or equal to 2 * 109.
 * 
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""
 
 class Solution(object):
    def uniquePaths(self, m, n):
        """
        :type m: int
        :type n: int
        :rtype: int
        """
        dp = [[0 for _ in range(n)] for _ in range(m)]
        for index in range(m):
        	dp[index][0] = 1

        for index in range(n):
        	dp[0][index] = 1

        for index_i in range(1, m):
        	for index_j in range(1, n):
        		dp[index_i][index_j] = dp[index_i-1][index_j] + dp[index_i][index_j-1]

        return dp[m-1][n-1]