<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 42. Trapping Rain Water
 * Given n non-negative integers representing an elevation map where the width of each bar is 1, 
 * compute how much water it is able to trap after raining.
 * 
 * The above elevation map is represented by array [0,1,0,2,1,0,1,3,2,1,2,1]. 
 * In this case, 6 units of rain water (blue section) are being trapped. 
 * Thanks Marcos for contributing this image!
 * 
 * Example:
 * Input: [0,1,0,2,1,0,1,3,2,1,2,1]
 * Output: 6
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($height) {
        if($height == null || count($height) == 0) return 0;
        
        $max = 0;
        $memo = array_fill(0, count($height), 0);
        for($i = 0; $i < count($height); $i++){
            $max = max($max, $height[$i]);
            $memo[$i] = $max;
        }
        
        $max = 0;
        for($i = count($height) - 1; $i >= 0; $i--){
            $max = max($max, $height[$i]);
            $memo[$i] = min($memo[$i], $max);
        }
        
        $volume = 0;
        for($i = 0; $i < count($height); $i++){
            $volume += $memo[$i] - $height[$i];
        }
        
        return $volume;
    }
}
