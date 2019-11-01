## Task

```
Fetch and manipulate JSON data from a fictional Supermetrics Social Network REST API.

Please do not use any existing framework such as Laravel, Symfony, Django etc. You may use external standalone libraries if you need. 


1. Register a short-lived token on the fictional Supermetrics Social Network REST API
 
2. Fetch the posts of a fictional user on a fictional social platform and process their posts. You will have 1000 posts over a six month period. Show stats on the following: - Average character length of a post / month - Longest post by character length / month - Total posts split by week - Average number of posts per user / month
 
3. Design the above to be generic, extendable and easy to maintain by other staff members.
 
4. You do not need to create any HTML pages for the display of the data. JSON output of the stats is sufficient.
 
5. Return the assignment in any of the following ways: - Use the custom link in the bottom of this email OR - Place on a github/bitbucket/gitlab repo that we can access, you can use a public repo OR - Zip or Tar the files into an archive and send it along to us by email OR - Place in a Dropbox that we can access.

```


## Installation

Just follow next instructions:

```
git clone git@github.com:inser7/sm-assignment.git
cd sm-assignment
composer install
chown -R www-data:www-data storage
cp .env.example .env
php artisan cache:clear
php artisan key:generate

After that set up web-server to serve laravel or start server with `php artisan serve`.

You can change cache using and it's timeout in .env file.

```


DOWNLOADER_CACHE=true

DOWNLOADER_CACHE_TIMEOUT=5


## 

Monthly stats:  http://localhost:8000/stats/monthly/8

Year stats:  http://localhost:8000/stats/year

