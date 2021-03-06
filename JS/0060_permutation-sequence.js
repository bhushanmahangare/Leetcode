/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 60. Permutation Sequence
 * 
 * Hard 
 * 
 * The set [1,2,3,...,n] contains a total of n! unique permutations.
 *  
 * By listing and labeling all of the permutations in order, we get the following sequence for n = 3:
 * "123"
 * "132"
 * "213"
 * "231"
 * "312"
 * "321"
 * 
 * Given n and k, return the kth permutation sequence.
 * 
 * Note:
 * Given n will be between 1 and 9 inclusive.
 * Given k will be between 1 and n! inclusive.
 * 
 * Example 1:
 * Input: n = 3, k = 3
 * Output: "213"
 * 
 * Example 2:
 * Input: n = 4, k = 9
 * Output: "2314"
 * 
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

/**
 * @param {number} n
 * @param {number} k
 * @return {string}
 */
var getPermutation = function(n, k) {
    s = '';
    let factorial = [1];
    for (let i = 1; i <= n; ++i) {
        s += i;
        factorial.push(factorial[i - 1] * i);
    }
    let ret = '';
    k--;
    while (n > 0) {
        let quotient = Math.floor(k / factorial[n - 1]);
        let resident = k % factorial[n - 1];
        ret += s.charAt(quotient);
        s = s.slice(0, quotient) + s.slice(quotient + 1);
        // console.log(s);
        k = resident;
        // console.log(k);
        n--;
    }
    return  ret;
};
