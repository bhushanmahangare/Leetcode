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
 package problem0023


 type ListNode struct {
	 Val  int
	 Next *ListNode
 }
 
 func merge(lists []*ListNode) *ListNode {
	 length := len(lists)
	 half := length / 2
 
	 if length == 1 {
		 return lists[0]
	 }
 
	 if length == 2 {
		 var (
			 l0, l1   = lists[0], lists[1]
			 res, cur *ListNode
		 )
 
		 if l0 == nil {
			 return l1
		 }
		 if l1 == nil {
			 return l0
		 }
 
		 if l0.Val < l1.Val {
			 res, cur, l0 = l0, l0, l0.Next
		 } else {
			 res, cur, l1 = l1, l1, l1.Next
		 }
 
		 for l0 != nil && l1 != nil {
			 if l0.Val < l1.Val {
				 cur.Next, l0 = l0, l0.Next
			 } else {
				 cur.Next, l1 = l1, l1.Next
			 }
			 cur = cur.Next
		 }
 
		 if l0 != nil {
			 cur.Next = l0
		 }
		 if l1 != nil {
			 cur.Next = l1
		 }
 
		 return res
	 }
 
	 return mergeKLists([]*ListNode{mergeKLists(lists[half:]), mergeKLists(lists[:half])})
 }
 
 func mergeKLists(lists []*ListNode) *ListNode {
	 if len(lists) == 0 {
		 return nil
	 }
 
	 return merge(lists)
 }
 