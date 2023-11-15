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
    $id=$_GET['threadid'];
     $sql="SELECT * FROM `threads` WHERE thread_id=$id "; 
     $result=mysqli_query($conn,$sql);
     $noResult=true;
     while($row=mysqli_fetch_assoc($result)){
        $noResult=false;
        $title=$row['thread_title'];
        $desc=$row['thread_desc'];
     }
    //  if($noResult){
    //     echo '<div class="jumbotron jumbotron-fluid">
    //             <div class="container">
    //                 <p class="display-4">No Threads found</p>
    //                 <p class="lead">Be the first person to ask the question</p>
    //             </div>
    //             </div>';
    // }
    
    ?>

    <?php
        $showAlert=false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
            $comment=$_POST['comment'];
            $sql="INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`)
             VALUES ( '$comment', '$id', '0', current_timestamp());";
            $result=mysqli_query($conn,$sql);
            $showAlert=true;
            if($showAlert){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your comment has been added!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }

        }
        ?>

    <!-- category container starts here  -->
    <div class="container my-3" id="ques">
        <div class="jumbotron">
            <h1 class="display-4"> <?php echo $title ; ?> </h1>
            <p class="lead"><?php echo $desc ; ?> </p>
            <hr class="my-4">
            <p>This is a peer to peer form for sharing the knowledge..</p>
            <p><b>Posted by Astha singh</b></p>
        </div>
    </div>
    </div>
    <div class="container">
        <h1 class="py-2">Post a comment</h1>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type you comment</label>
                <textarea id="comment" name="comment" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-success btn-lg mt-2">Post Comment</button>
        </form>
    </div>

    <div class="container">
        <h1 class="py-3">Discussions</h1>
        <?php
        $id=$_GET['threadid'];
        $sql="SELECT * FROM `comments` WHERE thread_id=$id "; 
        $result=mysqli_query($conn,$sql);
        $noResult=true;
        while($row=mysqli_fetch_assoc($result)){
            $noResult=false;
            $content = $row['comment_content'];  
            $comment_time=$row['comment_time'];
            $id = $row['comment_id'];
            echo '<div class="media my-3">
                <img src="user.jpg" width="54px" class="mr-3" alt="...">
                <div class="media-body">
                <p class="my-0"><b>Anonymous user at '.$comment_time.'</b></p>
                '. $content . ' 
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