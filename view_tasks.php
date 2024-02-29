<?php session_start();
include ("config.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1 class="text-center">View Task</h1>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-9">

        <?php
        if(isset($_GET['id']))

            $id = $_GET['id'];
            $users = "SELECT * FROM `tasks` WHERE `id` = '$id'";
            $users_run = mysqli_query($con, $users);

            if(mysqli_num_rows($users_run) > 0)
                foreach($users_run as $user)
                ?>

            <form action="process.php" method="POST">

            <input type="hidden" name="id" value="<?=$user['id'];?>">

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" value="<?=$user['title'];?>" name="title" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="description" value="<?=$user['description'];?>" name="description" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="priority" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="priority" value="<?=$user['priority'];?>" name="priority" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label for="due_date" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="due_date" value="<?=$user['due_date'];?>" name="due_date" readonly>
                    </div>

                    <div class="col-md-12 mb-3 text-center">
                    <a type="button" class="btn btn-outline-primary" href="index.php">RETURN</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>