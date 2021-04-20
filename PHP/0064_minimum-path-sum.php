<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 64. Minimum Path Sum
 *
 * Medium
 *
 * Given a m x n grid filled with non-negative numbers, find a path from top left to bottom right,
 * which minimizes the sum of all numbers along its path.
 *
 * Note: You can only move either down or right at any point in time.
 *
 * Example 1:
 * Input: grid = [[1,3,1],[1,5,1],[4,2,1]]
 * Output: 7
 * Explanation: Because the path 1 → 3 → 1 → 1 → 1 minimizes the sum.
 *
 * Example 2:
 * Input: grid = [[1,2,3],[4,5,6]]
 * Output: 12
 *
 * Constraints:
 * m == grid.length
 * n == grid[i].length
 * 1 <= m, n <= 200
 * 0 <= grid[i][j] <= 100
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 class Solution
 {
     /**
      * @param Integer[][] $grid
      * @return Integer
      */
     public function minPathSum($grid)
     {
         $m = count($grid);
         $n = count($grid[0]);
         $dp = array_fill(0, $m, array_fill(0, $n, 0));
         
         $dp[0][0] = $grid[0][0];

         for ($i = 1; $i < $m; $i++) {
             $dp[$i][0] = $dp[$i-1][0] + $grid[$i][0];
         }
         
         for ($i = 1; $i < $n; $i++) {
             $dp[0][$i] = $dp[0][$i-1] + $grid[0][$i];
         }
        
         for ($j = 1; $j < $n; $j++) {
             for ($i = 1; $i < $m; $i++) {
                 $dp[$i][$j] = $grid[$i][$j] + min($dp[$i-1][$j], $dp[$i][$j-1]);
             }
         }
         
         return $dp[$m-1][$n-1];
     }
 }
