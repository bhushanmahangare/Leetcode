'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 7. Reverse Integer
 * Easy
 * Given a 32-bit signed integer, reverse digits of an integer.
 * 
 * Example 1:
 * Input: 123
 * Output: 321
 * 
 * Example 2:
 * Input: -123
 * Output: -321
 * 
 * Example 3:
 * Input: 120
 * Output: 21
 * 
 * Note:
 * Assume we are dealing with an environment which could only store integers within the 32-bit 
 * signed integer range: [−231,  231 − 1]. For the purpose of this problem, 
 * assume that your function returns 0 when the reversed integer overflows.
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''
class Solution:
    def reverse(self, x: int) -> int:
        if x > 0:  # handle positive numbers  
            a =  int(str(x)[::-1])  
        if x <=0:  # handle negative numbers  
            a = -1 * int(str(x*-1)[::-1])  
        # handle 32 bit overflow  
        mina = -2**31  
        maxa = 2**31 - 1  
        if a not in range(mina, maxa):  
            return 0  
        else:  
            return a