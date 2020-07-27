'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 14. Longest Common Prefix
 * Easy
 * 
 * Write a function to find the longest common prefix string amongst an array of strings.
 * 
 * If there is no common prefix, return an empty string "".
 * Example 1:
 * Input: ["flower","flow","flight"]
 * Output: "fl"
 * 
 * Example 2:
 * Input: ["dog","racecar","car"]
 * Output: ""
 * Explanation: There is no common prefix among the input strings.
 * 
 * Note:
 * All given inputs are in lowercase letters a-z.
 *  
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''
class Solution(object):
    def longestCommonPrefix(self, strs):
        if len(strs) == 0:
            return ""
        pre = ""
        min_len = min(len(ele) for ele in strs)
        done = False
        
        for i in range (min_len):
            test_char = strs[0][i]
            for s in strs[1:]:
                if s[i] != test_char:
                    done = True
            if done:
                break
            pre += test_char
        
        return pre