/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 10. Regular Expression Matching
 * Hard
 * 
 * 
 * Given an input string (s) and a pattern (p), implement regular expression matching with 
 * support for '.' and '*'.
 * 
 * '.' Matches any single character.
 * '*' Matches zero or more of the preceding element.
 * 
 * The matching should cover the entire input string (not partial).
 * 
 * Note:
 * s could be empty and contains only lowercase letters a-z.
 * p could be empty and contains only lowercase letters a-z, and characters like . or *.
 * 
 * Example 1:
 * 
 * Input:
 * s = "aa"
 * p = "a"
 * 
 * Output: false
 * Explanation: "a" does not match the entire string "aa".
 * 
 * Example 2:
 * 
 * Input:
 * s = "aa"
 * p = "a*"
 * 
 * Output: true
 * Explanation: '*' means zero or more of the preceding element, 'a'. Therefore, by 
 * repeating 'a' once, it becomes "aa".
 * 
 * Example 3:
 * 
 * Input:
 * s = "ab"
 * p = ".*"
 * Output: true
 * Explanation: ".*" means "zero or more (*) of any character (.)".
 * 
 * 
 * Example 4:
 * 
 * Input:
 * s = "aab"
 * p = "c*a*b"
 * Output: true
 * Explanation: c can be repeated 0 times, a can be repeated 1 time. Therefore, it matches "aab".
 * 
 * Example 5:
 * Input:
 * s = "mississippi"
 * p = "mis*is*p*."
 * Output: false
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {string} s
 * @param {string} p
 * @return {boolean}
 */
var isMatch = function(s, p) {
    var sLen = s.length;
    var pLen = p.length;
    var dp = [];
  
    for (var i = 0; i <= sLen; i++) {
      var tmp = [];
  
      for (var j = 0; j <= pLen; j++) {
        tmp.push(false);
      }
  
      dp.push(tmp);
    }
  
    dp[0][0] = true;
  
    for (i = 0; i <= sLen; i++) {
      for (j = 0; j <= pLen; j++) {
        if (p[j - 1] !== "." && p[j - 1] !== "*") {
          if (i > 0 && p[j - 1] === s[i - 1] && dp[i - 1][j - 1]) {
            dp[i][j] = true;
          }
        } else if (p[j - 1] === ".") {
          if (i > 0 && dp[i - 1][j - 1]) {
            dp[i][j] = true;
          }
        } else if (j > 1) {
          // '*' cannot be the first element
          if (dp[i][j - 2]) {
            // 0 occurance
            dp[i][j] = true;
          } else if (
            i > 0 &&
            (p[j - 2] === s[i - 1] || p[j - 2] === ".") &&
            dp[i - 1][j]
          ) {
            // example
            // xa and xa*
            // s[i-1] === a
            // p[j-2] === a
            // a === a
            // so we can now compare x, xa*
            // and x here is dp[i-1][j]
            dp[i][j] = true;
          }
        }
      }
    }
  
    return dp[sLen][pLen];
  };
  