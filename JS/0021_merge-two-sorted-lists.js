/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 20. Merge Two Sorted Lists
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
 * Definition for singly-linked list.
 * function ListNode(val, next) {
 *     this.val = (val===undefined ? 0 : val)
 *     this.next = (next===undefined ? null : next)
 * }
 */

 
 /**
 * Definition for singly-linked list.
 * function ListNode(val) {
 *     this.val = val;
 *     this.next = null;
 * }
 */
/**
 * @param {ListNode} l1
 * @param {ListNode} l2
 * @return {ListNode}
 */
var mergeTwoLists = function(l1, l2) {
  var p1 = l1;
  var p2 = l2;
  var fn = new ListNode(-1);
  var p = fn;

  while (p1 && p2) {
    if (p1.val >= p2.val) {
      p.next = p2;
      p2 = p2.next;
    } else {
      p.next = p1;
      p1 = p1.next;
    }
    p = p.next;
  }

  if (p1) {
    p.next = p1;
  } else {
    p.next = p2;
  }

  return fn.next;
};

// Slightly Refactored, FASTER THAN 100% OF JS SOLUTIONS IN 60MS
var mergeTwoLists = function(l1, l2) {
  if (!l1) return l2;
  else if (!l2) return l1;

  let r1 = l1;
  let r2 = l2;
  if (r1.val <= r2.val) {
    var prev = l1;
    if (r1.next != null) r1 = r1.next;
  } else {
    var prev = l2;
    if (r2.next != null) r2 = r2.next;
  }
  let head = prev;

  while (r1 != null && r2 != null) {
    if (r1.val <= r2.val) {
      let temp = r1;
      r1 = r1.next;
      prev.next = temp;
      prev = temp;
    } else {
      let temp = r2;
      r2 = r2.next;
      prev.next = temp;
      prev = temp;
    }
  }
  prev.next = r1 || r2;

  return head;
};

// First solution 68ms faster than ~88.16% and space 35.5mb less than ~61.56%
var mergeTwoLists = function(l1, l2) {
  if (l1 === null) return l2;
  else if (l2 === null) return l1;

  let head = l1.val <= l2.val ? l1 : l2;
  let r1 = l1;
  let r2 = l2;

  while (r1 != null && r2 != null) {
    if (r1.val <= r2.val) {
      while (r1.next != null && r1.next.val <= r2.val) {
        r1 = r1.next;
      }
      let marker = r1;
      r1 = r1.next;
      marker.next = r2;
    } else if (r2.val <= r1.val) {
      while (r2.next != null && r2.next.val < r1.val) {
        r2 = r2.next;
      }
      let marker = r2;
      r2 = r2.next;
      marker.next = r1;
    }
  }

  return head;
};
