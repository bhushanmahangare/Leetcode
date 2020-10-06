<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 52. N-Queens-II
 * 
 * Hard
 * 
 * Implement pow(x, n), which calculates x raised to the power n (i.e. xn).
 * 
 * Example 1:
 * Input: x = 2.00000, n = 10
 * Output: 1024.00000
 * 
 * Example 2:
 * Input: x = 2.10000, n = 3
 * Output: 9.26100
 * 
 * Example 3:
 * Input: x = 2.00000, n = -2
 * Output: 0.25000
 * 
 * Explanation: 2-2 = 1/22 = 1/4 = 0.25
 * 
 *  Constraints:
 * -100.0 < x < 100.0
 * -231 <= n <= 231-1
 * -104 <= xn <= 104
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    var $tot = 0;
    /**
     * @param Integer $n
     * @return Integer
     */

    function totalNQueens($n) {
        $col = array_fill(0, $n, 0);
        $cur = 0;
        return self::totalQueens($n,$cur,$col);
    }
    
    function totalQueens($n,$cur,&$col){

        if($cur == $n) $this->tot++;
        
        else{
            for($i = 0; $i < $n; $i++){
                $ok = true;
                $col[$cur] = $i;
                for($j = 0; $j < $cur; $j++){
                    if($col[$cur] == $col[$j] || $cur+$col[$cur] == $j + $col[$j] || $cur-$col[$cur] == $j - $col[$j]){
                        $ok = false;
                        break;
                    }
                }
                if($ok){
                    self::totalQueens($n,$cur+1,$col);
                }
            }
        }
        return $this->tot;
    }
}
