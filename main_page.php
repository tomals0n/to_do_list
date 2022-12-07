<?php
require_once 'connect.php';
$connection = @new mysqli($host, $user, $password, $db_name);

$create_table = mysqli_query($con, "CREATE TABLE IF NOT EXISTS `todo` (id INT(11) KEY AUTO_INCREMENT,
description VARCHAR(255) NOT NULL,
type VARCHAR(11) NOT NULL)");


if(isset($_POST['submit'])) {




    if($connection->connect_errno!=0) {

        echo 'Error: '.$polaczenie->connect_errno.'Description: '.$polaczenie->connect_error;
    }

    else {
        $desc = $_POST['desc'];
        $sql = "INSERT INTO todo (description, type) VALUES ('$desc', 'to-do')";
        

         if ($connection->query($sql) === FALSE) {
                echo "Error: " . $sql . "<br>" . $connection->error;
            }
            

        }


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>to-do list</title>
    <link rel='stylesheet' href='style.css'>
</head>
<body>
    <div class="search-container">
        <div class="form-container">
            <form method='post'>
                <h1>ADD ITEM</h1>
                <input type="text" name="desc" required placeholder="Input description">
                <input type="submit" name="submit" value="ADD TO LIST" class="form-btn">
            </form>
        </div>
    </div>
    <div class="todo_list-container">
        <div class="to_do-container">
            <h1>TO-DO LIST:</h1>
            <?php
                require_once 'connect.php';
                $sql2 = "SELECT * FROM todo";
                $connection = @new mysqli($host, $user, $password, $db_name);
                if($result = $connection->query($sql2)){
                    $all_records = $result->num_rows;
                    if($all_records>0){
                        while($row = $result->fetch_assoc()) {
                            $item_id = $row['id'];
                            $description = $row['description'];
                            $item_type = $row['type'];
                            if($item_type == 'to-do'){
                                echo "<h3>➼ ".$description." ";
                                echo "<a class='to-done' href='main_page.php?done_task=".$row['id']."'>✔</a>";
                                if (isset($_GET['done_task'])) {
                                    $item_id = $_GET['done_task'];
                                    mysqli_query($connection, "UPDATE todo SET type='done' WHERE id='$item_id'");
                                    header('location:main_page.php');
                                }
                            }
                        }
                        $result->close();
                    }
                }

            ?>
        </div>
        <div class="done-container">
            <h1>DONE LIST:</h1>
            <?php
                require_once 'connect.php';
                $sql = "SELECT * FROM todo";
                $connection = @new mysqli($host, $user, $password, $db_name);
                if($result = $connection->query($sql2)){
                    $all_records = $result->num_rows;
                    if($all_records>0){
                        while($row = $result->fetch_assoc()) {
                            $item_id = $row['id'];
                            $description = $row['description'];
                            $item_type = $row['type'];
                            if($item_type == 'done'){
                                echo "<h3>➼ ".$description." ";
                                echo "<a class='to-delete' href='main_page.php?delete_task=".$row['id']."'>✘</a>";
                                if (isset($_GET['delete_task'])) {
                                    $item_id = $_GET['delete_task'];
                                    mysqli_query($connection, "DELETE FROM todo WHERE id='$item_id'");
                                    header('location:main_page.php');
                                }

                            } 
                        }
                        $result->close();
                    }
                }

            ?>
        </div>
    </div>
</body>
</html>
