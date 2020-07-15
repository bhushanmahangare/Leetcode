import "math"

/* =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 7. Reverse Integer
 * Easy
 * Given a 32-bit signed integer, reverse digits of an integer.
 *
 * Example 1:
 * Input: 123
 * Output: 321
 *
 * Example 2:
 * Input: -123
 * Output: -321
 *
 * Example 3:
 * Input: 120
 * Output: 21
 *
 * Note:
 * Assume we are dealing with an environment which could only store integers within the 32-bit
 * signed integer range: [−231,  231 − 1]. For the purpose of this problem,
 * assume that your function returns 0 when the reversed integer overflows.
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

func reverse(x int) int {
	sign := 1

	if x < 0 {
		sign = -1
		x = -1 * x
	}

	res := 0
	for x > 0 {

		temp := x % 10

		res = res*10 + temp

		x = x / 10
	}

	res = sign * res

	if res > math.MaxInt32 || res < math.MinInt32 {
		res = 0
	}

	return res
}
