<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 73. Set Matrix Zeroes
 *
 * Medium
 *
 * Given an m x n matrix. If an element is 0, set its entire row and column to 0. Do it in-place.
 *
 * Follow up:
 * A straight forward solution using O(mn) space is probably a bad idea.
 * A simple improvement uses O(m + n) space, but still not the best solution.
 * Could you devise a constant space solution?
 *
 * Example 1:
 * Input: matrix = [[1,1,1],[1,0,1],[1,1,1]]
 * Output: [[1,0,1],[0,0,0],[1,0,1]]
 *
 * Example 2:
 * Input: matrix = [[0,1,2,0],[3,4,5,2],[1,3,1,5]]
 * Output: [[0,0,0,0],[0,4,5,0],[0,3,1,0]]
 *
 * Constraints:
 * m == matrix.length
 * n == matrix[0].length
 * 1 <= m, n <= 200
 * -231 <= matrix[i][j] <= 231 - 1
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @return NULL
     */
    public function setZeroes(&$matrix)
    {
        if (count($matrix)==0 || count($matrix[0])==0) {
            return ;
        }
        // check whether the first row has zero;
        $firstRowZero = false;
        for ($j=0; $j<count($matrix[0]); $j++) {
            if ($matrix[0][$j]==0) {
                $firstRowZero = true;
                break;
            }
        }
        // Set all rows that have zero to zeros, and mark the zero column in the first row
        for ($i=1; $i<count($matrix); $i++) {
            $rowZero = false;
            for ($j=0; $j<count($matrix[0]); $j++) {
                if ($matrix[$i][$j]==0) {
                    $rowZero = true;
                    $matrix[0][$j] = 0;
                }
            }
            if ($rowZero) {
                $matrix[$i] = array_fill(0, count($matrix[$i]), 0);
            }
        }
        // Set all the zero columns to zeros
        for ($j=0; $j<count($matrix[0]); $j++) {
            if ($matrix[0][$j]==0) {
                for ($i=1; $i<count($matrix); $i++) {
                    $matrix[$i][$j] = 0;
                }
            }
        }
        // deal with the first row
        if ($firstRowZero) {
            $matrix[0] = array_fill(0, count($matrix[0]), 0);
        }
    }
}
