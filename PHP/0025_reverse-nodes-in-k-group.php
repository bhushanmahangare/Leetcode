<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 25. Reverse Nodes in K-Group
 * Hard
 * 
 * Given a linked list, reverse the nodes of a linked list k at a time and return its modified list.
 * 
 * k is a positive integer and is less than or equal to the length of the linked list. 
 * If the number of nodes is not a multiple of k then left-out nodes in the end should remain as it is.
 * 
 * 
 * Example:
 * 
 * Given this linked list: 1->2->3->4->5
 * 
 * For k = 2, you should return: 2->1->4->3->5
 * 
 * For k = 3, you should return: 3->2->1->4->5
 * 
 * Note:
 * Only constant extra memory is allowed.
 * You may not alter the values in the list's nodes, only nodes itself may be changed.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function reverseKGroup($head, $k) {
        
        if($head==null || $k<2){
            return $head;
        }

        $temp = null;
        $curr = $head;
        $prev = null;
        $count = 0;
        
        while($count<$k && $curr!=null){
            $temp = $curr->next;
            $curr->next = $prev;
            $prev = $curr;
            $curr = $temp;
            $count++;
        }
        
        if($count<$k){
            while($count!=0){
                $temp = $prev->next;
                $prev->next = $curr;
                $curr = $prev;
                $prev = $temp;
                $count--;
            }
            return $curr;
        }
        
        $head->next = self::reverseKGroup($curr,$k);
        
        return $prev;
    }
}