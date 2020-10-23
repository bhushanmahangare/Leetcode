<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 60. Permutation Sequence
 * 
 * Hard 
 * 
 * The set [1,2,3,...,n] contains a total of n! unique permutations.
 *  
 * By listing and labeling all of the permutations in order, we get the following sequence for n = 3:
 * "123"
 * "132"
 * "213"
 * "231"
 * "312"
 * "321"
 * 
 * Given n and k, return the kth permutation sequence.
 * 
 * Note:
 * Given n will be between 1 and 9 inclusive.
 * Given k will be between 1 and n! inclusive.
 * 
 * Example 1:
 * Input: n = 3, k = 3
 * Output: "213"
 * 
 * Example 2:
 * Input: n = 4, k = 9
 * Output: "2314"
 * 
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return String
     */
    function getPermutation($n, $k) {
        $k--;
        $mod = 1;
        $list = [];
        for ($i = 1; $i <= $n; ++$i) {
            array_push($list, $i);
            $mod *= $i;
        }
        $sb = "";
        for ($i = 1; $i <= $n; ++$i) {
            $mod = intval($mod / ($n-$i+1));
            $idx = intval($k/$mod);
            $sb .= array_splice($list, $idx, 1)[0];
            $k = $k % $mod;
        }
        return $sb;
    }
}
?>