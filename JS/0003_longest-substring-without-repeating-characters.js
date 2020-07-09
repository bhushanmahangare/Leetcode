/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 3. Longest Substring Without Repeating Characters
 * Medium
 * 
 * Given a string, find the length of the longest substring without repeating characters.
 * 
 * Example 1:
 * Input: "abcabcbb"
 * Output: 3 
 * Explanation: The answer is "abc", with the length of 3. 
 * 
 * Example 2:
 * Input: "bbbbb"
 * Output: 1
 * Explanation: The answer is "b", with the length of 1.
 * 
 * Example 3:
 * Input: "pwwkew"
 * Output: 3
 * Explanation: The answer is "wke", with the length of 3. 
 * Note that the answer must be a substring, "pwke" is a subsequence and not a substring.
 * 
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {string} s
 * @return {number}
 */
// 100ms faster than ~79.85%
var lengthOfLongestSubstring = function(s) {
    let count = 0;
    let letterMap = new Map();
    for (var spacer = 0, current = 0; current < s.length; current++) {
      let letter = s[current];
      if (letterMap.has(letter)) {
        spacer = Math.max(letterMap.get(letter), spacer);
      }
      letterMap.set(letter, current + 1);
      count = Math.max(count, current - spacer + 1);
    }
    return count;
  };