'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''
 # Definition for singly-linked list.
# class ListNode:
#     def __init__(self, val=0, next=None):
#         self.val = val
#         self.next = next
class Solution:
    def reverseKGroup(self, head: ListNode, k: int) -> ListNode:
        
        if k <= 1 or head is None:
            return head
        
        temp=head
        count=0
        while(temp):
            temp=temp.next
            count+=1
        
        num_of_node_to_reverse = (count//k)
        
        
        prev=None
        cur=head
        while(num_of_node_to_reverse!=0):
            last_node_prev = prev
            last_node_sub = cur
        
            i=0
            next=None
            while i<k and cur is not None:
                next = cur.next
                cur.next =prev
                prev=cur
                cur=next
                i+=1
            
            if last_node_prev is not None:
                last_node_prev.next = prev
            else:
                head =prev
                
            
            last_node_sub.next =cur
            prev =  last_node_sub
            
            num_of_node_to_reverse-=1
        
        return  head