# Setting project
- PHP version v8.1.10
- Setting `xampp` and run apache, mysql
- Create database is name todo-list
- Import file sql todoList to database (path: todoList/todo-list.sql) to database todo-list
- Open srceen website localhost/todoList/source/index.php
# Check convention PSR 
- Run command `composer require "squizlabs/php_codesniffer=*"` to install php_codesniffer
- Run command `./vendor/bin/phpcs --standard=PSR2 <PATH>.php` to check convention PSR2