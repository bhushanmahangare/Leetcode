<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 59. Spiral Matrix II
 * 
 * Medium
 * 
 * Given a positive integer n, generate a square matrix filled with elements from 1 to n2 in 
 * spiral order.
 * 
 * Example:
 * Input: 3
 * 
 * Output:
 * [
 *  [ 8, 9, 4 ]
 *  [ 7, 6, 5 ]
 *  [ 1, 2, 3 ],
 * ]
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param Integer $n
     * @return Integer[][]
     */
    function generateMatrix($n) {

        $res = array_fill(0, $n, array_fill(0, $n, 0));

        $next = 1;

        for( $k = 0; $k <intval($n/2)+ $n %2; $k++ ){

            $i = $k; 
            
            for($j=$i;$j<$n-$k;$j++) $res[$i][$j] = $next++;

            for(--$j,++$i;$i<$n-$k;$i++) $res[$i][$j] = $next++;

            for(--$j,--$i;$j>=$k;$j--)$res[$i][$j]=$next++;

            for(++$j,--$i;$i>$k;$i--)$res[$i][$j]=$next++;

        }
        return $res;
    }
}
