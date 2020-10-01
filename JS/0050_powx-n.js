/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 50. Pow(x,n)
 * 
 * Medium
 * 
 * Implement pow(x, n), which calculates x raised to the power n (i.e. xn).
 * 
 * Example 1:
 * Input: x = 2.00000, n = 10
 * Output: 1024.00000
 * 
 * Example 2:
 * Input: x = 2.10000, n = 3
 * Output: 9.26100
 * 
 * Example 3:
 * Input: x = 2.00000, n = -2
 * Output: 0.25000
 * Explanation: 2-2 = 1/22 = 1/4 = 0.25
 * 
 * Constraints:
 * -100.0 < x < 100.0
 * -231 <= n <= 231-1
 * -104 <= xn <= 104
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 /**
 * @param {number} x
 * @param {number} n
 * @return {number}
 */

//  http://blog.csdn.net/sunnyyoona/article/details/43273933
var myPow = function(x, n) {
    if (n < 0) {
      return 1.0 / myPow(x, -n);
    }
    if (n === 0) {
      return 1.0;
    }
    if (n === 1) {
      return x;
    }
  
    var sub = myPow(x, parseInt(n / 2));
    return sub * sub * myPow(x, n % 2);
  };
  