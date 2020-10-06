/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 52. N-Queens-II
 * 
 * Hard
 * 
 * Implement pow(x, n), which calculates x raised to the power n (i.e. xn).
 * 
 * Example 1:
 * Input: x = 2.00000, n = 10
 * Output: 1024.00000
 * 
 * Example 2:
 * Input: x = 2.10000, n = 3
 * Output: 9.26100
 * 
 * Example 3:
 * Input: x = 2.00000, n = -2
 * Output: 0.25000
 * 
 * Explanation: 2-2 = 1/22 = 1/4 = 0.25
 * 
 *  Constraints:
 * -100.0 < x < 100.0
 * -231 <= n <= 231-1
 * -104 <= xn <= 104
 * 
 * ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 /**
 * @param {number} n
 * @return {number}
 */
var totalNQueens = function(n){
    let res = [0];
    solver(0, new Array(), n, res);
    return res[0];
  }
  
  function solver(cur_row, colPlacements, n, res){
    // did we reach beyond last row ? | If yes increment our counbt of solutions
    // colPlacement: an array where each index represent a row, and value reprsent a column in that row were we put a queen
    if(cur_row === n){
      res[0]++;
      return;
    }
    // else try to place a queen in every column in the current row
    for(let col=0; col<n; col++){
      colPlacements.push(col);
      // if this is a valid placement, recurse on the next row
      // since we can't have 2 queens on the same row
      if(isValid(colPlacements)){
        solver(cur_row+1, colPlacements, n, res);
      }
      // if the placement is invalid, or we have explored all the way deep
      // then we come back and undo our choice; BACKTRACK
      colPlacements.pop();
    }
  }
  
  
  function isValid(colPlacements){
    let n = colPlacements.length;
    let cur_row = n-1;
    // FOR ALL PREV ROWS or QUEENS since each row must have 1 QUEEN
    // we only need to validate same col attack and diagonal attack
  
    // 1. for vertical attack the col pos of the queen we just inserted 
    // will be equal to that of some other existing quens
    // 2. For diagonal attack the colDistance and rowDistance will be the same
    for(let row=0; row<cur_row; row++){
      let colDistance = Math.abs(colPlacements[cur_row]-colPlacements[row]);
      let rowDistance = cur_row-row;
      if(colDistance===0 || rowDistance===colDistance){
        return false;
      }
    }
    return true;
  }