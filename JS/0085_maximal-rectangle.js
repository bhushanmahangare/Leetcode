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


/**
 * @param {character[][]} matrix
 * @return {number}
 */
var maximalRectangle = function (matrix) {
    if (matrix === null || matrix.length === 0 || matrix[0].length === 0) {
        return 0;
    }
    var heights = [];

    var maxArea = 0;
    for (var x = 0; x < matrix.length; x++) {
        var height = Array(matrix[0].length).fill(0);
        heights.push(height);
        for (var y = 0; y < matrix[0].length; y++) {
            if (matrix[x][y] === "1") {
                if (x === 0) {
                    heights[x][y] = 1;
                } else {
                    heights[x][y] = heights[x - 1][y] + 1;
                }
            }
        }

        maxArea = Math.max(maxArea, largestRectangleArea(heights[x]));
    }

    return maxArea;
};

var largestRectangleArea = function (heights) {
    var maxArea = 0;

    if (heights === null || heights.length === 0) {
        return maxArea;
    }

    var stack = [];
    var i = 0;

    while (i <= heights.length) {
        // Keep stack height in increasing order
        // stack store the height index not the height
        // everytime we encounter height smaller than the max height in the stack, we calculate area and pop
        // height index in the stack until stack is empty or we found height smaller than the current height in the stack.
        // taking [2,1,5,6,2,3] for example
        // 2, then we encounter 1, it means anything after 1 will not yield rectangle with height greater than 1 since they all got throttle by 1
        // stack will look like
        // 1. [2]
        // 2. we calculate area 2*1, i is at index 0 and i is at 1 (1-0)*height(2) = 2
        // 3. [1]
        // 4. [1,5]
        // 5. [1,5,6]
        // we calculate area 6*1, i is at index 4 and height 6 is at index 1 (4-3)*height(6) = 6
        // 6. [1,5]
        // we calculate area 5*2, i is at index 4 and height 5 is at index 2 (4-2)*height(5) = 10
        // 7. [1,2]
        // 8. [1,2,3]
        // etc...

        if (stack.length === 0 || heights[stack[stack.length - 1]] <= heights[i]) {
            stack.push(i++);
        } else {
            var height = heights[stack.pop()];
            var width = stack.length === 0 ? i : i - stack[stack.length - 1] - 1;
            maxArea = Math.max(height * width, maxArea);
        }
    }

    return maxArea;
};

var matrix = ["10100", "10111", "11111", "10010"];
maximalRectangle(matrix);