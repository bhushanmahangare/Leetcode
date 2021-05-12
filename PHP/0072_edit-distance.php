<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 72. Edit Distance
 *
 * Hard
 *
 * Given two strings word1 and word2, return the minimum number of operations required to
 * convert word1 to word2.
 *
 * You have the following three operations permitted on a word:
 * Insert a character
 * Delete a character
 * Replace a character
 *
 * Example 1:
 * Input: word1 = "horse", word2 = "ros"
 * Output: 3
 *
 * Explanation:
 * horse -> rorse (replace 'h' with 'r')
 * rorse -> rose (remove 'r')
 * rose -> ros (remove 'e')
 *
 * Example 2:
 * Input: word1 = "intention", word2 = "execution"
 * Output: 5
 *
 * Explanation:
 * intention -> inention (remove 't')
 * inention -> enention (replace 'i' with 'e')
 * enention -> exention (replace 'n' with 'x')
 * exention -> exection (replace 'n' with 'c')
 * exection -> execution (insert 'u')
 *
 * Constraints:
 * 0 <= word1.length, word2.length <= 500
 * word1 and word2 consist of lowercase English letters.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param String $word1
     * @param String $word2
     * @return Integer
     */
    public function minDistance($word1, $word2)
    {
        $n1 = strlen($word1);
        $n2 = strlen($word2);
        if ($n2 > $n1) {
            return self::minDistance($word2, $word1);
        }
        $dp = array_fill(0, $n2+1, 0);
        for ($j = 0; $j <= $n2; $j++) {
            $dp[$j] = $j;
        }
        for ($i = 1; $i <= $n1; $i++) {
            $pre = $dp[0];
            $dp[0] = $i;
            for ($j = 1; $j <= $n2; $j++) {
                $tmp = $dp[$j];
                $dp[$j] = $word1[$i-1] != $word2[$j-1]
                    ? 1 + min($pre, min($dp[$j], $dp[$j-1]))
                    : $pre;
                $pre = $tmp;
            }
        }
        return $dp[$n2];
    }
}
