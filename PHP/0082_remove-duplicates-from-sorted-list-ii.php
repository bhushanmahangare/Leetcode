<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 82. Remove Duplicates from Sorted List II
 *
 * Medium
 *
 * Given the head of a sorted linked list, delete all nodes that have duplicate numbers, leaving
 * only distinct numbers from the original list. Return the linked list sorted as well.
 *
 * Example 1:
 * Input: head = [1,2,3,3,4,4,5]
 * Output: [1,2,5]
 *
 * Example 2:
 * Input: head = [1,1,1,2,3]
 * Output: [2,3]
 *
 * Constraints:
 * The number of nodes in the list is in the range [0, 300].
 * -100 <= Node.val <= 100
 * The list is guaranteed to be sorted in ascending order.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 /**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val) { $this->val = $val; }
 * }
 */
class Solution
{

    /**
     * @param ListNode $head
     * @return ListNode
     */
    public function deleteDuplicates($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        $dummy = new ListNode(-1);
        $dummy->next = $head;
        $prev=$dummy;
        $slow=$dummy->next;
        $fast=$slow->next;
        while ($slow != null && $fast != null) {
            if ($slow->val == $fast->val) {
                while ($fast != null && $slow->val == $fast->val) {
                    $fast = $fast->next;
                }
                $prev->next = $fast;
                $slow = $prev->next;
                $fast = $slow == null ? null : $slow->next;
            } else {
                $prev = $slow;
                $slow = $slow->next;
                $fast = $fast->next;
            }
        }
        return $dummy->next;
    }
}
