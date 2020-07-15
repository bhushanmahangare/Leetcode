/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 8. String to Integer (atoi)
 * Medium
 * 
 * Implement atoi which converts a string to an integer.
 * 
 * The function first discards as many whitespace characters as necessary until the first 
 * non-whitespace character is found. Then, starting from this character, takes an optional 
 * initial plus or minus sign followed by as many numerical digits as possible, and interprets 
 * them as a numerical value.
 * 
 * The string can contain additional characters after those that form the integral number, 
 * which are ignored and have no effect on the behavior of this function.
 * 
 * If the first sequence of non-whitespace characters in str is not a valid integral number, or 
 * if no such sequence exists because either str is empty or it contains only whitespace characters, 
 * no conversion is performed.
 * 
 * If no valid conversion could be performed, a zero value is returned.
 * 
 * Note:
 * Only the space character ' ' is considered as whitespace character.
 * Assume we are dealing with an environment which could only store integers within the 32-bit 
 * signed integer range: [−231,  231 − 1]. If the numerical value is out of the range of 
 * representable values, INT_MAX (231 − 1) or INT_MIN (−231) is returned.
 * 
 * Example 1:
 * Input: "42"
 * Output: 42
 * 
 * Example 2:
 * Input: "   -42"
 * Output: -42
 * Explanation: The first non-whitespace character is '-', which is the minus sign.
 * Then take as many numerical digits as possible, which gets 42.
 * 
 * Example 3:
 * Input: "4193 with words"
 * Output: 4193
 * Explanation: Conversion stops at digit '3' as the next character is not a numerical digit.
 * 
 * Example 4:
 * Input: "words and 987"
 * Output: 0
 * Explanation: The first non-whitespace character is 'w', which is not a numerical 
 * digit or a +/- sign. Therefore no valid conversion could be performed.
 * 
 * Example 5:
 * Input: "-91283472332"
 * Output: -2147483648
 * Explanation: The number "-91283472332" is out of the range of a 32-bit signed integer.
 * Thefore INT_MIN (−231) is returned.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {string} str
 * @return {number}
 */
var myAtoi = function(str) {
    var num = 0;
    var baseCharCode = "0".charCodeAt(0);
    var sign = 1;
  
    str = str.trim();
  
    if (str[0] === "+" || str[0] === "-") {
      if (str[0] === "-") {
        sign = -1;
      }
  
      str = str.substring(1);
    }
  
    for (var i = 0; i < str.length; i++) {
      var c = str[i];
      var charCode = c.charCodeAt(0) - baseCharCode;
  
      if (0 <= charCode && charCode <= 9) {
        num *= 10;
        num += charCode;
      } else {
        break;
      }
    }
  
    var maxInt = Math.pow(2, 31) - 1;
    var minNegInt = -Math.pow(2, 31);
  
    num = sign * num;
  
    if (0 < num && maxInt < num) {
      return maxInt;
    }
  
    if (num < 0 && num < minNegInt) {
      return minNegInt;
    }
  
    return num;
  };
  
  // 88ms faster than ~71.86% and space 37.2mb less than ~10.34%. Need to improve space compelxity.
  var myAtoi = function(str) {
    const len = str.length;
    let max = 2147483647;
    let min = -2147483648;
    let numberMatch = /^[\d ()+-]+$/;
  
    for (let i = 0, j = i; i < len; i++) {
      let current = str[i];
  
      if (current != " " && !current.match(numberMatch)) return 0;
      else if (current != " " && current.match(numberMatch)) {
        let result = "";
  
        while (j < len && current.match(numberMatch)) {
          result += str[j];
          j++;
        }
        let output = parseInt(result);
        if (isNaN(output)) return 0;
        else if (output > max) return max;
        else if (output < min) return min;
        else return output;
      }
    }
    return 0;
  };  