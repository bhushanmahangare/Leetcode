/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 44. Wildcard Matching
 * 
 * Given an input string (s) and a pattern (p), implement wildcard pattern matching with 
 * support for '?' and '*'.
 * 
 * '?' Matches any single character.
 * '*' Matches any sequence of characters (including the empty sequence).
 * The matching should cover the entire input string (not partial).
 * 
 * Note:
 * s could be empty and contains only lowercase letters a-z.
 * p could be empty and contains only lowercase letters a-z, and characters like ? or *.
 * 
 * 
 * Example 1:
 * Input:
 * s = "aa"
 * p = "a"
 * Output: false
 * Explanation: "a" does not match the entire string "aa".
 * 
 * Example 2:
 * Input:
 * s = "aa"
 * p = "*"
 * Output: true
 * Explanation: '*' matches any sequence.
 * 
 * Example 3:
 * Input:
 * s = "cb"
 * p = "?a"
 * Output: false
 * Explanation: '?' matches 'c', but the second letter is 'a', which does not match 'b'.
 * 
 * Example 4:
 * Input:
 * s = "adceb"
 * p = "*a*b"
 * Output: true
 * Explanation: The first '*' matches the empty sequence, while the second '*' matches the substring "dce".
 * 
 * Example 5:
 * Input:
 * s = "acdcb"
 * p = "a*c?b"
 * Output: false
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 // Implement wildcard pattern matching with support for '?' and '*'.

// '?' Matches any single character.
// '*' Matches any sequence of characters (including the empty sequence).

// The matching should cover the entire input string (not partial).

// The function prototype should be:
// bool isMatch(const char *s, const char *p)

// Some examples:
// isMatch("aa","a") → false
// isMatch("aa","aa") → true
// isMatch("aaa","aa") → false
// isMatch("aa", "*") → true
// isMatch("aa", "a*") → true
// isMatch("ab", "?*") → true
// isMatch("aab", "c*a*b") → false
// Hide Company Tags Google Snapchat Facebook
// Hide Tags Dynamic Programming Backtracking Greedy String
// Hide Similar Problems (H) Regular Expression Matching

/**
 * @param {string} s
 * @param {string} p
 * @return {boolean}
 */

var matchChar = function(c, p) {
    return p === "?" || p === c;
  };
  var isMatch = function(s, p) {
    if (s === null || p === null) {
      return false;
    }
  
    var idxS = 0;
    var idxP = 0;
  
    var lenS = s.length;
    var lenP = p.length;
  
    var back = false;
    var preS = 0;
    var preP = 0;
  
    while (idxS < lenS) {
      var charS = s[idxS];
      var charP = p[idxP];
  
      if (idxP < lenP && matchChar(s[idxS], p[idxP])) {
        idxP++;
        idxS++;
      } else if (idxP < lenP && p[idxP] === "*") {
        while (idxP < lenP && p[idxP] === "*") {
          idxP++;
        }
  
        back = true;
        preS = idxS;
        preP = idxP;
      } else if (back) {
        // since * means any sequence including ''. We can use greedy approach
        // str = "abefcdgiescdfimde" pattern = "ab*cd?i*de"
        // first * is "ef" first ? is "g" second * is escdfim
        idxS = ++preS;
        idxP = preP;
        // preP is the pattern index after *
        // even idxP got advanced by first the condition idxP < lenP && matchChar(s[idxS], p[idxP])
        // when the first and second condition don't work out, we backtrack of using the last wild card position.
      } else {
        return false;
      }
    }
  
    while (idxP < lenP && p[idxP] === "*") {
      idxP++;
    }
  
    if (idxS === lenS && idxP === lenP) {
      return true;
    }
  
    return false;
  };
  