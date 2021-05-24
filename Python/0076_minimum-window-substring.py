""" =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 76. Minimum Window Substring
 *
 * Hard
 *
 * Given two strings s and t of lengths m and n respectively, return the minimum window in s
 * which will contain all the characters in t. If there is no such window in s that covers
 * all characters in t, return the empty string "".
 *
 * Note that If there is such a window, it is guaranteed that there will always be only
 * one unique minimum window in s.
 *
 * Example 1:
 * Input: s = "ADOBECODEBANC", t = "ABC"
 * Output: "BANC"
 *
 * Example 2:
 * Input: s = "a", t = "a"
 * Output: "a"
 *
 * Constraints:
 * m == s.length
 * n == t.length
 * 1 <= m, n <= 105
 * s and t consist of English letters.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-="""



class Solution:
    def minWindow(self, s: str, t: str) -> str:
        window_start,match,sub_start=0,0,0
        char_freq={}
        min_len = len(s)+1
        for char in t:
            if char not in char_freq:
                char_freq[char]=0
            char_freq[char]+=1
			
        # try to extend the range [window_start, window_end]
        for window_end in range(len(s)):
            right_char = s[window_end]
            if right_char in char_freq:
                char_freq[right_char]-=1
                if char_freq[right_char]>=0: # Count every matching of a character
                    match+=1
            
			# Shrink the window if we can, finish as soon as we remove a matched character
            while match==len(t):
                if min_len > window_end - window_start + 1:
                    min_len = window_end - window_start + 1
                    sub_start = window_start
                left_char=s[window_start]
                window_start+=1
                
                if left_char in char_freq:
				# Note that we could have redundant matching characters, therefore we'll decrement the
				# matched count only when a useful occurrence of a matched character is going out of the window
                    if char_freq[left_char]==0:
                        match-=1
                    char_freq[left_char]+=1
        if min_len > len(s):
            return ""
        return s[sub_start:sub_start + min_len]