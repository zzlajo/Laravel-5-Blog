## Laravel 5 Blog with [ElastciSearch]((https://www.elastic.co/) - full solutions

This project is the code written in PHP - Laravel 5.1 Framework. It contains full functionality solution for a blog, like a create post, edit post, add user, add permissions and role to users, comments, admin panel, searching (based on Elasticsearch), contact page, ...

The blog have responsive design, it can used on all devices.

I used repository pattern, code is very readable, controllers is slim, repository is fat :)


## Eloquent Model Relationship

This Laravel project is meant to illustrate the various Eloquent model realtionships, including:

*One-To-Many
*Many-To-Many
*Polymorphic Relations

## Blog features

- Add, edit and delete *Posts*
- Add, edit and delete *Users*
- Assign *Roles* and *Permissions*
- Writing and editing articles
- Tagging articles
- Add comments to post
- Post categories
- Admin panel
- Searching blog (Elasticsearch)
...


## Installation

1. Clone the repository
2. Install Composer packages (`composer install`)
3. Create a database
4. Update the DB connection config (i.e. host, database, username, password) in .env
5. Folder *storage* need to have writable permission
6. Run migrations (`php artisan migrate`)
7. Run DB seeders (`php artisan db:seed`)
8. Download Elasticsearch from [official site](https://www.elastic.co/downloads/elasticsearch)
9. Unpack and run elasticsearch. Run bin/elasticsearch on Unix or bin/elasticsearch.bat on Windows

Default admin user: zuber.zlajo@gmail.com pass: 123456


