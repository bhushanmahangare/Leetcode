<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 74. Search a 2D Matrix
 *
 * Medium
 *
 * Write an efficient algorithm that searches for a value in an m x n matrix.
 * This matrix has the following properties:
 *
 * Integers in each row are sorted from left to right.
 * The first integer of each row is greater than the last integer of the previous row.
 *
 * Example 1:
 * Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 3
 * Output: true
 *
 * Example 2:
 * Input: matrix = [[1,3,5,7],[10,11,16,20],[23,30,34,60]], target = 13
 * Output: false
 *
 * Constraints:
 * m == matrix.length
 * n == matrix[i].length
 * 1 <= m, n <= 100
 * -104 <= matrix[i][j], target <= 104
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer[][] $matrix
     * @param Integer $target
     * @return Boolean
     */
    public function searchMatrix($matrix, $target)
    {
        if ($matrix == null || count($matrix) == 0 || $matrix[0] == null || count($matrix[0]) == 0) {
            return false;
        }
        $col = count($matrix[0]) - 1;
        $row = 0;
        // start from the up left corner, if smaller than target, then go down, if larger then go left
        while ($row < count($matrix) && $col >= 0) {
            if ($matrix[$row][$col] == $target) {
                return true;
            }
            if ($matrix[$row][$col] < $target) {
                $row++;
            } else {
                $col--;
            }
        }
        return false;
    }
}
