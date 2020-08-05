/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package valid_parentheses

 func isValid(s string) bool {
	 m := map[rune]rune{
		 '(': ')',
		 '[': ']',
		 '{': '}',
	 }
	 stack := make([]rune, len(s))
	 top := 0
	 for _, c := range s {
		 switch c {
		 case '(', '[', '{':
			 stack[top] = m[c]
			 top++
		 case ')', ']', '}':
			 if top > 0 && stack[top-1] == c {
				 top--
			 } else {
				 return false
			 }
		 }
	 }
 
	 return top == 0
 }