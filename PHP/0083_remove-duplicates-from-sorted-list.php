<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 83. Remove Duplicates from Sorted List
 *
 * Easy
 *
 * Given the head of a sorted linked list, delete all duplicates such that each element appears
 * only once. Return the linked list sorted as well.
 *
 * Example 1:
 * Input: head = [1,1,2]
 * Output: [1,2]
 *
 * Example 2:
 * Input: head = [1,1,2,3,3]
 * Output: [1,2,3]
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
        if ($head==null || $head->next == null) {
            return $head;
        }
        $prev = $head;
        $node = $head->next;
        while ($node!= null) {
            if ($node->val != $prev->val) {
                $prev = $node;
                $node = $node->next;
            } else {
                $prev->next = $node->next;
                $node = $node->next;
            }
        }
        return $head;
    }
}
