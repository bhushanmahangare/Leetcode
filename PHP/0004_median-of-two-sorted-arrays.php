<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 4. Median of Two Sorted Arrays
 * Hard
 * 
 * There are two sorted arrays nums1 and nums2 of size m and n respectively.
 *  Find the median of the two sorted arrays. The overall run time complexity should be O(log (m+n)).
 * 
 * You may assume nums1 and nums2 cannot be both empty.
 * 
 * Example 1:
 * nums1 = [1, 3]
 * nums2 = [2]
 * The median is 2.0
 * 
 * Example 2:
 * nums1 = [1, 2]
 * nums2 = [3, 4]
 * The median is (2 + 3)/2 = 2.5
 * 
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {

        $array = range(0, count($nums1) + count($nums2) - 1);
        $p = 0; $q = 0;


        for( $i = 0; $i < count($array); $i++ )
        {
            if( ( $p < count($nums1) && $q < count($nums2) && $nums1[$p] <= $nums2[$q]) || $q == count($nums2) )
            {
                $array[$i] = $nums1[$p];
                $p++;
            }

            else if( ( $p < count($nums1) && $q < count($nums2) && $nums1[$p] > $nums2[$q] ) || $p == count($nums1) )
            {
                $array[$i] = $nums2[$q];
                $q++;
            }
        }

        if (intval(count($array) % 2 )== 0 )
        {
            return doubleval( $array[count($array) / 2] + $array[(count($array) / 2) - 1] ) / 2;
        }
        else
        {
            return doubleval( $array[count($array) / 2]);
        }
    }
}

$ob = new Solution;

$a = array(1, 3);
$b = array(2);

echo $ob->findMedianSortedArrays($a,$b);

echo "\n";

$a = array(1, 2);
$b = array(3 ,4);

echo $ob->findMedianSortedArrays($a,$b);
