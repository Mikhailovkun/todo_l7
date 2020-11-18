1) Скачиваем проект 
>git clone https://github.com/Mikhailovkun/todo_l7.git todo_l7
2) Переходим в папку проекта
>cd todo_l7
3) Устанавливаем компоненты
>composer install
4) Настраиваем подключение к базе данных в .env, config\database.php
5) Добавляем таблицы в базу данных 
>php artisan migrate
6) Генерируем ключ приложения 
>php artisan key:generate
7) Запускаем приложение
>php artisan serve
-------------------------------------------------------------------

