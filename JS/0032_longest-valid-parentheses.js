/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 32. Longest Valid Parentheses
 * Hard
 * 
 * Given a string containing just the characters '(' and ')', find the length of the longest 
 * valid (well-formed) parentheses substring.
 * 
 * Example 1:
 * Input: "(()"
 * Output: 2
 * Explanation: The longest valid parentheses substring is "()"
 * 
 * Example 2:
 * Input: ")()())"
 * Output: 4
 * Explanation: The longest valid parentheses substring is "()()"
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {string} s
 * @return {number}
 */
var longestValidParentheses = function(s) {
    let track = { 0: -1 };
    
    let max = 0;
    let level = 0;
    for (let i = 0; i < s.length; i++) {
        if (s[i] === '(') {
            level++;
            track[level] = i;
        } else {
            level--;
            if (level < 0) {
                level = 0;
                track = { 0: i };
            } else {
                if (level in track) {
                    max = Math.max(max, i - track[level]);
                }
            }
        }
    }
    
    return max;
};