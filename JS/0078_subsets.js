/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 78. Subsets
 *
 * Medium
 *
 * Given an integer array nums of unique elements, return all possible subsets (the power set).
 *
 * The solution set must not contain duplicate subsets. Return the solution in any order.
 *
 * Example 1:
 * Input: nums = [1,2,3]
 * Output: [[],[1],[2],[1,2],[3],[1,3],[2,3],[1,2,3]]
 *
 * Example 2:
 * Input: nums = [0]
 * Output: [[],[0]]
 *
 * Constraints:
 * 1 <= nums.length <= 10
 * -10 <= nums[i] <= 10
 * All the numbers of nums are unique.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

/**
 * @param {number[]} nums
 * @return {number[][]}
 */
var subsets = function (nums) {
    var result = [];
    generate(nums, 0, [], result);
    return result;
};

var generate = function (nums, index, cur, result) {
    if (index === nums.length) {
        result.push(cur.slice());
        return;
    }

    generate(nums, index + 1, cur, result);
    cur.push(nums[index]);
    generate(nums, index + 1, cur, result);
    cur.pop();
};

// second try
var subsets = function (nums) {
    var res = [
        []
    ];

    function generate(nums, i, cur, res) {
        for (; i < nums.length; i++) {
            cur.push(nums[i]);
            res.push(cur.slice());
            generate(nums, i + 1, cur, res);
            cur.pop();
        }
    }

    generate(nums, 0, [], res);
    return res;
};

// Third solution
var subsets = function (nums) {
    var results = [];
    combine(nums, 0, [], results);
    return results;
};

var combine = function (nums, index, partial, results) {
    if (index === nums.length) {
        results.push(partial);
        return;
    }

    combine(nums, index + 1, partial, results);
    combine(nums, index + 1, partial.concat([nums[index]]), results);
};