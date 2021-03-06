'''=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
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
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-='''
 
 class Solution:
    def mergeTwoLists(self, a, b):
        if a and b:
            if a.val > b.val:
                a, b = b, a
            a.next = self.mergeTwoLists(a.next, b)
        return a or b