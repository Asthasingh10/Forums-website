<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iDiscuss- Coding Forums</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
#ques {
    /* min-height:433px; */
}
</style>

<body>
    <?php include 'partials/_headers.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php
    $id=$_GET['catid'];
     $sql="SELECT * FROM `categories` WHERE category_id=$id "; 
     $result=mysqli_query($conn,$sql);
     while($row=mysqli_fetch_assoc($result)){
        $catname=$row['category_name'];
        $catdesc=$row['category_description'];
     }
    ?>
    <?php
    $showAlert=false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        $sql="INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) 
        VALUES ( '$th_title', '$th_desc', '$id', '0', current_timestamp())";
        $result=mysqli_query($conn,$sql);
        $showAlert=true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added! Please wait while someone response.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }

    }
    ?>
    <!-- category container starts here  -->
    <div class="container my-3" id="ques">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname ; ?> </h1>
            <p class="lead"><?php echo $catdesc ; ?> </p>
            <hr class="my-4">
            <p>This is a peer to peer form for sharing the knowledge..</p>
            <a href="#" class="btn btn-success btn-lg" role="button">Learn more</a>
        </div>
    </div>
    </div>
    <div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="titleHelp">
                <div id="titleHelp" class="form-text">Keep your title crisp and short as possible.</div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Elaborate your concern</label>
                <textarea id="desc" name="desc" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-lg mt-2">Submit</button>
        </form>
    </div>
    <div class="container">
        <h1 class="py-3">Browse Question</h1>
        <?php
                $id=$_GET['catid'];
                $sql="SELECT * FROM `threads` WHERE thread_cat_id=$id "; 
                $result=mysqli_query($conn,$sql);
                $noResult=true;
                while($row=mysqli_fetch_assoc($result)){
                    $noResult=false;
                    $title = $row['thread_title'];
                    $desc = $row['thread_desc'];    
                    $id = $row['thread_id'];
                     echo '<div class="media my-3">
                        <img src="user.jpg" width="54px" class="mr-3" alt="...">
                        <div class="media-body">
                        <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid= '.$id.' ">'. $title . '</a></h5>
                        '. $desc . ' 
                        </div>
                        </div>';
                }
                // echo var_dump($noResult);
                if($noResult){
                    echo '<div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <p class="display-4">No Threads found</p>
                                <p class="lead">Be the first person to ask the question</p>
                            </div>
                            </div>';
                }
                ?>
    </div>
    <?php  include 'partials/_footers.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>