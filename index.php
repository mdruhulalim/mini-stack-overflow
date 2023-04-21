<?php
include('login-check.php');
include('inc/header.php');
// start getQuestion SQL query
include('core/question.php');
$getQuestion = new Question;
// search code
$search = "";
if(isset($_GET['q'])){
    $search = $_GET['q'];
}
$getQuestion = $getQuestion->getQuestion($search);
// end getQuestion SQL query
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <!-- print question title and creator username and created time -->
            <?php
                foreach($getQuestion as $q){
                    $link = "single-question.php?q_id=".$q['ID'];
                    $linkForUpdate = "question-update.php?q_id=".$q['ID'];
                    $linkForDelete = "question-delete.php?q_id=".$q['ID'];
                    ?>
                    <div class="card mb-3 p-2">
                        <?php
                        ?>
                        <a class="text-decoration-none text-success" href="<?=$link?>"><h5><?=$q['title']?></h5></a>
                        <small><?=$q['username']?> || <?=date('d M, y',strtotime($q['created_at']))?></small>
                        <?php
                        if(isset($_SESSION['ID']) && $q['user_id'] == $_SESSION['ID']){
                        ?>
                        <div class="updateDelete">
                            <button type="button" class="btn"><a class="text-decoration-none text-secondary" href="<?=$linkForUpdate?>">Update</a></button>
                            <button type="button" class="btn"><a class="text-decoration-none text-secondary" href="<?=$linkForDelete?>" onclick="return confirm('Are you sure?')">Delete</a></button>
                        </div>
                        <?php } ?>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<?php
include('inc/footer.php');