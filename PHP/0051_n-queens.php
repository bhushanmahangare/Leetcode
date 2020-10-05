<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 51. N-Queens
 * 
 * Hard
 * 
 * The n-queens puzzle is the problem of placing n queens on an n×n chessboard such that no two 
 * queens attack each other.
 * 
 * Given an integer n, return all distinct solutions to the n-queens puzzle.
 * Each solution contains a distinct board configuration of the n-queens' placement, 
 * where 'Q' and '.' both indicate a queen and an empty space respectively.
 * 
 * Example:
 * 
 * Input: 4
 * Output: [
 * [".Q..",  // Solution 1
 * "...Q",
 * "Q...",
 * "..Q."],
 * 
 * ["..Q.",  // Solution 2
 * "Q...",
 * "...Q",
 * ".Q.."]
 * ]
 * 
 * Explanation: There exist two distinct solutions to the 4-queens puzzle as shown above.
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param Integer $n
     * @return String[][]
     */
    function solveNQueens($n) {
        $ans = [];
        $colUsed = array_fill(0, $n, false);
        $diagonals45Used = array_fill(0, 2 * $n - 1, false);
        $diagonals135Used = array_fill(0, 2 * $n - 1, false);
        $chars = array_fill(0, $n, array_fill(0, $n, '.'));
        self::helper(0, $chars, $ans, $colUsed, $diagonals45Used, $diagonals135Used);
        return $ans;
    }
    
    function helper($row, &$chars, &$ans, &$colUsed, &$diagonals45Used, &$diagonals135Used){
        $N = count($chars);
        if ($row == $N) {
            $temp = [];
            for ($i = 0; $i < $N; $i++)
                array_push($temp, implode($chars[$i]));
            array_push($ans, $temp);
        }else{
            for ($i = 0; $i < $N; $i++){
                if ($colUsed[$i] || $diagonals45Used[$i+$row] || $diagonals135Used[$N-1-$row+$i]) continue;
                $chars[$row][$i] = 'Q';
                $colUsed[$i] = $diagonals45Used[$i+$row] = $diagonals135Used[$N-1-$row+$i] = true;
                self::helper($row+1, $chars, $ans, $colUsed, $diagonals45Used, $diagonals135Used);
                $chars[$row][$i] = '.';
                $colUsed[$i] = $diagonals45Used[$i+$row] = $diagonals135Used[$N-1-$row+$i] = false;
            }
        }
    }
}

