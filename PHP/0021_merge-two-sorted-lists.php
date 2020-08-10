<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 21. Merge Two Sorted Lists
 * Easy
 * 
 * Merge two sorted linked lists and return it as a new sorted list. 
 * The new list should be made by splicing together the nodes of the first two lists.
 * 
 * Example:
 * Input:   1->2->4 ,   1->3->4
 * 
 * Output: 1->1->2->3->4->4
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
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2) {
        $res = new ListNode(0);
        $cur = $res;
        while ($l1 != null || $l2 != null) {
            if ($l1 == null) {
                $cur->next = new ListNode($l2->val);
                $l2 = $l2->next;
            } else if ($l2 == null) {
                $cur->next = new ListNode($l1->val);
                $l1 = $l1->next;
            } else {
                if ($l1->val < $l2->val) {
                    $cur->next = new ListNode($l1->val);
                    $l1 = $l1->next;
                } else {
                    $cur->next = new ListNode($l2->val);
                    $l2 = $l2->next;
                }
            }
            $cur = $cur->next;
        }
        
        return $res->next;
    }
}
