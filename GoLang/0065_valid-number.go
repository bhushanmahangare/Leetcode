/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 65. Valid Number
 *
 * Hard
 *
 * A valid number can be split up into these components (in order):
 *      1.  A decimal number or an integer.
 *      2.  (Optional) An 'e' or 'E', followed by an integer.
 *
 * A decimal number can be split up into these components (in order):
 *      1. (Optional) A sign character (either '+' or '-').
 *      2.  One of the following formats:
 *          1.  At least one digit, followed by a dot '.'.
 *          2.  At least one digit, followed by a dot '.', followed by at least one digit.
 *          3.  A dot '.', followed by at least one digit.
 *
 * An integer can be split up into these components (in order):
 *      1.  (Optional) A sign character (either '+' or '-').
 *      2.  At least one digit.
 *
 * For example, all the following are valid numbers:
 * ["2", "0089", "-0.1", "+3.14", "4.", "-.9", "2e10", "-90E3", "3e+7", "+6e-1", "53.5e93", "-123.456e789"],
 *
 * while the following are not valid numbers:
 * ["abc", "1a", "1e", "e3", "99e2.5", "--6", "-+3", "95a54e53"].
 *
 * Given a string s, return true if s is a valid number.
 *
 * Example 1:
 * Input: s = "0"
 * Output: true
 *
 * Example 2:
 * Input: s = "e"
 * Output: false
 *
 * Example 3:
 * Input: s = "."
 * Output: false
 *
 * Example 4:
 * Input: s = ".1"
 * Output: true
 *
 * Constraints:
 * 1 <= s.length <= 20
 * s consists of only English letters (both uppercase and lowercase), digits (0-9), plus '+', minus '-', or dot '.'.
 *
 *** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/

func isNumber(s string) bool {
	s = trim(s)
	return isReal(s)
}

func isReal(s string) bool {
	if len(s) == 0 {
		return false
	}

	if s[0] == '-' || s[0] == '+' {
		return isNonnegReal(s[1:], false)
	}

	return isNonnegReal(s, false)
}

func isNonnegReal(s string, hasDot bool) bool {
	if len(s) == 0 {
		return false
	}

	for i, c := range s {
		switch {
		case '0' <= c && c <= '9':
			continue
		case c == '.':
			if hasDot {

				return false
			}

			if i == len(s)-1 && i != 0 {

				return true
			}

			if i+1 < len(s) && s[i+1] == 'e' {

				return i != 0 && isInteger(s[i+2:])
			}


			return isNonnegReal(s[i+1:], true)
		case c == 'e':
			if i == 0 {
				
				return false
			}
			return isInteger(s[i+1:])
		default:
			return false
		}
	}

	return true
}

func isInteger(s string) bool {
	if len(s) == 0 {
		return false
	}

	if s[0] == '-' || s[0] == '+' {
		return isNonnegativeInteger(s[1:])
	}

	return isNonnegativeInteger(s)
}

func isNonnegativeInteger(s string) bool {
	if len(s) == 0 {
		return false
	}

	for _, c := range s {
		if c < '0' || '9' < c {
			return false
		}
	}
	return true
}

func trim(s string) string {
	i := 0
	for i < len(s) && s[i] == ' ' {
		i++
	}

	j := len(s) - 1
	for i <= j && s[j] == ' ' {
		j--
	}

	return s[i : j+1]
}
