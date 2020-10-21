/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 59. Spiral Matrix II
 * 
 * Medium
 * 
 * Given a positive integer n, generate a square matrix filled with elements from 1 to n2 in 
 * spiral order.
 * 
 * Example:
 * Input: 3
 * 
 * Output:
 * [
 *  [ 8, 9, 4 ]
 *  [ 7, 6, 5 ]
 *  [ 1, 2, 3 ],
 * ]
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 
func generateMatrix(n int) [][]int {
	if n == 0 {
		return nil
	}

	res := make([][]int, n)
	for i := range res {
		res[i] = make([]int, n)
	}

	max := n * n
	next := nextFunc(n)

	for i := 1; i <= max; i++ {
		x, y := next()
		res[x][y] = i
	}

	return res
}

func nextFunc(n int) func() (int, int) {
	top, down := 0, n-1
	left, right := 0, n-1
	x, y := 0, -1
	dx, dy := 0, 1
	return func() (int, int) {
		x += dx
		y += dy
		switch {
		case y+dy > right:
			top++
			dx, dy = 1, 0
		case x+dx > down:
			right--
			dx, dy = 0, -1
		case y+dy < left:
			down--
			dx, dy = -1, 0
		case x+dx < top:
			left++
			dx, dy = 0, 1
		}
		return x, y
	}
}
