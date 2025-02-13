# Tillo Technical Test
## PHP Task 1 - Answers in plain English

> :information_source: Edit this Markdown file and in plain English, briefly describe how you would:



1. Count the total number of orders?

> I will read the JSON file through the file path using json_decode() function and count the total number of orders in the elements in the array using count(). 

2. Count the number of orders that were FREE?

> I will read the JSON file through the file path using json_decode() function, then use an array_filter() to filter any price that is "0.00", then count the number of orders from the array_filter() using count().

3. Count the number of orders that were placed in GBP?

> I will read the JSON file through the file path using json_decode(), then use an array_filter() to filter any currency that is "GBP", then count the number of orders from the array_filter() using count().

4. Count the number of orders that were shipped to Essex?

> I will read the JSON file through the file path using json_decode(), then use an array_filter() to filter any shipping address that is "Essex" with $order['customer']['billing_address']['county'] === "Essex",  then count the number of orders from the array_filter() using count(). 

5. Sum the cost of orders that were placed in GBP and were £100 or more?

> I will read the JSON file through the file path using json_decode(), then use an array_reduce() to filter any currency that is "GBP" and price that is greater than or equal to 100, then return the total cost of orders from the array_reduce().

6. Sum the cost of orders that were placed in GBP?

> I will read the JSON file through the file path using json_decode(), then use an array_reduce() to filter any currency that is "GBP", then return the total cost of orders from the array_reduce(). 

7. Sum the cost of orders that were placed in GBP and were shipped to Essex?

> I will read the JSON file through the file path using json_decode(), then use an array_reduce() to filter any currency that is "GBP" and shipping address that is "Essex", then return the total cost of orders from the array_reduce().
