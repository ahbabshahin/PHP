<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Dynamic Form</title>
</head>

<body>

    <?php
    include "database.php";
    include "navbar.php";
    //include "wordCount.php";
    include "test.php";

    $arr = "";
  
    // array d is storing the index of radio array specially keywords index. Ex gender, race.
   //$k;
   $imgIndex = 0;
    if($radioIndex[0] == 0){
        $k = 1;
    }
    else{
        $k = 0;
    }

    if($checkboxIndex[0] == 0){
        $x = 1;
    }
    else{
        $x = 0;
    }

    if($selectIndex[0] == 0){
        $y = 1;
    }
    else{
        $y = 0;
    }

    $s = 1;
    $t = 1;
    $z = 1;
    $temp = array();
   $pi = $_GET['num'];
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card ">
                    <div class="card-body">
                        <?php
        echo'<form action="/job-3/testForm.php?num='.$pi.'" method="post">';
            
            // iterating loop by name array's size case here we are creating text box or radio button the amount of this creation should be the number of name
            for ($i=0; $i < count($name); $i++) { 

            // searching for radio button. Radio button have to be handeled seperately.
                $b = array_search('radio', $type);
                $check = array_search('checkbox', $type);
                $slt = array_search('select', $type);
                $dtl = array_search('datetime-local', $type);
                $pass = array_search('password', $type);
                $user = array_search('text', $type);
                $number = array_search('number', $type);
                $color = array_search('color', $type);
                $range = array_search('range', $type);
                $tel = array_search('tel', $type);
                $email = array_search('email', $type);
                $img = array_search('image', $type);

                 // Cross-matching the index and getting the specific place and doing this procedure for other input types.
                if($i == $user){
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>
                    <input type="'.$type[$i].'" class="form-control" name = "'.$name[$i].'" id="'.$i.'" aria-describedby="emailHelp">
                    </div>';
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                    }

                // Password area
                else if($i == $pass){
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>
                    <input type="'.$type[$i].'" class="form-control" name = "'.$name[$i].'" id="'.$i.'" aria-describedby="emailHelp"></div>';
                    // echo "i = ".$i."<br>";
                    // echo"Type :". $type[$i]."<br>";
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                }

                else if($i == $email)
                {
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>
                    <input type="'.$type[$i].'" class="form-control" name = "'.$name[$i].'" id="'.$i.'" aria-describedby="emailHelp">
                    </div>';
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                }
                
                // Number area
                else if($i == $number){
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>
                    <input type="'.$type[$i].'" class="form-control" name = "'.$name[$i].'" id="'.$i.'" aria-describedby="emailHelp">
                    </div>';
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                    }

                else if($i == $color)
                { 
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>
                    <input type="'.$type[$i].'"  name = "'.$name[$i].'" id="'.$i.'" aria-describedby="emailHelp">
                    </div>';
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                }

                else if($i == $range)
                { 
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].' (between 0 and 100):'.'</label>
                    <input type="'.$type[$i].'"  name = "'.$name[$i].'" id="'.$i.'">
                    </div>';
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                }
//pattern="[0-9]{5}-[0-9]{6}"
                else if($i == $tel)
                { 
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>
                    <input type="'.$type[$i].'" class="form-control" name="'.$name[$i].'" id="'.$i.'" placeholder="01620761863" aria-describedby="emailHelp">
                    </div>';
                    //$arr6 .= htmlentities($name[$i], ENT_QUOTES);
                    $arr .= $name[$i]." ";
                    $type[$i] = 'done';
                }

                else if($i == $img){
                    echo '<div class="mb-3">
                    <label for="'.$i.'" class="form-label">'.$name[$i].'</label>';
                    //for ($j=0; $j < count($image); $j++) { <input type="image" src="'.$str6.'" width="48" height="48"class="form-control" >
                    echo '
                    <input type="'.$type[$i].'" src="'.$image[$imgIndex++].'"
                    name="'.$name[$i].'" id="'.$i.'" width="100" height="50">
                    
                    </div>';
                   // }
                   
                    //$arr .= $name[$i]." ";
                    $type[$i] = 'done';
                }
            
                else  if($i == $b)
                {
                   echo' <label for="rdo" class="form-label">'.$name[$i].'</label>';
                
                    for ($j = $s; $j < count($radio); $j++) { 
                        // to avoid printing keyword we are using this condition.
                        if($j < $radioIndex[$k]){
                        echo'<div class="form-check">
                        
                        <input class="form-check-input" type="'.$type[$i].'" name="'.$name[$i].'" id="rdo" Value="'.$radio[$j].'">
                        <label class="form-check-label" for="rdo"> '.$radio[$j].'
                        </label>
                        </div>';
                        }
                        
                        else if($j >= $radioIndex[$k]){
                            // to avoid getting the same radio button value we are replacing the keyword by done.
                            $type[$i] = 'done';
                           
                            // changing the the d array value
                            $k++;

                            // to get the other radio value we are updating loop index.
                            $s = $j;
                            $s++;
                        break;
                        }
                    }
                    //echo "i = ".$i."<br>";
                   // echo"Type :". $type[$i]."<br>";
                   $arr .= $name[$i]." ";
                }


                // Checkbox printing part

                else if($i == $check){
                    $temp = $name[$i];
                    echo ' <label class="form-check-label" for="exampleCheck1">'.$temp.'</label>';
                    
                    for ($j=$t; $j < count($checkbox); $j++) { 
                        if($j < $checkboxIndex[$x]){
                        echo '<div class="mb-3 form-check">
                      <input type="'.$type[$i].'" class="form-check-input" name="a" id="'.$name[$i].'" Value="'.$checkbox[$j].'">
                    <label class="form-check-label" for="exampleCheck1">'.$checkbox[$j].'</label>
                  </div>';
                // $arr3 .= $_POST['a']." ";
                        }

                        else if($j >= $checkboxIndex[$x]){
                            // to avoid getting the same radio button value we are replacing the keyword by done.
                            $type[$i] = 'done';
                           
                            // changing the the d array value
                            $x++;
                            //$d++;
                            // to get the other radio value we are updating loop index.
                            $t = $j;
                            $t++;
                        break;
                        }
                    }
                    //$arr3 .= implode(',',a);
                   //$arr3 .= $temp." ";
                }


                // Selection box area
                else if($i == $slt){
                echo ' <label class="form-check-label" for="exampleCheck1">'.$name[$i].'</label>';
                echo '<div class="mb-3 form-check">
                <select class="form-select" name = "'.$name[$i].'" aria-label="Default select example">';
                for ($j= $z; $j < count($select); $j++) { 
                    if($j < $selectIndex[$y]){
                    echo'<option value="'.$select[$j].'">'.$select[$j].'</option>';
                    }
                    else if($j >= $selectIndex[$y]){
                         // to avoid getting the same selection  value we are replacing the keyword by done.
                         $type[$i] = 'done';
                           
                         // changing the the d array value
                         $y++;

                         // to get the other radio value we are updating loop index.
                         $z = $j;
                         $z++;
                     break;
                    }
                }
                
                echo '</select>
                </div>';

                $arr .= $name[$i]." ";
                }


                // Date Time Local
                else if($i == $dtl){
               echo' <div class="mb-3">
                <label for="'.$i.'" class="form-label">'.$name[$i].'</label><br>
                <input type="'.$type[$i].'" name="'.$name[$i].'" id="'.$name[$i].'">
                </div>';
                
                $arr .= $name[$i]." ";
                $type[$i] = 'done';

                }               
   
            }
            

            echo'<button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
        </div>
        </div>
        </div>
    </div>';


       //echo "arr3 :". $arr3. '<br>';

    // making array from string
    $array = str_word_count($arr, 1);

    $arr2 = "";

    // you should know what it is.
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        for ($i=0; $i < count($array); $i++) { 
            $arr2 .= "'".$_POST[$array[$i]]."',";
        }

      // deleting last element(,) of the string
      $arr2 = substr($arr2, 0, -1);

    //    $cnt = 0;
    //     foreach($_POST as $key => $value)
    //     {
            
    //         if($key == "a")
    //         {
    //             foreach($value as $key1 => $value1)
    //             $arr3 .= "'".$value1."',";
                
    //         }
    //         //echo $cnt++;
    //     }

    // $arr2 .= $arr3;
        //echo $_POST[$arr3]." ";

    // if(!empty($arr5)){
    //     //if(!empty($arr4)){
    //     $arr2 .="'".date('Y-m-d h:i:s', strtotime($_POST[$arr5]))."'";
    //     // }

    //     // else if(empty($arr4)){
    //     //     $arr2 .="'".date('Y-m-d h:i:s', strtotime($_POST[$arr5]))."'";
    //     // }
    // }

    //echo $arr2;


    // query
    $sql = "INSERT into $a($str3) value($arr2)";
    //$sql = "INSERT into $a(Username, Password, Gender) value($arr2)";
    $result = mysqli_query($conn, $sql);

        if($result)
           {
               echo'
               <script>
               alert("Insertion successful");
               </script>';
           }

           else {
               echo mysqli_error($conn);
           }
    }
     
    ?>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous">
        </script>

                        <!-- Option 2: Separate Popper and Bootstrap JS -->
                        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>