<?php
include('login-check.php');
include('inc/header.php');
// show question value
include('core/question.php');
$getQuestion = new Question;
$getQuestion = $getQuestion->getOneQuestion($_GET['q_id']);
$getQuestion = $getQuestion[0];
// check right person who submit the question
if(isset($_SESSION['ID']) && $getQuestion['user_id'] != $_SESSION['ID']){
    echo "<p class=' row mt-5 text-danger justify-content-center';>You are weak try again  :)</p>";
    exit;
}
// strat updateQuestion SQL query
if(isset($_POST['submit'])){
    $updateQuestion = new Question;
    $updateQuestion = $updateQuestion->updateQuestion($_POST['title'], $_POST['details'], $_GET['q_id']);
}
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <!-- start add question -->
            <div class="card">
                <div class="card-header">
                    <h5>Update your question</h5>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" value="<?=$getQuestion['title']?>" id="title" name="title">
                            
                        </div>
                        
                        <div class="form-group">
                            <label for="description">details:</label>
                            <textarea class="form-control" id="textarea" name="details"><?=$getQuestion['details']?></textarea>
                            
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="button" class="btn btn-secondary"><a class="text-decoration-none text-white" href="index.php">Cancel</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: 'textarea'
    });
</script>
<?php
include('inc/footer.php');