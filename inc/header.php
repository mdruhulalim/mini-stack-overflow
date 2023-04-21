<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mini-stack-overflow</title>
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <header class="container">
            <a class="navbar-brand" href="index.php">
                <img src="media/stack-overflow.png" alt="media/stack-overflow.png" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if(isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="question-add.php">Question-Add</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="log-out.php"><?=$_SESSION['username']?> [Log-out]</a>
                    </li>
                    <li class="nav-item">
                        <!-- Search Query -->
                        <form class="form-inline my-2 my-lg-0" action="" method="GET">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="q">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="sign-in.php">Sign-in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sign-up.php">Sign-up</a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </header>
    </nav>