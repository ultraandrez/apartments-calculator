## Калькулятор ипотеки
Запуск контейнера
````
docker-compose up --build 
````
Переходим в директорию проекта
````
docker-compose exec web bash 
````
Создаем бд `calculator` (доступ к бд ниже)\
Генерируем ключ, устанавливаем миграции и заполняем таблицы данными
````
php artisan key:generate
php artisan migrate
php artisan db:seed
````

## Где лежит проект

Adminer: \
&ensp;&ensp;&ensp;&ensp;url: http://127.0.0.1:6080/ \
&ensp;&ensp;&ensp;&ensp;username: root \
&ensp;&ensp;&ensp;&ensp;password: 123456 \
Project: http://127.0.0.1:8080/public/

## Что реализовано
- Просмотр/редактирование/добавление/удаление квартир \
- Детальная страница квартир \
- Просмотр/удаление/редактирование предложений по ипотекам \
- Типы квартир вынесены в отдельную таблицу \
- Пересчет ежемесячных платежей не хранится в бд, а высчитывается при формировании данных, но вместо этого на события удаления удаляются привязки связных элементов.