<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 79. Word Search
 *
 * Medium
 *
 * Given an m x n grid of characters board and a string word, return true if word exists in the grid.
 * The word can be constructed from letters of sequentially adjacent cells, where adjacent cells are
 * horizontally or vertically neighboring. The same letter cell may not be used more than once.
 *
 * Example 1:
 * Input: board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCCED"
 * Output: true
 *
 * Example 2:
 * Input: board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "SEE"
 * Output: true
 *
 * Example 3:
 * Input: board = [["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], word = "ABCB"
 * Output: false
 *
 * Constraints:
 * m == board.length
 * n = board[i].length
 * 1 <= m, n <= 6
 * 1 <= word.length <= 15
 * board and word consists of only lowercase and uppercase English letters.
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    public function exist($board, $word)
    {
        if (count($board) == 0) {
            return false;
        }
        $n = count($board);
        $m = count($board[0]);
        if (strlen($word) > $m*$n) {
            return false;
        }
        $visited = array_fill(0, $n, array_fill(0, $m, false));
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $m; $j++) {
                if (self::help($i, $j, 0, $board, $word, $visited)) {
                    return true;
                }
            }
        }
        return false;
    }
    
    public function help($i, $j, $k, $board, $word, $visited)
    {
        if ($k == strlen($word)) {
            return true;
        }
        if ($i >= count($board) || $i < 0 || $j >= count($board[0]) || $j < 0) {
            return false;
        }
        if ($visited[$i][$j] || $board[$i][$j] != $word[$k]) {
            return false;
        }
        $visited[$i][$j] = true;
        $b = self::help($i+1, $j, $k+1, $board, $word, $visited) ||
                    self::help($i-1, $j, $k+1, $board, $word, $visited) ||
                    self::help($i, $j-1, $k+1, $board, $word, $visited) ||
                    self::help($i, $j+1, $k+1, $board, $word, $visited);
        $visited[$i][$j] = false;
        return $b;
    }
}
