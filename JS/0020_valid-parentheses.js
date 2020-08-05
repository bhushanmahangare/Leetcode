/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 20. Valid Parentheses
 * Easy
 * 
 * Given a string containing just the characters '(', ')', '{', '}', '[' and ']', determine 
 * if the input string is valid.
 * 
 * An input string is valid if:
 *  1. Open brackets must be closed by the same type of brackets.
 *  2. Open brackets must be closed in the correct order.
 *
 * Note that an empty string is also considered valid.
 * Example 1:
 * Input: "()"
 * Output: true
 * 
 * Example 2:
 * Input: "()[]{}"
 * Output: true
 * 
 * Example 3:
 * Input: "(]"
 * Output: false
 * 
 * Example 4:
 * Input: "([)]"
 * Output: false
 * 
 * Example 5:
 * Input: "{[]}"
 * Output: true
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 /**
 * @param {string} s
 * @return {boolean}
 */

var isValid = function(s) {
  if (s.length === 0) return true;
  else if (s.length === 1) return false;

  let stack = [];
  let dict = {
    "}": "{",
    ")": "(",
    "]": "["
  };

  for (var i = 0; i < s.length; i++) {
    if (s[i] === "(" || s[i] === "[" || s[i] === "{") {
      stack.push(s[i]);
    } else if (dict[s[i]] === stack.pop()) {
      continue;
    } else {
      return false;
    }
  }

  return stack.length === 0;
};

