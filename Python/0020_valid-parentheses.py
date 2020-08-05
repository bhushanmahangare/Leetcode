'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''

 class Solution:
    def isValid(self, s: str) -> bool:
        sum_s = 0
        num_dict = {
            '(': 1,
            ')': -1,
            '{': 100,
            '}': -100,
            '[': 10000,
            ']': -10000
        }
        nums = []
        for c in s:
            n = num_dict[c]
            if n > 0:
                nums.append(n)
            else:
                if len(nums) == 0 or nums.pop() != -n:
                    return False
            sum_s += n
            if sum_s < 0:
                return False
        return True if sum_s == 0 else False
