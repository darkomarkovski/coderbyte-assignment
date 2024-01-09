# PHP API data retrieval

## Assignment:
Harvard Library provide an API to access information about the books in the library (https://wiki.harvard.edu/confluence/display/LibraryStaffDoc/LibraryCloud+APIs)

Please build an application which can retrieve books by a specified author and list them to the screen.

## Info

Simple php app to display the results of the api by author (note that I'm not 100% sure that name parameter is needed here but I couldn’t find specific author field in the documentation).
To start run:
```console
docker build -t coderbyte-app .
docker run -v ${PWD}:/var/www/html -d -p 8080:80 coderbyte-app 
```
then go to - http://localhost:8080/
