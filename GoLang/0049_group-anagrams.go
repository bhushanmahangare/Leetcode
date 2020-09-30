/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 49. Group Anagrams
 * 
 * Medium
 * 
 * Given an array of strings strs, group the anagrams together. You can return the answer in any order.
 * 
 * An Anagram is a word or phrase formed by rearranging the letters of a different word or phrase, 
 * typically using all the original letters exactly once.
 * 
 * Example 1:
 * Input: strs = ["eat","tea","tan","ate","nat","bat"]
 * Output: [["bat"],["nat","tan"],["ate","eat","tea"]]
 * 
 * Example 2:
 * Input: strs = [""]
 * Output: [[""]]
 * 
 * Example 3:
 * Input: strs = ["a"]
 * Output: [["a"]]
 * 
 * Constraints:
 * 1 <= strs.length <= 104
 * 0 <= strs[i].length <= 100
 * strs[i] consists of lower-case English letters.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

func groupAnagrams(ss []string) [][]string {

	tmp := make(map[int][]string, len(ss)/2)

	for _, s := range ss {

		c := encode(s)
		tmp[c] = append(tmp[c], s)

	}

	res := make([][]string, 0, len(tmp))
	for _, v := range tmp {
		res = append(res, v)
	}

	return res
}

var prime = []int{5, 71, 37, 29, 2, 53, 59, 19, 11, 83, 79, 31, 43, 13, 7, 67, 97, 23, 17, 3, 41, 73, 47, 89, 61, 101}

func encode(s string) int {
	res := 1
	for i := range s {
		res *= prime[s[i]-'a']
	}
	return res
}
