/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 84. Largest Rectangle in Histogram
 *
 * Hard
 *
 * Given an array of integers heights representing the histogram's bar height where the width of
 * each bar is 1, return the area of the largest rectangle in the histogram.
 *
 * Example 1:
 * Input: heights = [2,1,5,6,2,3]
 *
 * 
 *                    6          
 *                  +---+        
 *               5  |   |        
 *              +---+   |        
 *              |   |   |        
 *              |   |   |        
 *              |   |   |     3  
 *              |   |   |   +---+
 *        2     |   |   | 2 |   |
 *      +---+   |   |   +---+   |
 *      |   | 1 |   |   |   |   |
 *      |   +---+   |   |   |   |
 *      |   |   |   |   |   |   |
 *      +---+---+---+---+---+---+
 *      
 * Above is a histogram where width of each bar is 1, given height = [2,1,5,6,2,3].
 **      
 *                    6          
 *                  +---+        
 *               5  |   |        
 *              +-------|        
 *              |-------|        
 *              |-------|        
 *              |-------|     3  
 *              |-------|   +---+
 *        2     |-------| 2 |   |
 *      +---+   |-------|---+   |
 *      |   | 1 |-------|   |   |
 *      |   +---|-------|   |   |
 *      |   |   |-------|   |   |
 *      +---+---+---+---+---+---+
 *
 * Output: 10
 * Explanation: The above is a histogram where width of each bar is 1.
 * The largest rectangle is shown in the red area, which has an area = 10 units.
 *
 * Example 2:
 * Input: heights = [2,4]
 * Output: 4
 *
 * Constraints:
 * 1 <= heights.length <= 105
 * 0 <= heights[i] <= 104
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 
#include <stdio.h>
#include <stdlib.h>

static int largestRectangleArea(int* heights, int heightsSize)
{
    int *indexes = malloc(heightsSize * sizeof(int));
    int *left = malloc(heightsSize * sizeof(int));
    int *right = malloc(heightsSize * sizeof(int));

    int i, pos = 0;
    for (i = 0; i < heightsSize; i++) {
        /* monotonous increasing stack */
        while (pos > 0 && heights[indexes[pos - 1]] >= heights[i]) {
            pos--;
        }
        left[i] = pos == 0 ? -1 : indexes[pos - 1];
        indexes[pos++] = i;
    }

    pos = 0;
    for (i = heightsSize - 1; i >= 0; i--) {
        /* monotonous increasing stack */
        while (pos > 0 && heights[indexes[pos - 1]] >= heights[i]) {
            pos--;
        }
        right[i] = pos == 0 ? heightsSize : indexes[pos - 1];
        indexes[pos++] = i;
    }

    int max_area = 0;
    for (i = 0; i < heightsSize; i++) {
        int area = heights[i] * (right[i] - left[i] - 1);
        max_area = area > max_area ? area : max_area;
    }

    return max_area;
}

int main(void)
{
    int nums[] = { 2, 1, 5, 6, 2, 3 };
    int count = sizeof(nums) / sizeof(*nums);
    printf("%d\n", largestRectangleArea(nums, count));
    return 0;
}
