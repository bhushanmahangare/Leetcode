/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 68. Text Justification
 *
 * Hard
 *
 * Given an array of words and a width maxWidth, format the text such that each line has exactly
 * maxWidth characters and is fully (left and right) justified.
 *
 * You should pack your words in a greedy approach; that is, pack as many words as you can in each
 * line. Pad extra spaces ' ' when necessary so that each line has exactly maxWidth characters.
 *
 * Extra spaces between words should be distributed as evenly as possible. If the number of
 * spaces on a line do not divide evenly between words, the empty slots on the left will be
 * assigned more spaces than the slots on the right.
 *
 * For the last line of text, it should be left justified and no extra space is inserted between words.
 *
 * Note:
 * A word is defined as a character sequence consisting of non-space characters only.
 * Each word's length is guaranteed to be greater than 0 and not exceed maxWidth.
 * The input array words contains at least one word.
 *
 * Example 1:
 * Input: words = ["This", "is", "an", "example", "of", "text", "justification."], maxWidth = 16
 * Output:
 * [
 *      "This    is    an",
 *      "example  of text",
 *      "justification.  "
 * ]
 *
 * Example 2:
 * Input: words = ["What","must","be","acknowledgment","shall","be"], maxWidth = 16
 * Output:
 * [
 *      "What   must   be",
 *      "acknowledgment  ",
 *      "shall be        "
 * ]
 *
 * Explanation: Note that the last line is "shall be    " instead of "shall     be", because the
 * last line must be left-justified instead of fully-justified.
 *
 * Note that the second line is also left-justified becase it contains only one word.
 *
 * Example 3:
 * Input: words = ["Science","is","what","we","understand","well","enough","to","explain","to",
 * "a","computer.","Art","is","everything","else","we","do"], maxWidth = 2
 *
 * Output:
 * [
 *      "Science  is  what we",
 *      "understand      well",
 *      "enough to explain to",
 *      "a  computer.  Art is",
 *      "everything  else  we",
 *      "do                  "
 * ]
 *
 * Constraints:
 * 1 <= words.length <= 300
 * 1 <= words[i].length <= 20
 * words[i] consists of only English letters and symbols.
 * 1 <= maxWidth <= 100
 * words[i].length <= maxWidth
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

import "strings"

func fullJustify(words []string, maxWidth int) []string {
	res := []string{}
	temp := []string{}
	width := 0
	isLast := false

	for !isLast {
		words, temp, width, isLast = split(words, maxWidth)
		res = append(res, combine(temp, width, maxWidth, isLast))
	}

	return res
}


func split(words []string, maxWidth int) ([]string, []string, int, bool) {
	temp := make([]string, 1)
	temp[0] = words[0]
	width := len(words[0])

	i := 1
	for ; i < len(words); i++ {
		if width+len(temp)+len(words[i]) > maxWidth {
			break
		}
		temp = append(temp, words[i])
		width += len(words[i])
	}

	return words[i:], temp, width, i == len(words)
}

func combine(words []string, width, maxWidth int, isLast bool) string {
	wordCount := len(words)
	if wordCount == 1 || isLast {
		return combineSpecial(words, maxWidth)
	}
	spaceCount := wordCount - 1
	spaces := makeSpaces(spaceCount, maxWidth-width)

	res := ""
	for i, v := range spaces {
		res += words[i] + v
	}
	if wordCount > 1 {
		res += words[wordCount-1]
	}

	return res
}

func makeSpaces(Len, count int) []string {
	res := make([]string, Len)
	for i := 0; i < count; i++ {
		res[i%Len] += " "
	}

	return res
}

func combineSpecial(words []string, maxWidth int) string {
	res := strings.Join(words, " ")

	for len(res) < maxWidth {
		res += " "
	}

	return res
}