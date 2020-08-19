/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 29. Divide Two Integers
 * Medium
 * 
 * Given two integers dividend and divisor, divide two integers without using multiplication, 
 * division and mod operator.
 * 
 * Return the quotient after dividing dividend by divisor.
 * 
 * The integer division should truncate toward zero, which means losing its fractional part. 
 * For example, truncate(8.345) = 8 and truncate(-2.7335) = -2.
 * 
 * Example 1:
 * Input: dividend = 10, divisor = 3
 * Output: 3
 * Explanation: 10/3 = truncate(3.33333..) = 3.
 * 
 * Example 2:
 * Input: dividend = 7, divisor = -3
 * Output: -2
 * Explanation: 7/-3 = truncate(-2.33333..) = -2.
 * Note:
 * Both dividend and divisor will be 32-bit signed integers.
 * The divisor will never be 0.
 * Assume we are dealing with an environment which could only store integers within the 32-bit 
 * signed integer range: [−231,  231 − 1]. For the purpose of this problem, assume that your 
 * function returns 231 − 1 when the division result overflows.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package problem0029

 import (
	 "math"
 )
 
 func divide(m, n int) int {
	 
	 if n == 0 {
		 return math.MaxInt32
	 }
 
	 signM, absM := analysis(m)
	 signN, absN := analysis(n)
 
	 res, _ := d(absM, absN, 1)
 
	 
	 if signM != signN {
		 res = res - res - res
	 }
 
	 
	 if res < math.MinInt32 || res > math.MaxInt32 {
		 return math.MaxInt32
	 }
 
	 return res
 }
 
 func analysis(num int) (sign, abs int) {
	 sign = 1
	 abs = num
	 if num < 0 {
		 sign = -1
		 abs = num - num - num
	 }
 
	 return
 }
 

 func d(m, n, count int) (res, remainder int) {
	 switch {
	 case m < n:
		 return 0, m
	 case n <= m && m < n+n:
		 return count, m - n
	 default:
		 res, remainder = d(m, n+n, count+count)
		 if remainder >= n {
			 return res + count, remainder - n
		 }
 
		 return
	 }
 }
 