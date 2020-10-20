"""=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""
 
 class Solution:
    def lengthOfLastWord(self, s: str) -> int:
        sArr = s.split(' ')
        retLen = 0
        for word in sArr[::-1]:
            if word != '':
                retLen = len(word)
                break
        if(sArr[len(sArr)-1] == len(s)):
            return 0
        return retLen
