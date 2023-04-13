## About This Laravel Blog

A blog platform from scratch using PHP Laravel. 
Allow users to:
- Create accounts.
- Write blog posts. 
- Comment on other users' posts. 

#### Advanced functionality:
- A tagging system that allows users to add tags to their blog posts and filter posts by tags.
- Moderation system that allows blog administrators to approve, edit, or delete user comments.


#### How to set up and run the application:
1- clone the repo to your machine.
````
git clone https://github.com/nawwaralmakhlouf/nawwar-blog.git
````
2- Change directory
````
cd nawwar-blog
````
2- Run the following
````
npm install
composer install
````
2- Create .env file
````
cp .env.example .env
````
3- Generate APP_KEY
````
php artisan key:generate
````
3- Change the database name in .env file and run
````
php artisan migrate
````
4- Run the project
````
php artisan serve
````
