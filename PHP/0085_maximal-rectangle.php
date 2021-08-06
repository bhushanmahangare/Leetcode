<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 85. Maximal Rectangle
 *
 * Hard
 *
 * Given a rows x cols binary matrix filled with 0's and 1's, find the largest rectangle
 * containing only 1's and return its area.
 *
 * Example 1:
 * Input:
 * matrix = [["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]]
 *
 * Output: 6
 * Explanation: The maximal rectangle is shown in the above picture.
 *
 * Example 2:
 * Input: matrix = []
 * Output: 0
 *
 * Example 3:
 * Input: matrix = [["0"]]
 * Output: 0
 *
 * Example 4:
 * Input: matrix = [["1"]]
 * Output: 1
 *
 * Example 5:
 * Input: matrix = [["0","0"]]
 * Output: 0
 *
 * Constraints:
 * rows == matrix.length
 * cols == matrix[i].length
 * 0 <= row, cols <= 200
 * matrix[i][j] is '0' or '1'.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/


class Solution
{

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    public function maximalRectangle($matrix)
    {
        $maxSize = 0;
        for ($i = 0; $i < count($matrix); $i++) {
            for ($j = 0; $j < count($matrix[0]); $j++) {
                if ($matrix[$i][$j] == '1') {
                    $maxSize = max(self::rectangleSize($matrix, $i, $j), $maxSize);
                }
            }
        }
        
        return $maxSize;
    }
    
    public function rectangleSize(&$matrix, $row, $col)
    {
        $maxSize;
        $rowSize;
        $size;
        $i = $row + 1;
        $j = $col + 1;
        $maxSize = $rowSize = $size = 1;
        
        while ($i < count($matrix) && $matrix[$i++][$col] == '1') {
            $rowSize++;
        }

        $maxSize = $size = $rowSize;
        
        while ($j < count($matrix[0])) {
            if ($matrix[$row][$j] == '0') {
                break;
            }
            
            for ($k = $row; $k < $row + $rowSize; $k++) {
                if ($matrix[$k][$j] == '0') { //if a '0' is found, reshape the rectangle
                    $oldrowSize = $rowSize;
                    $rowSize = $k - $row;
                    $size -= ($j - $col) * ($oldrowSize - $rowSize);
                }
            }
            
            $size += $rowSize;
            $maxSize = max($maxSize, $size);
            $j++;
        }
        
        return $maxSize;
    }
}
