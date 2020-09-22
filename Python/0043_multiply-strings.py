'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 43. Multiply Strings
 * 
 * Given two non-negative integers num1 and num2 represented as strings, return the product of 
 * num1 and num2, also represented as a string.
 * 
 * Example 1:
 * Input: num1 = "2", num2 = "3"
 * Output: "6"
 * 
 * Example 2:
 * Input: num1 = "123", num2 = "456"
 * Output: "56088"
 * 
 * Note:
 * The length of both num1 and num2 is < 110.
 * Both num1 and num2 contain only digits 0-9.
 * Both num1 and num2 do not contain any leading zero, except the number 0 itself.
 * You must not use any built-in BigInteger library or convert the inputs to integer directly.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''

class Solution:

     # Simple Two pass solution    

     def multiply(self, num1: str, num2: str) -> str:

         if(num1=='0' or num2=='0'):
             return '0'
        
         l,m = len(num1), len(num2)
         result = [0]*(l+m)
        
        
         # In first pass, get all individual digit pair products in result
		 
         for i in range(l-1,-1,-1):
             for j in range(m-1,-1,-1):               
                result[i+j+1] += int(num1[i]) * int(num2[j])
         
         # In second pass, in reverse direction, adjust the sum and carry  in each position in result. 
		 
         for i in range(len(result)-1,0,-1):
             carry=result[i]//10
             result[i] = result[i]%10
             result[i-1]+=carry
            
         # remove leading 0 if present
         if(result[0]==0):
             del result[0]           

         return ''.join(str(p) for p in result)