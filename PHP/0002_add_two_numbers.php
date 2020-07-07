<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 2.  Add Two Numbers
 * 
 * You are given two non-empty linked lists representing two non-negative integers. 
 * The digits are stored in reverse order and each of their nodes contain a single digit. 
 * Add the two numbers and return it as a linked list.
 * 
 * You may assume the two numbers do not contain any leading zero, except the number 0 itself.
 * Example:
 * Input: (2 -> 4 -> 3) + (5 -> 6 -> 4)
 * Output: 7 -> 0 -> 8
 * Explanation: 342 + 465 = 807.
 * 
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/


 /*
 * Definition for a singly-linked list.
 */ 
 class ListNode {

    public $val = 0;
    public $next = null;
    
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}
 
class Solution {

    /*
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {

        $dummyHead = new ListNode(0);

        $p = $l1; $q = $l2; $curr = $dummyHead;
        
        $carry = 0;

        while ($p != null || $q != null) {

            $x = ($p != null) ? $p->val : 0;
            $y = ($q != null) ? $q->val : 0;
            $sum = $carry + $x + $y;
            $carry = intval($sum / 10);
            $curr->next = new ListNode($sum % 10);
            $curr = $curr->next;
            if ($p != null) $p = $p->next;
            if ($q != null) $q = $q->next;
        }

        if ($carry > 0) {
            $curr->next = new ListNode($carry);
        }

        return $dummyHead->next;
    }
}
?>