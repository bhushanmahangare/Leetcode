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
 * Definition for singly-linked list.
 * function ListNode(val) {
 *     this.val = val;
 *     this.next = null;
 * }
 */

/**
 * @param {ListNode} head
 * @return {ListNode}
 */
var deleteDuplicates = function (head) {
    var root = new ListNode(-1);

    root.next = head;
    var pre = (head = root);

    while (pre) {
        var cur = pre.next;
        var isDup = false;

        while (cur && cur.next && cur.val === cur.next.val) {
            isDup = true;
            var next = cur.next;
            cur.next = next.next;
            next.next = null;
        }

        if (isDup) {
            pre.next = cur.next;
            cur.next = null;
            continue;
        }

        pre = cur;
    }

    return root.next;
};