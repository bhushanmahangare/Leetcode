/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 86. Partition List
 *
 * Medium
 *
 * Given the head of a linked list and a value x, partition it such that all nodes less than x
 * come before nodes greater than or equal to x.
 *
 * You should preserve the original relative order of the nodes in each of the two partitions.
 *
 * Example 1:
 * Input: head = [1,4,3,2,5,2], x = 3
 * Output: [1,2,2,4,3,5]
 *
 * Example 2:
 * Input: head = [2,1], x = 2
 * Output: [1,2]
 *
 * Constraints:
 * The number of nodes in the list is in the range [0, 200].
 * 100 <= Node.val <= 100
 * 200 <= x <= 200
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

#include <stdio.h>
#include <stdlib.h>

/**
 * Definition for singly-linked list.
 * struct ListNode {
 *     int val;
 *     struct ListNode *next;
 * };
 */

struct ListNode *partition(struct ListNode *head, int x)
{
}

//struct ListNode {
//  int val;
// struct ListNode *next;
//};

struct ListNode *partition(struct ListNode *head, int x)
{
    struct ListNode dummy;
    struct ListNode *prev1 = &dummy, *pivot;

    dummy.next = head;
    for (pivot = head; pivot != NULL; pivot = pivot->next)
    {
        if (pivot->val >= x)
        {
            break;
        }
        prev1 = pivot;
    }

    struct ListNode *p = pivot->next;
    struct ListNode *prev2 = pivot;
    while (p != NULL)
    {
        if (p->val < x)
        {
            /* deletion */
            prev2->next = p->next;
            /* insertion */
            p->next = prev1->next;
            prev1->next = p;
            /* iteration */
            prev1 = p;
            p = prev2->next;
        }
        else
        {
            prev2 = p;
            p = p->next;
        }
    }

    return dummy.next;
}

int main(int argc, char **argv)
{
    if (argc < 2)
    {
        fprintf(stderr, "Usage: ./test target n1 n2 n3...\n");
        exit(-1);
    }

    int i, target = atoi(argv[1]);
    struct ListNode *head = NULL;
    struct ListNode *prev = NULL;
    struct ListNode *p;
    for (i = 0; i < argc - 2; i++)
    {
        p = malloc(sizeof(*p));
        p->val = atoi(argv[i + 2]);
        p->next = NULL;
        if (head == NULL)
        {
            head = p;
            prev = head;
        }
        else
        {
            prev->next = p;
            prev = p;
        }
    }
    p = partition(head, target);
    while (p != NULL)
    {
        printf("%d ", p->val);
        p = p->next;
    }
    printf("\n");
    return 0;
}
