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

func solveNQueens(n int) [][]string {
	if n == 0 {
		return [][]string{}
	}

	cols := make([]bool, n)
	
	d1 := make([]bool, 2*n)
	
	d2 := make([]bool, 2*n)

	board := make([]string, n)

	res := [][]string{}

	dfs(0, cols, d1, d2, board, &res)

	return res
}

func dfs(r int, cols, d1, d2 []bool, board []string, res *[][]string) {

	if r == len(board) {
		tmp := make([]string, len(board))
		copy(tmp, board)
		*res = append(*res, tmp)
		return
	}

	n := len(board)

	for c := 0; c < len(board); c++ {
		
		id1 := r - c + n
		id2 := r + c
		if !cols[c] && !d1[id1] && !d2[id2] {
			b := make([]byte, n)
			for i := range b {
				b[i] = '.'
			}
			b[c] = 'Q'
			board[r] = string(b)
		
		
			cols[c], d1[id1], d2[id2] = true, true, true

			dfs(r+1, cols, d1, d2, board, res)

		
			cols[c], d1[id1], d2[id2] = false, false, false
		}
	}
}