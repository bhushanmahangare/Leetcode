/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 30. Substring with Concatenation of All Words
 * Hard
 * 
 * You are given a string, s, and a list of words, words, that are all of the same length. 
 * Find all starting indices of substring(s) in s that is a concatenation of each word in 
 * words exactly once and without any intervening characters.
 * 
 * Example 1:
 * Input:   s = "barfoothefoobarman",
 * words = ["foo","bar"]
 * Output: [0,9]
 * 
 * Explanation: Substrings starting at index 0 and 9 are "barfoo" and "foobar" respectively.
 * The output order does not matter, returning [9,0] is fine too.
 * 
 * Example 2:
 * Input:
 * s = "wordgoodgoodgoodbestword",
 * words = ["word","good","best","word"]
 * Output: []
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
const f = (M, s, n, m, i) => {
    if (n === 0) return true;
    const w = s.substr(i, m);
    if (!M[w]) return false;
    --M[w];
    return f(M, s, n - 1, m, i + m);
};
var findSubstring = function(s, A) {
    const I = [];
    if (A.length === 0) return I;
    const M = {};
    for (let a of A) M[a] = !M[a] ? 1 : M[a] + 1;
    const n = A.length;
    const m = A[0].length;
    for (let i = 0; i < s.length - n * m + 1; ++i)
        if (f({...M}, s, n, m, i)) 
            I.push(i);
    return I;
};