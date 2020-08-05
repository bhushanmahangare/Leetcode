<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 20. Valid Parentheses
 * Easy
 * 
 * Given a string containing just the characters '(', ')', '{', '}', '[' and ']', determine 
 * if the input string is valid.
 * 
 * An input string is valid if:
 *  1. Open brackets must be closed by the same type of brackets.
 *  2. Open brackets must be closed in the correct order.
 *
 * Note that an empty string is also considered valid.
 * Example 1:
 * Input: "()"
 * Output: true
 * 
 * Example 2:
 * Input: "()[]{}"
 * Output: true
 * 
 * Example 3:
 * Input: "(]"
 * Output: false
 * 
 * Example 4:
 * Input: "([)]"
 * Output: false
 * 
 * Example 5:
 * Input: "{[]}"
 * Output: true
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        $toClose=array_fill(0, strlen($s)>>1);
        $open=0;
        try{
            for($i=0; $i<strlen($s); ++$i){
                $c=$s[$i];
                $t=0;
                switch($c){
                    case '(':
                        ++$t;
                    case '[':
                        ++$t;
                    case '{':
                        $toClose[$open++]=$t;
                        break;
                    case ')':
                        ++$t;
                    case ']':
                        ++$t;
                    case '}':
                        if($toClose[--$open]!=$t) 
                            return false;
                }
            }
            return $open==0;
        } catch(OutOfBoundsException $x){
            return false;
        }    
    }
}
