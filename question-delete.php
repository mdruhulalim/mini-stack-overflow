<?php
include('login-check.php');
include('inc/header.php');
// question value
include('core/question.php');
$getOneQuestion = new Question;
$getOneQuestion = $getOneQuestion->getOneQuestion($_GET['q_id']);
$getOneQuestion = $getOneQuestion[0];
// check right person who submit the question
if($getOneQuestion['user_id'] != $_SESSION['ID']){
    echo "<p class=' row mt-5 text-danger justify-content-center';>You are week try again</p>";
    exit;
}
if(isset($_GET['q_id'])){
    $deleteQuestion = new Question;
    $deleteQuestion->deleteQuestion($_GET['q_id']);
    header('Location: index.php');
}
?>

<?php
// include('inc/footer.php');