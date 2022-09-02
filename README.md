
# TestTasc

Пример моего выполнения тестового задания в компанию ИНЛАЙН

На главном (и единственном) экране располагается всего 2 элемента. 
Кнопка обновления записей и комментариев к ним в соответствии 
с сылками, представленными в 
ТЗ, а также поле для ввода текста, по которому и будет производиться 
поиск среди комментариев к записям. Поиск производится в фоновом режиме при
изменении поля ввода, дополнительных кнопок нажимать не надо. В случае 
успешного поиска, появляется список, где жирным указан заголовок записи, а 
обычныи текстом представлен сам комментарий. SQL команды для создания бд и 
таблиц располагаются в файле db.txt. В файле connect.php выполняется 
подключение к бд. Файл databaseFilling.php отвечает за наполнение базы 
новыми записями. В конце выполнения возвращает количество добавленных постов
и комментариев. Файл searchAjax.php. выполняет поиск введенной строки по 
комментариям, загруженным в бд.
