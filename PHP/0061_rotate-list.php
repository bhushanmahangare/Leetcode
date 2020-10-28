<?php
/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 61. Rotate List
 * 
 * Medium
 * 
 * Given a linked list, rotate the list to the right by k places, where k is non-negative.
 * 
 * Example 1:
 * Input: 1->2->3->4->5->NULL, k = 2
 * Output: 4->5->1->2->3->NULL
 * Explanation:
 * rotate 1 steps to the right: 5->1->2->3->4->NULL
 * rotate 2 steps to the right: 4->5->1->2->3->NULL
 * 
 * Example 2:
 * Input: 0->1->2->NULL, k = 4
 * Output: 2->0->1->NULL
 * 
 * Explanation:
 * rotate 1 steps to the right: 2->0->1->NULL
 * rotate 2 steps to the right: 1->2->0->NULL
 * rotate 3 steps to the right: 0->1->2->NULL
 * rotate 4 steps to the right: 2->0->1->NULL
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
class Solution {

    /**
     * @param ListNode $head
     * @param Integer $k
     * @return ListNode
     */
    function rotateRight($head, $k) {
        if($head == null){
            return $head;
        }
        $k = ($k == 0) ? 0 : $k % self::getLen($head);
        if($k == 0){
            return $head;
        }
        $head1 = self::reverse(null, $head);
        $dummyHead = new ListNode(0);
        $dummyHead->next = $head1;
        $cur = $dummyHead->next;
        $pre = $dummyHead;
        while($k > 0){
            $pre = $cur;
            $cur = $cur->next;
            $k--;
        }
        $pre->next = null;
        $head2 = self::reverse(null, $cur);
        return self::reverse($head2, $head1);
    }
    function getLen($head){
        $cnt = 0;
        while($head != null){
            $cnt++;
            $head = $head->next;
        }
        return $cnt;
    }
    function reverse($pre,$head) {
        $tmp;
        $cur = $head;
        while($cur != null) {
            $tmp = $cur->next;
            $cur->next = $pre;
            $pre = $cur;
            $cur = $tmp;
        }
        return $pre;
    }
}
