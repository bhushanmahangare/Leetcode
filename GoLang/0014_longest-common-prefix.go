/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package longest_common_prefix

func longestCommonPrefix(strs []string) string {
	if len(strs) == 0 {
		return ""
	} else if len(strs) == 1 {
		return strs[0]
	}
	runesList := make([][]rune, len(strs))
	for index := range strs {
		runesList[index] = []rune(strs[index])
	}
	var ret []rune
	var currentRune rune
	length := 0
L:
	for {
		length++
		for index := range runesList {
			if len(runesList[index]) < length {
				break L
			}
			if index == 0 {
				currentRune = runesList[0][length-1]
			} else {
				if runesList[index][length-1] != currentRune {
					break L
				}
			}
		}
		ret = append(ret, currentRune)
	}
	return string(ret)
}
