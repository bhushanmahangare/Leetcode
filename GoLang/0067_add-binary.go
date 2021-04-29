/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 67. Add Binary
 *
 * Easy
 *
 * Given two binary strings a and b, return their sum as a binary string.
 *
 * Example 1:
 * Input: a = "11", b = "1"
 * Output: "100"
 *
 * Example 2:
 * Input: a = "1010", b = "1011"
 * Output: "10101"
 *
 * Constraints:
 * 1 <= a.length, b.length <= 104
 * a and b consist only of '0' or '1' characters.
 * Each string does not contain leading zeros except for the zero itself.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

func addBinary(a string, b string) string {
	if len(a) < len(b) {
		a, b = b, a
	}
	l := len(a)

	isA := trans(a, l)
	isB := trans(b, l)

	return makeString(add(isA, isB))
}

func trans(s string, l int) []int {
	res := make([]int, l)
	ls := len(s)
	for i, b := range s {
		res[l-ls+i] = int(b - '0')
	}

	return res
}

func add(a, b []int) []int {
	l := len(a) + 1
	res := make([]int, l)
	for i := l - 1; i >= 1; i-- {
		temp := res[i] + a[i-1] + b[i-1]
		res[i] = temp % 2
		res[i-1] = temp / 2
	}

	i := 0

	for i < l-1 && res[i] == 0 {
		i++
	}

	return res[i:]
}

func makeString(nums []int) string {
	bytes := make([]byte, len(nums))
	for i := range bytes {
		bytes[i] = byte(nums[i]) + '0'
	}

	return string(bytes)
}
