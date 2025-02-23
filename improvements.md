# Improvements

1. Include a user guide file to guide the reviewer on packages used, php and composer versions used, OS used. e.g howto.md
2. Dockerize the application to make it easy to run the application on any machine.
3. Write a test to check if the json file is available and readable.
4. Write a test to check if the json file is empty.
5. $this->order = New Order() should be instantiated inside the Setup method of the test class, to avoid code duplication.

