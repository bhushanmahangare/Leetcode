/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 11. Container With Most Water
 * Medium
 * 
 * Given n non-negative integers a1, a2, ..., an , where each represents a point at coordinate 
 * (i, ai). n vertical lines are drawn such that the two endpoints of line i is at (i, ai) 
 * and (i, 0). Find two lines, which together with x-axis forms a container, such that the 
 * container contains the most water.
 * 
 * Note: You may not slant the container and n is at least 2.
 * 
 * The above vertical lines are represented by array [1,8,6,2,5,4,8,3,7]. 
 * In this case, the max area of water (blue section) the container can contain is 49.
 * 
 * Example:
 * 
 * Input: [1,8,6,2,5,4,8,3,7]
 * Output: 49
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 func maxArea(height []int) int {
	if len(height) < 2 {
		return 0
	}
	max, left, right := 0, 0, len(height)-1
	for left < right {
		area := minHeight(height[left], height[right]) * (right - left)
		if area > max {
			max = area
		}
		if height[left] < height[right] {
			for left < len(height)-1 {
				left++
				if height[left] > height[left-1] {
					break
				}
			}
		} else {
			for right > 0 {
				right--
				if height[right] > height[right+1] {
					break
				}
			}
		}
	}
	return max
}

func minHeight(x, y int) int {
	if x < y {
		return x
	}
	return y
}
