/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 4. Median of Two Sorted Arrays
 * Hard
 * 
 * There are two sorted arrays nums1 and nums2 of size m and n respectively.
 *  Find the median of the two sorted arrays. The overall run time complexity should be O(log (m+n)).
 * 
 * You may assume nums1 and nums2 cannot be both empty.
 * 
 * Example 1:
 * nums1 = [1, 3]
 * nums2 = [2]
 * The median is 2.0
 * 
 * Example 2:
 * nums1 = [1, 2]
 * nums2 = [3, 4]
 * The median is (2 + 3)/2 = 2.5
 * 
 * =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
/**
 * @param {number[]} nums1
 * @param {number[]} nums2
 * @return {number}
 */
var findMedianSortedArrays = function(nums1, nums2) {
    var total = nums1.length + nums2.length;
  
    if (total % 2 === 1) {
      return findKth(nums1, 0, nums2, 0, parseInt(total / 2) + 1);
    } else {
      return (
        (findKth(nums1, 0, nums2, 0, parseInt(total / 2)) +
          findKth(nums1, 0, nums2, 0, parseInt(total / 2) + 1)) /
        2
      );
    }
  };
  
  function findKth(nums1, start1, nums2, start2, kth) {
    var len1 = nums1.length - start1;
    var len2 = nums2.length - start2;
  
    if (len1 > len2) {
      return findKth(nums2, start2, nums1, start1, kth);
    }
  
    if (len1 === 0) {
      return nums2[kth - 1];
    }
  
    if (kth === 1) {
      return Math.min(nums1[start1], nums2[start2]);
    }
  
    // divide kth into 2 parts
    var part1 = Math.min(parseInt(kth / 2), len1);
    var part2 = kth - part1;
  
    if (nums1[start1 + part1 - 1] < nums2[start2 + part2 - 1]) {
      return findKth(nums1, start1 + part1, nums2, start2, kth - part1);
    } else if (nums1[start1 + part1 - 1] > nums2[start2 + part2 - 1]) {
      return findKth(nums1, start1, nums2, start2 + part2, kth - part2);
    } else {
      return nums1[start1 + part1 - 1];
    }
  }
  
  // Merge Sort solution faster than 21% of solutions...
  /**
   * @param {number[]} nums1
   * @param {number[]} nums2
   * @return {number}
   */
  var findMedianSortedArrays = function(nums1, nums2) {
    let arr = nums1.concat(nums2);
    arr = mergeSort(arr);
  
    if (arr.length % 2 === 0) {
      let mid = Math.floor(arr.length / 2);
      return (arr[mid] + arr[mid - 1]) / 2;
    } else {
      let mid = Math.floor(arr.length / 2);
      return arr[mid];
    }
  };
  
  let mergeSort = arr => {
    if (arr.length < 2) return arr;
  
    let mid = Math.floor(arr.length / 2);
    let left = mergeSort(arr.slice(0, mid));
    let right = mergeSort(arr.slice(mid));
  
    return merge(left, right);
  };
  
  let merge = (left, right) => {
    let result = [];
  
    while (left.length > 0 && right.length > 0) {
      result.push(left[0] < right[0] ? left.shift() : right.shift());
    }
  
    return result.concat(left.length > 0 ? left : right);
  };