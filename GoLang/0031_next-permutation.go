/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 31. Next Permutation
 * Medium
 * 
 * Implement next permutation, which rearranges numbers into the lexicographically next 
 * greater permutation of numbers.
 * 
 * If such arrangement is not possible, it must rearrange it as the lowest possible order 
 * (ie, sorted in ascending order).
 * 
 * The replacement must be in-place and use only constant extra memory.
 * Here are some examples. Inputs are in the left-hand column and its corresponding outputs 
 * are in the right-hand column.
 * 
 * 1,2,3 → 1,3,2
 * 3,2,1 → 1,2,3
 * 1,1,5 → 1,5,1
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package problem0031

 func nextPermutation(a []int) {
	 left := len(a) - 2
	 for 0 <= left && a[left] >= a[left+1] {
		 left--
	 }
 
	 reverse(a, left+1)
 
	 if left == -1 {
		 return
	 }
 
	 right := search(a, left+1, a[left])
	 a[left], a[right] = a[right], a[left]
 }
 
 
 func reverse(a []int, l int) {
	 r := len(a) - 1
	 for l < r {
		 a[l], a[r] = a[r], a[l]
		 l++
		 r--
	 }
 }
 
 
 func search(a []int, l, target int) int {
	 r := len(a) - 1
	 l--
	 for l+1 < r {
		 mid := (l + r) / 2
		 if target < a[mid] {
			 r = mid
		 } else {
			 l = mid
		 }
	 }
	 return r
 }
 