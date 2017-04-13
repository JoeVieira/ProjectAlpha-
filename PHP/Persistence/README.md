# Persistence:

If you were to multiply all the digits of a number together, you could repeat the operation with the product until you obtained a single digit number. For example, with the number 814:

8 * 1 * 4 = 32

3 * 2 = 6

The number of times you have to repeat the operation until you receive a single digit number is called multiplicative persistence. The single digit product of the digits is called the multiplicative digital root. In the case of 814, the multiplicative persistence is 2 and the multiplicative digital root is 6.
***
35 -> 15 -> 5

multiplicative persistence: 2

multiplicative digital root: 5
***
5100 -> 0

multiplicative persistence: 1

multiplicative digital root: 0
***
Write the function called `calculateRoot()` in Persistance.php that would calculate the multiplicative digital root of `$input`.
