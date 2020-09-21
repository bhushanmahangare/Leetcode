/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 42. Trapping Rain Water
 * Given n non-negative integers representing an elevation map where the width of each bar is 1, 
 * compute how much water it is able to trap after raining.
 * 
 * The above elevation map is represented by array [0,1,0,2,1,0,1,3,2,1,2,1]. 
 * In this case, 6 units of rain water (blue section) are being trapped. 
 * Thanks Marcos for contributing this image!
 * 
 * Example:
 * Input: [0,1,0,2,1,0,1,3,2,1,2,1]
 * Output: 6
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

func bigger(a int, b int) int {
	if a > b {
		return a
	}
	return b
}

func smaller(a int, b int) int {
	if a < b {
		return a
	}
	return b
}

func trap(height []int) int {
	length := len(height)
	if length <= 2 {
		return 0
	}

	left, right := make([]int, length), make([]int, length)

	left[0], right[length-1] = height[0], height[length-1]

	for i := 1; i < length; i++ {

		left[i] = bigger(left[i-1], height[i])
		right[length-1-i] = bigger(right[length-i], height[length-1-i])

	}

	water := 0
	for i := 0; i < length; i++ {
		
		water += smaller(left[i], right[i]) - height[i]
		
	}

	return water
}
