/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 58. Length of Last Word
 * 
 * Easy
 * 
 * Given a string s consists of upper/lower-case alphabets and empty space characters ' ', 
 * return the length of last word (last word means the last appearing word if we loop from 
 * left to right) in the string.
 * If the last word does not exist, return 0.
 * 
 * Note: A word is defined as a maximal substring consisting of non-space characters only.
 * 
 * Example:
 * Input: "Hello World"
 * Output: 5
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

/**
 * @param {string} s
 * @return {number}
 */
var lengthOfLastWord = function(s) {

    if (s === null || s.length === 0) {
      return 0;
    }
  
    var count = 0;
  
    for (var i = s.length; i--; ) {
      if (s[i] === " ") {
        if (count === 0) {
          continue;
        } else {
          return count;
        }
      }
  
      count++;
    }
  
    return count;
    
  };
  