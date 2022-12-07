# to_do_list
Simple to-do made in PHP
## What you need to run it?
- XAMPP and start Apache and MySQL 
- Type in browser localhost:8080/phpmyadmin
- Create "todo_list" database and TABLE todo | id int(255) NOT NULL AUTO INCREMENT, description varchar(255) NOT NULL, type varchar(255) NOT NULL (made it to create if not exists but may be bugged)
- Create folder in XAMPP > htdocs
- Enter in browser: localhost:8080/your_folder_name/main_page.php
## Updates
- Added auto increment to id, now you can just type description of your task
- Hide id of task and fix visual bugs

### You can add your task and it will automatically go to "TO-DO LIST"

<img src='https://i.imgur.com/Ad5FnuM.png'/>

### You can mark your tasks as done by clicking green check mark and it will automatically go to "DONE LIST"

<img src='https://i.imgur.com/VTV6XHV.png'/>

### And at the end you can delete tasks by clicking "X"

<img src='https://i.imgur.com/EJJTNVf.png'/>
