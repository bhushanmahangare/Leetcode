/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 23. Merge k Sorted Lists
 * Hard
 * 
 * Merge k sorted linked lists and return it as one sorted list. 
 * Analyze and describe its complexity.
 * 
 * Example:
 * 
 * Input:
 * [
 *    1->4->5,
 *    1->3->4,
 *    2->6
 * ]
 * 
 * Output: 1->1->2->3->4->4->5->6
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
 * @param {ListNode[]} lists
 * @return {ListNode}
 */
// Efficient solution. O(NlogM) and around 80ms
var mergeKLists = function(lists, low = 0, high = lists.length - 1) {
    if (lists.length === 0) return null;
    if (low === high) {
      return lists[low];
    }
  
    let mid = Math.floor((low + high) / 2);
    let left = mergeKLists(lists, low, mid);
    let right = mergeKLists(lists, mid + 1, high);
  
    return merge(left, right);
  };
  
  const merge = (l1, l2) => {
    if (l1 === null) {
      return l2;
    }
    if (l2 === null) {
      return l1;
    }
    if (l1.val < l2.val) {
      l1.next = merge(l1.next, l2);
      return l1;
    } else {
      l2.next = merge(l1, l2.next);
      return l2;
    }
  };