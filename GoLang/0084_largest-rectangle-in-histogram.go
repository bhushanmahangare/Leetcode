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

func largestRectangleArea(heights []int) int {
	
	heights = append([]int{-2}, heights...)
	heights = append(heights, -1)

	size := len(heights)

	stack := make([]int, 1, size)

	end := 1

	res := 0
	for end < size {
		if heights[stack[len(stack)-1]] < heights[end] {
			stack = append(stack, end)
			end++
			continue
		}

		begin := stack[len(stack)-2]
		index := stack[len(stack)-1]
		height := heights[index]

		area := (end - begin - 1) * height

		res = max(res, area)

		stack = stack[:len(stack)-1]
	}

	return res
}

func max(a, b int) int {
	if a > b {
		return a
	}
	return b
}
