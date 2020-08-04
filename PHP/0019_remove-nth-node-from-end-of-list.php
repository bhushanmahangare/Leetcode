<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 18. Remove Nth Node From End Of List
 * Medium
 * 
 * Given a linked list, remove the n-th node from the end of list and return its head.
 * 
 * Example:
 * Given linked list: 1->2->3->4->5, and n = 2.
 * After removing the second node from the end, the linked list becomes 1->2->3->5.
 * 
 * Note:
 * Given n will always be valid.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $n
     * @return ListNode
     */
    function removeNthFromEnd($head, $n) {
        $list = [];
        $size = 1;
        $a = $head;
        
        while($a->next != null){
            $list[] = $a;
            $a=$a->next;
            $size++;
        }
        $list[] = $a;
        
        $c = null;
        
        if($size==1){            
            return $c;
        }
        if($size==$n){
            $head=$head->next;
            return $head;
        }
        
        $b=$list[$size-$n-1];
        
        if($b->next->next == null)
            $b->next=null;
        else
            $b->next=$b->next->next;
        
        return $head;
    }
}