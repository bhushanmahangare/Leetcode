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
#include <string>
using std::string;
#include <algorithm>

class Solution
{
public:
    bool isScramble(string s1, string s2)
    {
        if (s1.empty() || s2.empty() || s1.size() != s2.size())
            return false;
        else if (s1 == s2)
            return true;
        for (auto c : s1)
            if (s2.find_first_of(c) == string::npos)
                return false;
            else if (std::count(s1.cbegin(), s1.cend(), c) != std::count(s2.cbegin(), s2.cend(), c))
                return false;
        for (size_t i = 1; i < s1.size(); ++i)
            if (isScramble(s1.substr(0, i), s2.substr(0, i)) && isScramble(s1.substr(i), s2.substr(i)))
                return true;
            else if (isScramble(s1.substr(0, i), s2.substr(s2.size() - i)) && isScramble(s1.substr(i), s2.substr(0, s2.size() - i)))
                return true;
        return false;
    }
};

#define CATCH_CONFIG_MAIN
#include "../Catch/single_include/catch.hpp"
#include "solution.h"

TEST_CASE("Scramble String", "[isScramble]")
{
    Solution s;
    REQUIRE(s.isScramble("great", "rgtae"));
    REQUIRE_FALSE(s.isScramble("ccabcbabcbabbbbcbb", "bbbbabccccbbbabcba"));
}
