<?php
include('login-check.php');
include('inc/header.php');
// start SQL query
$empty = [];
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $details = $_POST['details'];
    $user_id = $_SESSION['ID'];

    // check empty
    if(empty($title)){
        $empty['titleEmpty'] = "<p class='text-danger';>Please Inter your Question title here</p>";
    }
    if(empty($details)){
        $empty['detailsEmpty'] = "<p class='text-danger';>Please Inter your Question details here</p>";
    }

    // addQuestion
    if(empty($empty)){
        include('core/question.php');
        $addQuestion = new Question;
        $addOneQuestion = $addQuestion->addQuestion($title, $details, $user_id);
        if(empty($empty)){
            $questionAddSuccess = "<p class='text-success';>Successfully add your question</p>";
        }
    }
}
?>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-8">
            <!-- start add question -->
            <div class="card">
                <div class="card-header">
                    <h5>Add your question</h5>
                    <?php
                    if(isset($questionAddSuccess)){
                        echo $questionAddSuccess;
                    }
                    ?>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <?php
                            if(isset($empty['titleEmpty'])){
                                echo $empty['titleEmpty'];
                            }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="description">details:</label>
                            <textarea class="form-control" id="textarea" name="details"></textarea>
                            <?php
                            if(isset($empty['detailsEmpty'])){
                                echo $empty['detailsEmpty'];
                            }
                            ?>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        <button type="button" class="btn btn-secondary"><a class="text-decoration-none text-white" href="index.php">Cancel</a></button>
                    </form>
                </div>
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
?>