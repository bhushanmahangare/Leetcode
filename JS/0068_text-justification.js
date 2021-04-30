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

/**
 * @param {string[]} words
 * @param {number} maxWidth
 * @return {string[]}
 */
var fullJustify = function (words, maxWidth) {
    var result = [];
    var start = 0;
    var end = -1;
    var currentWordsLen = 0;
    var i = 0;

    while (i < words.length) {
        if (words[i].size > maxWidth) {
            return result;
        }

        var newLen = currentWordsLen + (end - start + 1) + words[i].length; // current words len + their spaces + new word

        if (newLen <= maxWidth) {
            // words[i] can fit in the current line
            end = i;
            currentWordsLen += words[i].length;
            i++;
        } else {
            var line = createLine(
                words,
                maxWidth,
                start,
                end,
                currentWordsLen,
                false
            );
            result.push(line);
            start = i;
            end = i - 1;
            currentWordsLen = 0;
        }
    }

    var lastLine = createLine(words, maxWidth, start, end, currentWordsLen, true);
    result.push(lastLine);
    return result;
};

function createLine(words, maxWidth, start, end, currentWordsLen, isLast) {
    var result = "";
    if (start < 0 || end >= words.length) {
        return result;
    }

    result += words[start]; // consume the first word
    var numberOfWords = end - start + 1; // number of words to insert in this line

    // special case: one word or last line - left justified
    if (numberOfWords === 1 || isLast) {
        for (var i = start + 1; i <= end; i++) {
            // start from start + 1 since we already append the first word
            result += " " + words[i];
        }

        var remainingSpaces = maxWidth - currentWordsLen - (numberOfWords - 1);
        for (i = 0; i < remainingSpaces; i++) {
            result += " ";
        }

        return result;
    }

    var k = parseInt((maxWidth - currentWordsLen) / (numberOfWords - 1));
    var m = (maxWidth - currentWordsLen) % (numberOfWords - 1);

    for (i = start + 1; i <= end; i++) {
        // start from start + 1 since we already append the first word
        var nspace = i - start <= m ? k + 1 : k;

        for (var j = 0; j < nspace; j++) {
            result += " ";
        }

        result += words[i];
    }

    return result;
}