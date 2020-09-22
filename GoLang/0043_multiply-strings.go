/*=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
 * 43. Multiply Strings
 * 
 * Given two non-negative integers num1 and num2 represented as strings, return the product of 
 * num1 and num2, also represented as a string.
 * 
 * Example 1:
 * Input: num1 = "2", num2 = "3"
 * Output: "6"
 * 
 * Example 2:
 * Input: num1 = "123", num2 = "456"
 * Output: "56088"
 * 
 * Note:
 * The length of both num1 and num2 is < 110.
 * Both num1 and num2 contain only digits 0-9.
 * Both num1 and num2 do not contain any leading zero, except the number 0 itself.
 * You must not use any built-in BigInteger library or convert the inputs to integer directly.
 * 
 ** =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=*/
 

func multiply(num1 string, num2 string) string {

	if num1 == "0" || num2 == "0" {
		return "0"
	}


	bsi := []byte(num1)
	bsj := []byte(num2)


	temp := make([]int, len(num1)+len(num2))

	for i := 0; i < len(bsi); i++ {

		for j := 0; j < len(bsj); j++ {

			temp[i+j+1] += int(bsi[i]-'0') * int(bsj[j]-'0')

		}
	}


	
	for i := len(temp) - 1; i > 0; i-- {
		temp[i-1] += temp[i] / 10
		temp[i] = temp[i] % 10
	}

	
	if temp[0] == 0 {
		temp = temp[1:]
	}

	
	res := make([]byte, len(temp))
	for i := 0; i < len(temp); i++ {

		res[i] = '0' + byte(temp[i])
		
	}

	return string(res)
}

