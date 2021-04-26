<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 66. Plus One
 *
 * Easy
 *
 * Given a non-empty array of decimal digits representing a non-negative integer,
 * increment one to the integer.
 *
 * The digits are stored such that the most significant digit is at the head of the list,
 * and each element in the array contains a single digit.
 *
 * You may assume the integer does not contain any leading zero, except the number 0 itself.
 *
 * Example 1:
 * Input: digits = [1,2,3]
 * Output: [1,2,4]
 * Explanation: The array represents the integer 123.
 *
 * Example 2:
 * Input: digits = [4,3,2,1]
 * Output: [4,3,2,2]
 * Explanation: The array represents the integer 4321.
 *
 * Example 3:
 * Input: digits = [0]
 * Output: [1]
 *
 * Constraints:
 * 1 <= digits.length <= 100
 * 0 <= digits[i] <= 9
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

class Solution
{

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    public function plusOne($digits)
    {
        $carry=1;
        for ($i=count($digits)-1;$i>=0;$i--) {
            $temp=($digits[$i]+$carry)%10;
            $carry=intval(($digits[$i]+$carry)/10);
            $digits[$i]=$temp;
        }
        if ($carry==0) {
            return $digits;
        } else {
            $res=array_fill(0, count($digits) + 1, 0);
            $res[0]=$carry;
            for ($i=0;$i<count($digits);$i++) {
                $res[$i+1]=$digits[$i];
            }
            return $res;
        }
    }
}
