/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 5. Longest Palindromic Substring
 * Medium
 *
 * Given a string s, find the longest palindromic substring in s. You may assume that 
 * the maximum length of s is 1000.
 * 
 * Example 1:
 * 
 * Input: "babad"
 * Output: "bab"
 * Note: "aba" is also a valid answer.
 * 
 * 
 * Example 2:
 * 
 * Input: "cbbd"
 * Output: "bb"
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {string} s
 * @return {string}
 */

const longestPalindrome = s => {
    let res = "";
    for (let i = 0; i < s.length; i++) {
      if (s[i] === s[i + 1]) {
        res = checkPal(s, res, i, i + 1);
      }
      res = checkPal(s, res, i, i);
    }
    return res;
  };
  
  const checkPal = (s, result, left, right) => {
    while (left >= 0 && right < s.length) {
      if (s[left] === s[right]) {
        left -= 1;
        right += 1;
      } else break;
    }
    left += 1;
    right -= 1;
    return right - left + 1 > result.length
      ? s.substring(left, right + 1)
      : result;
  };  