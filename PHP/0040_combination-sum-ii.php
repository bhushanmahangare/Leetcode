<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 39. Combination Sum II
 * Medium
 * 
 * Given a collection of candidate numbers (candidates) and a target number (target), find all 
 * unique combinations in candidates where the candidate numbers sums to target.
 * 
 * Each number in candidates may only be used once in the combination.
 * 
 * Note:
 * All numbers (including target) will be positive integers.
 * The solution set must not contain duplicate combinations.
 * 
 * 
 * Example 1:
 * Input: candidates = [10,1,2,7,6,1,5], target = 8,
 * A solution set is:
 * [
 *   [1, 7],
 *   [1, 2, 5],
 *   [2, 6],
 *   [1, 1, 6]
 * ]
 * 
 * 
 * Example 2:
 * Input: candidates = [2,5,2,1,2], target = 5,
 * A solution set is:
 * [
 *   [1,2,2],
 *   [5]
 * ]
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum2($cand, $target) {
        sort($cand);
        $res = [];
        $path = [];
        self::dfs_com($cand, 0, $target, $path, $res);
        return $res;
    }

    function dfs_com($cand, $cur, $target, $path, &$res) {
        if ($target == 0) {
            array_push($res, $path);
            return;
        }
        if ($target < 0) return;
        for ($i = $cur; $i < count($cand); $i++){
            if ($i > $cur && $cand[$i] == $cand[$i-1]) continue;
            array_push($path, $cand[$i]);
            self::dfs_com($cand, $i+1, $target - $cand[$i], $path, $res);
            array_pop($path);
        }
    }
    
}
