<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Table Creating Page</title>
</head>

<body>

    <?php
    include "database.php";
    include "navbar.php";
    include "fileName.php";

    ?>


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-5">
                    <div class="card-head">
                        <h1 class="text-center">Table</h1>
                    </div>
                    <div class="card-body">

                        <form action="table.php" method="post">
                            <div class="mb-3">
                                <label for="num" class="form-label">Select the file number from above mentioned
                                    Table</label>
                                <input type="number" class="form-control" name="num" id="num">

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $num = $_POST['num'];
        //echo $num;
        // header("location:table.php?nm='.$num.'");



        //include "getFileName.php";
        //include "chooseNumber.php";
        //$pi = $_GET['num'];
        $handle;
        if (($handle = fopen($filename[$num], "r")) !== FALSE) {
            $str = "";
            $a = "";
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {

                // making query readable string
                $str .= $data[1] . " " . $data[4] . ",";

                // taking table name from csv file
                if (empty($a)) {
                    $a = $data[0];
                }
            }
            // removing last element(,) from the string
            $str = substr($str, 0, -1);

            // the query
            $sql = "CREATE table $a($str)";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '
               <script>
               alert("Table creation successful");
               </script>';
            } else {
                echo mysqli_error($conn);
            }

            // Closing CSV file.
            fclose($handle);
        }
    }

    ?>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>