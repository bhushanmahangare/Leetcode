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

func getPermutation(n int, k int) string {
	if n == 0 {
		return ""
	}

	res := make([]byte, n)

	rec := make([]byte, n)
	for i := 0; i < n; i++ {
		rec[i] = byte(i) + '1'
	}

	k--

	base := 1
	for i := 2; i < n; i++ {
		base *= i
	}

	for i := 0; i < n-1; i++ {
		idx := k / base
		res[i] = rec[idx]

		rec = append(rec[:idx], rec[idx+1:]...)
		k %= base
		base /= (n - i - 1)
	}

	res[n-1] = rec[0]

	return string(res)
}
