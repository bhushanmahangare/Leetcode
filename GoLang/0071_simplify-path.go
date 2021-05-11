/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 71. Simplify Path
 *
 * Medium
 *
 * Given a string path, which is an absolute path (starting with a slash '/') to a file or
 * directory in a Unix-style file system, convert it to the simplified canonical path.
 *
 * In a Unix-style file system, a period '.' refers to the current directory, a double period '..'
 * refers to the directory up a level, and any multiple consecutive slashes (i.e. '//') are treated
 * as a single slash '/'. For this problem, any other format of periods such as '...' are treated
 * as file/directory names.
 *
 * The canonical path should have the following format:
 *
 * The path starts with a single slash '/'.
 * Any two directories are separated by a single slash '/'.
 * The path does not end with a trailing '/'.
 * The path only contains the directories on the path from the root directory to the target
 * file or directory (i.e., no period '.' or double period '..')
 * Return the simplified canonical path.
 *
 * Example 1:
 * Input: path = "/home/"
 * Output: "/home"
 * Explanation: Note that there is no trailing slash after the last directory name.
 *
 * Example 2:
 * Input: path = "/../"
 * Output: "/"
 * Explanation: Going one level up from the root directory is a no-op, as the root level is
 * the highest level you can go.
 *
 * Example 3:
 * Input: path = "/home//foo/"
 * Output: "/home/foo"
 * Explanation: In the canonical path, multiple consecutive slashes are replaced by a single one.
 *
 * Example 4:
 * Input: path = "/a/./b/../../c/"
 * Output: "/c"
 *
 * Constraints:
 * 1 <= path.length <= 3000
 * path consists of English letters, digits, period '.', slash '/' or '_'.
 * path is a valid absolute Unix path.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

 import "strings"
 
 func simplifyPath(path string) string {
	 lp := len(path)
	 stack := make([]string, 0, lp/2)
	 dir := make([]byte, 0, lp)
 
	 for i := 0; i < lp; i++ {
		 dir = dir[:0]
		 for i < lp && path[i] != '/' {
			 dir = append(dir, path[i])
			 i++
		 }
 
		 s := string(dir)
 
		 switch s {
		 case ".", "":
			 // do nothing
		 case "..":
			 if len(stack) > 0 {
				 // pop
				 stack = stack[:len(stack)-1]
			 }
		 default:
			 stack = append(stack, s)
		 }
	 }
 
	 return "/" + strings.Join(stack, "/")
 }
 