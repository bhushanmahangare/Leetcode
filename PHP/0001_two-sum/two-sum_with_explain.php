<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 1. Two Sum
 * 
 *  Given an array of integers, return indices of the two numbers such that they add up to a specific target.
 *  You may assume that each input would have exactly one solution, and you may not use the same element twice.
 *
 *  Example:
 *  Given nums = [2, 7, 11, 15], target = 9,
 *  Because nums[0] + nums[1] = 2 + 7 = 9,
 *  return [0, 1].
 *
 * Iteration   target 9 
 *  1st :    i = 0   array count count 6   Outerloop
 *   1st :  j = 1  (i + 1) array count 6   innerloop
 *     if  7 ==  9 - 2     if array(j)  == array(i) 
 *        return array(0 , 1);
 *
 *
 * Iteration  target 20
 *  1st :  i = 0   array count count 6   Outerloop
 *   1st :  j = 1  (i + 1) array count 6   innerloop
 *     if  7 ==  20 - 2  false   if array(j)  == array(i) 
 *   
 *   2nd : j = 2  (i + 1)     
 *
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    public function twoSum($nums, $target) : array {
	for ( $i = 0 ; $i < count($nums) ; $i++ ){
		echo "\n i : $i";
		for( $j = $i + 1 ; $j < count($nums) ; $j++ ){

		echo "\n j : $j";
                if( $nums[$j] == $target - $nums[$i] ){
                    return array($i,$j);
                }
            }
        }
    }
}

$arr = array(2,5,7,9,11,15);
$target = 9;

echo "Array ".print_r($arr,true)."Target sum $target \n";

$ob = new Solution;
list($i , $j) = $ob->twoSum($arr,$target);

echo "Position\n";
echo $i ."\t".$j."\n\n\n";


$target = 20;
echo "Array ".print_r($arr,true)."Target sum $target \n";
echo "Position\n";

list($i , $j) = $ob->twoSum($arr,$target);

echo $i ."\t".$j;
?>
