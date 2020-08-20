'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 30. Substring with Concatenation of All Words
 * Hard
 * 
 * You are given a string, s, and a list of words, words, that are all of the same length. 
 * Find all starting indices of substring(s) in s that is a concatenation of each word in 
 * words exactly once and without any intervening characters.
 * 
 * Example 1:
 * Input:   s = "barfoothefoobarman",
 * words = ["foo","bar"]
 * Output: [0,9]
 * 
 * Explanation: Substrings starting at index 0 and 9 are "barfoo" and "foobar" respectively.
 * The output order does not matter, returning [9,0] is fine too.
 * 
 * Example 2:
 * Input:
 * s = "wordgoodgoodgoodbestword",
 * words = ["word","good","best","word"]
 * Output: []
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''

 import copy
class Solution:
    def findSubstring(self, s: str, words: List[str]) -> List[int]:
        if not s or not words:
            return []
        n = len(words)
        m = len(words[0])
        res=[]
        dict={}
        for i in range(n):
            if words[i] in dict:
                dict[words[i]] += 1
            else:
                dict[words[i]] = 1
        for j in range(len(s)-n*m+1):
            map=copy.deepcopy(dict)
            k = n
            l = j
            while k>0:
                if s[l:l+m] not in map or map[s[l:l+m]]<1:
                    break
                else:
                    map[s[l:l+m]]-=1
                    k-=1
                    l+=m
            if k==0:
                res.append(j)
        return res