/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 36. Sudoku Solver
 * Hard
 * 
 * Write a program to solve a Sudoku puzzle by filling the empty cells.
 * 
 * A sudoku solution must satisfy all of the following rules:
 * 
 * Each of the digits 1-9 must occur exactly once in each row.
 * Each of the digits 1-9 must occur exactly once in each column.
 * Each of the the digits 1-9 must occur exactly once in each of the 9 3x3 sub-boxes of the grid.
 * 
 * 
 * Empty cells are indicated by the character '.'.
 * 
 * A sudoku puzzle...
 * 
 * ...and its solution numbers marked in red.
 * 
 * 
 * Note:
 * The given board contain only digits 1-9 and the character '.'.
 * You may assume that the given Sudoku puzzle will have a single unique solution.
 * The given board size is always 9x9.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

package problem0037

func solveSudoku(board [][]byte) {
	solve(board, 0)
}


func solve(board [][]byte, k int) bool {
	if k == 81 {
		return true
	}

	r, c := k/9, k%9
	if board[r][c] != '.' {
		return solve(board, k+1)
	}


	bi, bj := r/3*3, c/3*3


	isValid := func(b byte) bool {
		for n := 0; n < 9; n++ {
			if board[r][n] == b ||
				board[n][c] == b ||
				board[bi+n/3][bj+n%3] == b {
				return false
			}
		}
		return true
	}

	for b := byte('1'); b <= '9'; b++ {
		if isValid(b) {
			board[r][c] = b
			if solve(board, k+1) {
				return true
			}
		}
	}

	board[r][c] = '.'

	return false
}
