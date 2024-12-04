# Filedroper   
## EN   
Simple file sharing. Uploads a file and provides a download link. There is a captcha system to protect against bots.   
There are two versions:   
* index.php - generates only a one-time download link. After clicking on it and downloading the file, the file is deleted from the server.   
* index1.php - generates a permanent and one-time link to the file. When downloading via a permanent link, the file remains on the server.   

**Important: in the captcha/ folder there is only one file with a captcha for example. After installation, you must download or create your own images for the captcha. The name of the image without the extension is the correct captcha answer. For example: for 123.jpg the correct answer is 123.**   

Installation:   
* Install a web server with php support.   
* Copy index.php or index1.php (depending on your needs) and styles.css to the root directory of your web server (usually /var/www/html).   
* Create the uploads/ and captcha/ folders in the root directory of your web server.   
* Copy captcha images to the captcha/ folder and give them the correct names.   
* Correctly set the owner of the web server root directory and its contents.   
   
   
## RU   
Простой файлообменник. Загружает файл и предоставляет ссылку для скачивания. Для защиты от ботов есть система капчи.    
Есть две версии:    
* index.php - генерирует только одноразовую ссылку для скачивания. После перехода по ней и скачивания файла, файл удаляется с сервера.   
* index1.php - генерирует постоянную и одноразовую ссылки на файл. При скачивании по постоянной ссылке, файл остаётся на сервере.   

**Важный момент: в папке captcha/ только один файл с капчей для примера. После установки вы должны скачать или создать сами картинки для капчи. Название картинки без расширения - верный ответ капчи. Например: для 123.jpg правильный ответ 123.**


Установка:   
* Установить веб-сервер с поддержкой php.   
* Скопировать index.php или index1.php (в заваисимости от ваших потребностей) и styles.css в корневую директорию вашего веб-сервера (обычно это /var/www/html).   
* Создать папки uploads/ и captcha/ в корневой директории вашего веб сервера.   
* Скопировать картинки для капчи в папку captcha/ и дать им верные имена.   
* Правильно установить владельца корневой директории веб сервера и её содержимого.   


