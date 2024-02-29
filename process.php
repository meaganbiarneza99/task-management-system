<?php session_start();    
include ("config.php");

// Query for adding task data
if(isset($_POST["add"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];
    
    $query = "INSERT INTO `tasks` (`title`, `description`, `priority`, `due_date`) VALUES ('$title', '$description', '$priority', '$due_date')";

    $query_result = mysqli_query( $con, $query );

    // Code for sweet alert message and for next location
    if($query_result){
        $_SESSION['status'] = "Task Added!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }
}

// Query for updating task data
if(isset($_POST["submit"])){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $query = "UPDATE `tasks` SET `title`='$title',`description`='$description',`priority`='$priority',`due_date`='$due_date' WHERE `id` = '$id'";

    $query_result = mysqli_query( $con, $query );

    // Code for sweet alert message and for next location
    if($query_result){
        $_SESSION['status'] = "Task Updated Successfully!";
        $_SESSION['status_code'] = "success";
        header("Location: index.php");
        exit();
    }
}
?>