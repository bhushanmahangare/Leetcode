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
 
#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>

static inline int max(int a, int b)
{
    return a > b ? a : b;
}

static int area_calc(int *heights, int size)
{
    int *indexes = malloc(size * sizeof(int));
    int *lhist = malloc(size * sizeof(int));
    int *rhist = malloc(size * sizeof(int));

    int i, pos = 0;
    for (i = 0; i < size; i++) {
        /* squeeze to keep monotonous increasing histograms */
        while (pos > 0 && heights[indexes[pos - 1]] >= heights[i]) {
            pos--;
        }
        lhist[i] = pos == 0 ? -1 : indexes[pos - 1];
        indexes[pos++] = i;
    }

    pos = 0;
    for (i = size - 1; i >= 0; i--) {
        /* squeeze to keep monotonous increasing histograms */
        while (pos > 0 && heights[indexes[pos - 1]] >= heights[i]) {
            pos--;
        }
        rhist[i] = pos == 0 ? size : indexes[pos - 1];
        indexes[pos++] = i;
    }

    int max_area = 0;
    for (i = 0; i < size; i++) {
        int area = heights[i] * (rhist[i] - lhist[i] - 1);
        max_area = max(area, max_area);
    }

    return max_area;
}

static int maximalRectangle(char** matrix, int matrixRowSize, int matrixColSize)
{
    int i, j, max_area = 0;
    int *heights = malloc(matrixColSize * sizeof(int));
    memset(heights, 0, matrixColSize * sizeof(int));
    for (i = 0; i < matrixRowSize; i++) {
        for (j = 0; j < matrixColSize; j++) {
            heights[j] = matrix[i][j] == '1' ? heights[j] + 1 : 0;
        }
        max_area = max(max_area, area_calc(heights, matrixColSize));
    }
    return max_area;
}

int main(int argc, char **argv)
{
    if (argc < 2) {
        fprintf(stderr, "Usage: ./test row1 row2...\n");
        exit(-1);
    }

    int i, j;
    int row_size = argc - 1;
    int col_size = strlen(argv[1]);
    for (i = 0; i < row_size; i++) {
        printf("%s\n", argv[i + 1]);
    }
    printf("%d\n", maximalRectangle(argv + 1, argc - 1, strlen(argv[1])));
    return 0;
}
