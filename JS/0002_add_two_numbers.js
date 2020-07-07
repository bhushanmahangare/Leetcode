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
/**
 * Definition for singly-linked list.
 */ 
function ListNode(val, next) {
    this.val = (val===undefined ? 0 : val)
    this.next = (next===undefined ? null : next)
}
 
/**
 * @param {ListNode} l1
 * @param {ListNode} l2
 * @return {ListNode}
 */
var addTwoNumbers = function(l1, l2) {
    
    let sumList = new ListNode(0),
    emptyNode = new ListNode(0);
  let carry = 0,
    sum = 0;
  let sumRunner = sumList;

  while (l1 != null || l2 != null) {
    if (l1 === null && l2 != null) l1 = emptyNode;
    else if (l2 === null && l1 != null) l2 = emptyNode;
    else {
      sum = l1.val + l2.val + carry;
      carry = Math.floor(sum / 10);
      sumRunner.next = new ListNode(sum % 10);
      sumRunner = sumRunner.next;
      l1 = l1.next;
      l2 = l2.next;
    }
  }

  if (carry > 0) sumRunner.next = new ListNode(carry);

  return sumList.next;

};