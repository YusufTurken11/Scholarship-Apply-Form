<?php
    if(isset($_SESSION['user'])){
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<header class="p-3 text-bg-dark mb-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <a href="index.php">
                    <img src="pictures/logo.png" alt="" width="50">
                </a>
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li class="nav-link px-2 text-white">Welcome, <?= $userName?></li>
                <!--Buraya isim gelecek query yazılacak-->
            </ul>

            <div class="text-end">
                <a href="index.php" style="text-decoration: none;">
                    <button type="button" class="btn btn-outline-light me-2">Homepage</button>
                </a>
                <a href="index.php?page=3" style="text-decoration: none;">
                    <button type="button" class="btn btn-warning">Logout</button>
                </a>
            </div>
        </div>
    </div>
</header>


<h1 class="text-center mb-3"><b><u>Application List</u></b></h1>

<div class="row m-auto">
    <div class=".col-md-8 .offset-md-2">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <th style="background-color: darkblue; color: white;" class="text-center">Grade</th>
                <th style="background-color: darkgreen; color: white;" class="text-center">Name Surname</th>
                <th style="background-color: darkblue; color: white;" class="text-center">Id Number</th>
                <th style="background-color: darkgreen; color: white;" class="text-center">Student Phone Number</th>
                <th style="background-color: darkblue; color: white;" class="text-center">School Name</th>
                <th style="background-color: darkgreen; color: white;" class="text-center">Parent Name</th>
                <th style="background-color: darkblue; color: white;" class="text-center">Parent Phone Number</th>
                <th style="background-color: darkgreen; color: white;" class="text-center">Register Time</th>
            </thead>

            <tbody>
                <?php
                    $stuQuery = mysqli_query($conn, "SELECT * FROM `appliciations`") or die('query failed');
                    if(mysqli_num_rows($stuQuery) > 0){
                        while($fetch_appliciations = mysqli_fetch_assoc($stuQuery)){
                            $stuGrade = $fetch_appliciations['stuGrade'];
                            $stuName = $fetch_appliciations['stuName'];
                            $stuId = $fetch_appliciations['stuId'];
                            $stuPhone = $fetch_appliciations['stuPhone'];
                            $schoolName = $fetch_appliciations['schoolName'];
                            $parentName = $fetch_appliciations['parentName'];
                            $parentPhone = $fetch_appliciations['parentPhone'];
                            $time = $fetch_appliciations['time'];
                ?>
                <tr>
                    <td class="text-center"><?= $stuGrade ?>.grade</td>
                    <td class="text-center"><?= $stuName ?></td>
                    <td class="text-center"><?= $stuId ?></td>
                    <td class="text-center"><?= $stuPhone ?></td>
                    <td class="text-center"><?= $schoolName ?></td>
                    <td class="text-center"><?= $parentName ?></td>
                    <td class="text-center"><?= $parentPhone ?></td>
                    <td class="text-center"><?= $time ?></td>
                </tr>
                <?php
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
    }else{
        header("refresh:0, url=index.php");
    }
?>