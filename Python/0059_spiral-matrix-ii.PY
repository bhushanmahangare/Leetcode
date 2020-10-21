"""=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""
 
 def generateMatrix(self, n):
    matrix = [[0] * n for _ in xrange(n)]
    x, u, d, l, r = 1, 0, n - 1, 0, n - 1
    # x is the next value to write
    # u and d are upper and lower bound of current square/rectangle
    # l and r are left and right bound of current square/rectangle
    while l < r and u < d:
        for j in xrange(l, r):
            matrix[u][j] = x
            x += 1
        for i in xrange(u, d):
            matrix[i][r] = x
            x += 1
        for j in xrange(r, l, -1):
            matrix[d][j] = x
            x += 1
        for i in xrange(d, u, -1):
            matrix[i][l] = x
            x += 1
        u, d, l, r = u + 1, d - 1, l + 1, r - 1
    if l == r:
        matrix[u][r] = x
    return matrix