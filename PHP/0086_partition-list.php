<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 86. Partition List
 *
 * Medium
 *
 * Given the head of a linked list and a value x, partition it such that all nodes less than x
 * come before nodes greater than or equal to x.
 *
 * You should preserve the original relative order of the nodes in each of the two partitions.
 *
 * Example 1:
 * Input: head = [1,4,3,2,5,2], x = 3
 * Output: [1,2,2,4,3,5]
 *
 * Example 2:
 * Input: head = [2,1], x = 2
 * Output: [1,2]
 *
 * Constraints:
 * The number of nodes in the list is in the range [0, 200].
 * 100 <= Node.val <= 100
 * 200 <= x <= 200
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
     * @param Integer $x
     * @return ListNode
     */
    public function partition($head, $x)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }
        //split the answer into two part and then combine them, use prevPart and restPart as dummy heads;
        $prevPart = new ListNode(-1);
        $restPart = new ListNode(-1);
        $prev = $prevPart;
        $rest = $restPart;
        while ($head != null) {
            if ($head->val < $x) {
                $prev->next = new ListNode($head->val);
                $prev = $prev->next;
            } else {
                $rest->next = new ListNode($head->val);
                $rest = $rest->next;
            }
            $head = $head->next;
        }
        $tail = self::getTail($prevPart);
        //put `>= val` numbers at tail of `< val` numbers
        $tail->next = $restPart->next;
        return $prevPart->next;
    }
    
    public function getTail($head)
    {
        while ($head->next != null) {
            $head = $head->next;
        }
        return $head;
    }
}
