<!-- INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES ('1', 'python', 'python is interpreted language', current_timestamp()); -->

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
    #ques{
        min-height:433px;
    }
</style>
<body>
    <?php include 'partials/_headers.php'; ?>
    <?php include 'partials/_dbconnect.php'; ?>
    <!-- slider -->
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x800/?apple,code" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x800/?programmers,microsoft" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x800/?coding,apple" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- category container starts here  -->
    <div class="container text-center my-3" id="ques">
        <h1>iDiscuss- Browse Categories</h1>
        <div class="row my-3">
            <!-- fetch all the categories  -->
            <?php 
         $sql="SELECT * FROM `categories` "; 
         $result=mysqli_query($conn,$sql);
                  while($row=mysqli_fetch_assoc($result)){
                    // echo $row['category_id'];
                    // echo $row['category_name'];
                    $catid=$row['category_id'];
                    $cat=$row['category_name'];
                    $desc=$row['category_description'];
                    echo '<div class="col-md-4 my-2">
                    <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/500x400/?' . $cat. ',coding" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="threadlist.php?catid='. $catid.' ">'. $cat. '</a></h5>
                            <p class="card-text">'.substr($desc,0,100).'.........</p>
                            <a href="threadlist.php?catid='. $catid.' " class="btn btn-primary">View Thread</a>
                        </div>
                        </div>
                        </div>';
                  }
        ?>
            <!-- iterate here for a loop -->

        </div>
    </div>
    <?php  include 'partials/_footers.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>