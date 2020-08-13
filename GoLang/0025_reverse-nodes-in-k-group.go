/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 25. Reverse Nodes in K-Group
 * Hard
 * 
 * Given a linked list, reverse the nodes of a linked list k at a time and return its modified list.
 * 
 * k is a positive integer and is less than or equal to the length of the linked list. 
 * If the number of nodes is not a multiple of k then left-out nodes in the end should remain as it is.
 * 
 * 
 * Example:
 * 
 * Given this linked list: 1->2->3->4->5
 * 
 * For k = 2, you should return: 2->1->4->3->5
 * 
 * For k = 3, you should return: 3->2->1->4->5
 * 
 * Note:
 * Only constant extra memory is allowed.
 * You may not alter the values in the list's nodes, only nodes itself may be changed.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 package reverse_nodes_in_k_group

type ListNode struct {
	Val  int
	Next *ListNode
}

func reverseKGroup(head *ListNode, k int) *ListNode {
	if k <= 0 {
		return head
	}
	fake := &ListNode{Next: head}
	p := fake
	for p != nil {
		p.Next = reverseKNodes(p.Next, k)
		for i := 0; p != nil && i < k; i++ {
			p = p.Next
		}
	}
	return fake.Next
}

func reverseKNodes(head *ListNode, k int) *ListNode {
	end := head
	for k > 0 && end != nil {
		end = end.Next
		k--
	}
	if k > 0 {
		return head
	}
	ret, pNode := end, head
	var qNode *ListNode
	for pNode != end {
		qNode = pNode.Next
		pNode.Next = ret
		ret = pNode
		pNode = qNode
	}
	return ret
}
