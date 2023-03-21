<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Apply Exam</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">

    <link href="css/basvuru.css" rel="stylesheet">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>
  <body class="text-center" style="background-image: url('pictures/cool-background.jpg');  background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
    
<main class="form-signin w-100 m-auto" style="background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 15px;" >

<?php
    if(isset($_POST['apply'])){
      $stuName = $_POST['studentName'];
      $stuPhone = $_POST['studentPhone'];
      $stuId = $_POST['id'];
      $schoolName = $_POST['schoolName'];
      $stuGrade = $_POST['grade'];
      $parentName = $_POST['parentName'];
      $parentPhone = $_POST['parentPhone'];

      $stuIdTrimmed = trim($stuId);
      $stuIdLenght = strlen($stuIdTrimmed);
      
      $stuPhoneTrimmed = trim($stuPhone);
      $stuPhoneLenght = strlen($stuPhoneTrimmed);

      $parentPhoneTrimmed = trim($parentPhone);
      $parentPhoneLenght = strlen($parentPhoneTrimmed);

      if($stuName != "" && $stuId != "" && $schoolName != "" && $parentName != "" && $parentPhone != ""){
        if($stuIdLenght == 11){
          if($stuPhoneLenght == 0 || $stuPhoneLenght <= 14 && $stuPhoneLenght >= 10){
            if($stuGrade != "Grade"){
              if($parentPhoneLenght <= 14 && $parentPhoneLenght >= 10){
                $idControl = $DBConnection->prepare("SELECT * FROM appliciations WHERE stuId = ?");
                $idControl->execute([$stuIdTrimmed]);
                $idControlCount = $idControl->rowCount();
                if($idControlCount > 0){
                  echo '<div class="text-center alert alert-danger">Student already applyed!</div>';
                }else{
                  mysqli_query($conn, "INSERT INTO `appliciations` (stuId, stuName, stuPhone, schoolName, stuGrade, parentName, parentPhone) VALUES('$stuIdTrimmed', '$stuName', '$stuPhone', '$schoolName', '$stuGrade', '$parentName', '$parentPhone')") or die('query failed');
                  echo '<div class="text-center alert alert-success">Apply Succesfuly Registered!</div>';
                }
              }else{
                echo '<div class="text-center alert alert-danger">Parent phone number declined!</div>';
              }
            }else{
              echo '<div class="text-center alert alert-danger">Grade must be filled!</div>';
            }
          }else{
            echo '<div class="text-center alert alert-danger">Student phone number declined!</div>';
          }
        }else{
          echo '<div class="text-center alert alert-danger">Id number has to be 11 digit!</div>';
        }
      }else{
        echo '<div class="text-center alert alert-danger">Please fill the form completely!</div>';
      }
    }
  ?>


  <form method="post" action="">
    <img class="mb-2" src="pictures/logo.png" alt="" width="90">
    <h4 class="mb-3 fw-normal">2022-2023 Academic Term Course Scholarship Exam Application Form</h4>

    <div class="form-floating mb-2">
          <input type="text" class="form-control" placeholder="studentName" name="studentName">
          <label for="floatingInput">Student Name and Surname<sup>*<sup></label>
        </div>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" placeholder="studentPhone" name="studentPhone">
      <label for="floatingPassword">Student Phone Number</label>
    </div>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" placeholder="id" name="id">
      <label for="floatingPassword">Id Number<sup>*<sup></label>
    </div>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" placeholder="schoolName" name="schoolName">
      <label for="floatingPassword">School Name<sup>*<sup></label>
    </div>

    <select class="form-select mb-2" aria-label="Default select example" name="grade">
        <option selected>Grade</option>
        <option value="4">4. grade</option>
        <option value="5">5. grade</option>
        <option value="6">6. grade</option>
        <option value="7">7. grade</option>
        <option value="8">8. grade</option>
        <option value="9">9. grade</option>
        <option value="10">10. grade</option>
        <option value="11">11. grade</option>
        <option value="12">12. grade</option>
    </select>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" placeholder="parentName" name="parentName">
      <label for="floatingPassword">Parent Name and Surname<sup>*<sup></label>
    </div>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" placeholder="parentPhone" name="parentPhone">
      <label for="floatingPassword">Parent Phone Number<sup>*<sup></label>
    </div>

    </div>

    <button class="w-100 btn btn-lg btn-warning mt-3" type="submit" name="apply">Apply</button>
    <p class="mt-4 mb-3 text-muted">&copy; Copyrigh<a style="text-decoration: none; cursor:default;" href="index.php?page=2">t</a> 2022 / ... Company Name</p>
  </form>
</main>


  </body>
</html>
