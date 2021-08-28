<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Upload CSV File</title>
</head>

<body>

    <?php
    include "navbar.php";
?>

    <?php
if(isset($_POST['submit']))
{
    $file = $_FILES['file'];

    $name = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $type = $_FILES['file']['type'];

    $fileExt = explode('.', $name);
    $actualExt = strtolower(end($fileExt));

    $allowed = array('csv');

    if(in_array($actualExt, $allowed))
    {
    if($error == 0){
        if($size < 1000000){
            if(!file_exists($name)){
                $destination = 'F:/Software/XAM/htdocs/job-3/'.$name;

                move_uploaded_file($tmpName, $destination);
                echo ' <script>
                alert("File upload successful");
                </script>';
            }
            else{
                echo ' <script>
                alert("File/File-name already exist!");
                </script>';
            }
        }
        else{
            echo ' <script>
            alert("Your file is to big.");
            </script>';
        }
    }
    else {
        echo ' <script>
        alert("There was an error uploading your file");
        </script>';
    }
    }

    else{
       echo ' <script>
       alert("You can\'t upload files of this type");
       </script>';
    }
    //print_r($name);
} 

?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-head">
                        <h1 class="text-center">File Upload</h1>
                    </div>
                    <div class="card-body">

                        <form action="choose.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label for="file" class="form-label">Upload your desired CSV file</label>
                                <input class="form-control" type="file" name="file" id="file" accept=".csv">
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>