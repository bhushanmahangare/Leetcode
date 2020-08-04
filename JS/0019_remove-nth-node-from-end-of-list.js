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
 * Definition for singly-linked list.
 * function ListNode(val) {
 *     this.val = val;
 *     this.next = null;
 * }
 */
 /**
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */
/**
 * @param {ListNode} head
 * @param {number} n
 * @return {ListNode}
 */
var removeNthFromEnd = function(head, n) {
  var n1 = new ListNode();
  var n2 = new ListNode();
  var dummy = n2;

  n1.next = head;
  n2.next = head;

  while (n > 0 && n1) {
    n1 = n1.next;
    n--;
  }

  if (n > 0) {
    return head;
  }

  while (n1 && n1.next) {
    n1 = n1.next;
    n2 = n2.next;
  }

  n2.next = n2.next.next;

  return dummy.next;
};

// One pass, 64ms faster than ~85.22% and 33.8mb less than 100%
var removeNthFromEnd = function(head, n) {
  if (head === null) return head;

  let nodeMap = new Map();
  let current = head;
  let count = 0;

  while (current != null) {
    nodeMap.set(count, current);
    current = current.next;
    count += 1;
  }

  let nthNode = count - n;

  if (nodeMap.has(nthNode)) {
    let target = nodeMap.get(nthNode);

    if (nthNode === 0) {
      let next = target.next;
      target.next = null;
      return next;
    } else {
      let prev = nodeMap.get(nthNode - 1);
      prev.next = target.next;
      target.next = null;
    }
  }

  return head;
};
