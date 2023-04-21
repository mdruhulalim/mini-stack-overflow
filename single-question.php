<?php
include('login-check.php');
include('inc/header.php');
// start SQL query
include('core/question.php');
// start getOneQuestion
$getOneQuestion = new Question;
$getOneQuestion = $getOneQuestion->getOneQuestion($_GET['q_id']);
// echo "<pre>";
// print_r($getOneQuestion);
// echo "</pre>";
// start addAnswer
if(isset($_POST['submit'])){
    $addAnswer = new Question;
    $addAnswer = $addAnswer->addAnswer($_GET['q_id'], $_SESSION['ID'], $_POST['details']);
}
// start getAnswer
$getAnswer = new Question;
$getAnswer = $getAnswer->getAnswer($_GET['q_id']);
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <!-- start getOneQuestion details -->
            <div class="card">
                <div class="card-header text-success">
                    <h6><?=$getOneQuestion[0]['title']?></h6>
                </div>
                <div class="card-body">
                    <?=$getOneQuestion[0]['details']?>
                </div>
            </div>
            <!-- start addAnswer -->
            <div class="card mt-3">
                <div class="card-header">
                    <h6>Add your answer</h6>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="description">details:</label>
                            <textarea class="form-control" id="textarea" name="details"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="button" class="btn btn-secondary"><a class="text-decoration-none text-white" href="index.php">Cancel</a></button>
                    </form>
                </div>
            </div>
            <!-- getAnswer -->
            <?php
                foreach($getAnswer as $ga){
            ?>
            <div class="card mt-3">
                <div class="card-header">
                    <h6>This answer from <?=$ga['username']?></h6>
                </div>
                <div class="card-body">
                    <p><?=$ga['details']?></p>
                    <!-- mark answers -->
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- start tiny editor script -->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: 'textarea'
    });
</script>
<?php
include('inc/footer.php');