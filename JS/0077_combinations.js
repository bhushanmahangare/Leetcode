/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 77. Combinations
 *
 * Medium
 *
 * Given two integers n and k, return all possible combinations of k numbers out of the range [1, n].
 *
 * You may return the answer in any order.
 *
 * Example 1:
 * Input: n = 4, k = 2
 * Output:
 * [
 *  [2,4],
 *  [3,4],
 *  [2,3],
 *  [1,2],
 *  [1,3],
 *  [1,4],
 * ]
 *
 * Example 2:
 * Input: n = 1, k = 1
 * Output: [[1]]
 *
 * Constraints:
 * 1 <= n <= 20
 * 1 <= k <= n
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

/**
 * @param {number} n
 * @param {number} k
 * @return {number[][]}
 */
var combine = function (n, k) {
    if (k === 0 || n === 0) {
        return [];
    }

    var result = [];
    var output = [];
    generate(result, output, n, k, 1);

    return result;
};

var generate = function (result, output, n, k, cur) {
    if (output.length === k) {
        result.push(output.slice());
        return;
    }
    if (cur > n) {
        return;
    }

    output.push(cur);
    generate(result, output, n, k, cur + 1);
    output.pop();
    generate(result, output, n, k, cur + 1);
};