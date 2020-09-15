<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 39. Combination Sum
 * Medium
 * 
 * Given a set of candidate numbers (candidates) (without duplicates) and a target number (target), 
 * find all unique combinations in candidates where the candidate numbers sums to target.
 * 
 * The same repeated number may be chosen from candidates unlimited number of times.
 * 
 * Note:
 * All numbers (including target) will be positive integers.
 * The solution set must not contain duplicate combinations.
 * 
 * Example 1:
 * Input: candidates = [2,3,6,7], target = 7,
 * A solution set is:
 * [ 
 *  [7],
 *  [2,2,3]
 * ]
 * 
 * Example 2:
 * Input: candidates = [2,3,5], target = 8,
 * A solution set is:
 * [
 *  [2,2,2,2],
 *  [2,3,3],
 *  [3,5]
 * ]
 * 
 *  Constraints:
 * 1 <= candidates.length <= 30
 * 1 <= candidates[i] <= 200
 * Each element of candidate is unique.
 * 1 <= target <= 500
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    public function __construct() {
        $this->sol = [];
        $this->nums = null;
    }

    /**
     * @param Integer[] $candidates
     * @param Integer $target
     * @return Integer[][]
     */
    function combinationSum($candidates, $target) {
        sort($candidates);
        $this->nums = $candidates;
        $temp = [];
        self::search($target, $temp, 0);
        return $this->sol;
    }
    
    function search($target, $list, $start){
        if ($target == 0) {
			array_push($this->sol, $list);
			return;
		}
        for ($i = $start; $i < count($this->nums); $i++){
            if ($this->nums[$i] > $target) break;
            else {
                array_push($list, $this->nums[$i]);
                self::search($target - $this->nums[$i], $list, $i);
                array_pop($list);
            }
        }
    }
}
