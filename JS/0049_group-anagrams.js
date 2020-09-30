/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 49. Group Anagrams
 * 
 * Medium
 * 
 * Given an array of strings strs, group the anagrams together. You can return the answer in any order.
 * 
 * An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
 * typically using all the original letters exactly once.
 * 
 * Example 1:
 * Input: strs = ["eat","tea","tan","ate","nat","bat"]
 * Output: [["bat"],["nat","tan"],["ate","eat","tea"]]
 * 
 * Example 2:
 * Input: strs = [""]
 * Output: [[""]]
 * 
 * Example 3:
 * Input: strs = ["a"]
 * Output: [["a"]]
 * 
 * Constraints:
 * 1 <= strs.length <= 104
 * 0 <= strs[i].length <= 100
 * strs[i] consists of lower-case English letters.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/


 /**
 * @param {string[]} strs
 * @return {string[][]}
 */
var groupAnagrams = function(strs) {
    var hash = {};
  
    for (var i = 0; i < strs.length; i++) {
      var str = strs[i];
  
      var key = sort(str);
  
      hash[key] = hash[key] || [];
      hash[key].push(str);
    }
  
    var result = [];
    for (i in hash) {
      result.push(hash[i]);
    }
  
    return result;
  };
  
  var sort = function(s) {
    var arr = s.split("");
  
    arr.sort((a, b) => (a > b ? 1 : -1));
    return arr.join("");
  };
  


  // Use bucket sort, much faster
  
  /**
   * @param {string[]} strs
   * @return {string[][]}
   */
  var groupAnagrams = function(strs) {

    var hash = {};

    var base = "a".charCodeAt(0);
  
    for (var i = 0; i < strs.length; i++) {

      var arr = Array(26).fill(0);

      for (var j = 0; j < strs.length; j++) {

        var code = strs[j].charCodeAt(0) - base;
        arr[code]++;

      }

      var key = arr.join("");
      hash[key] = hash[key] || [];
      hash[key].push(strs[i]);

    }
  
    var res = [];
  
    for (i in hash) {

      res.push(hash[i]);

    }
  
    return res;
  };
  