'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''
class Solution:
    def longestValidParentheses(self, s: str) -> int:
        """
        :type s: str
        :rtype: int
        """
        stack, result = [-1], 0

        for index in range(len(s)):
        	if s[index] == '(':
        		stack.append(index)
        	else:
        		currIndex = stack.pop()
        		if currIndex == -1:
        			stack.append(index)
        		else:
        			result = max(result, index-currIndex+1)
        return result