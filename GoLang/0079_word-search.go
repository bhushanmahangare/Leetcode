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


func exist(board [][]byte, word string) bool {
	m := len(board)
	if m == 0 {
		return false
	}

	n := len(board[0])
	if n == 0 {
		return false
	}

	if len(word) == 0 {
		return false
	}

	var dfs func(int, int, int) bool
	dfs = func(r, c, index int) bool {
		if len(word) == index {
			return true
		}

		if r < 0 || m <= r || c < 0 || n <= c || board[r][c] != word[index] {
			return false
		}

		temp := board[r][c]
		board[r][c] = 0

		if dfs(r-1, c, index+1) ||
			dfs(r+1, c, index+1) ||
			dfs(r, c-1, index+1) ||
			dfs(r, c+1, index+1) {
			return true
		}

		board[r][c] = temp

		return false
	}

	for i := 0; i < m; i++ {
		for j := 0; j < n; j++ {
			if dfs(i, j, 0) {
				return true
			}
		}
	}

	return false
}
