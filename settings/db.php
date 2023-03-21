<?php
try {
    $conn = mysqli_connect('localhost','root','','apply_exam') or die('Connection Failed');

    $DBConnection = new PDO("mysql:host=localhost;dbname=apply_exam;charset=utf8;",'root','');

}catch(PDOException $hata_adi){
    echo $hata_adi->getMessage();
}

if(isset($_SESSION['user'])){
    
    $userData = $DBConnection->prepare("SELECT * FROM admin_users where username = ? LIMIT 1");
    $userData->execute([$_SESSION['user']]);
    $userDataCount = $userData->rowCount();
    $userData = $userData->fetch(PDO::FETCH_ASSOC);

    if ($userDataCount > 0){//Fetch Data
        
        $userName = $userData['username'];
        
    }
}