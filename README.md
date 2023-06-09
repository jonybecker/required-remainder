# Required Remainder


## Problem Description
You are given three integers x, y, and n. Your task is to find the maximum integer k such that 0 ≤ k ≤ n and k mod x = y, where mod is the modulo operation. Many programming languages use the percent operator % to implement it.

In other words, given x, y, and n, you need to find the maximum possible integer from 0 to n that has the remainder y modulo x.

You have to answer t independent test cases. It is guaranteed that such k exists for each test case.

Input
The first line of the input contains one integer t (1 ≤ t ≤ 5⋅10^4) — the number of test cases. The next t lines contain the test cases.

Each test case consists of a single line containing three integers x, y, and n (2 ≤ x ≤ 10^9; 0 ≤ y < x; y ≤ n ≤ 10^9).

It can be shown that such k always exists under the given constraints.

Output
For each test case, print the answer — the maximum non-negative integer k such that 0 ≤ k ≤ n and k mod x = y. It is guaranteed that the answer always exists.

Examples
Input
```
7
7 5 12345
5 0 4
10 5 15
17 8 54321
499999993 9 1000000000
10 5 187
2 0 999999999
```
Output
```
12339
0
15
54306
999999995
185
999999998
```
In the first test case of the example, the answer is `12339 = 7 ⋅ 1762 + 5` (thus, `12339 mod 7 = 5`). It is obvious that there is no greater integer not exceeding 12345 which has the remainder 5 modulo 7.

## Execution
### Initial setup
```bash
composer install
./vendor/bin/sail up -d
```
### Run
#### Web
Navigate to http://localhost in your browser.

Enter test cases and submit them.

An example is preloaded.

#### API
Postman collection is available in the docs directory.


Curl example:
```bash
> curl --location --request POST 'http://localhost/api/required-remainder' \
--header 'Content-Type: application/json' \
--data-raw '{
    "tasks": [
        "7 5 12345",
        "5 0 4",
        "10 5 15",
        "17 8 54321",
        "499999993 9 1000000000",
        "10 5 187",
        "2 0 999999999"
    ]
}'
```

## Results
**Execution Time**: 12-15 ms

**Memory**: 4.00 MB

