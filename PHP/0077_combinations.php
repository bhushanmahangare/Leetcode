<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 77. Combinations
 *
 * Medium
 *
 * Given two integers n and k, return all possible combinations of k numbers out of the range [1, n].
 *
 * You may return the answer in any order.
 *
 * Example 1:
 * Input: n = 4, k = 2
 * Output:
 * [
 *  [2,4],
 *  [3,4],
 *  [2,3],
 *  [1,2],
 *  [1,3],
 *  [1,4],
 * ]
 *
 * Example 2:
 * Input: n = 1, k = 1
 * Output: [[1]]
 *
 * Constraints:
 * 1 <= n <= 20
 * 1 <= k <= n
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer[][]
     */
    public function combine($n, $k)
    {
        $list = [];
        self::backtrack($list, [], $n, 1, $k);
        return $list;
    }

    public function backtrack(&$list, $tempList, $n, $start, $k)
    {
        if (count($tempList) <= $k) {
            if (count($tempList) == $k) {
                array_push($list, $tempList);
            }
            for ($i = $start; $i <= $n; $i++) {
                array_push($tempList, $i);
                self::backtrack($list, $tempList, $n, $i + 1, $k);
                array_pop($tempList);
            }
        }
    }
}
