<?php
include "database.php";
include "getFileName.php";
//include "chooseNumber.php";
$pi = $_GET['num'];
    if (($handle = fopen($filename[$pi], "r")) !== FALSE) 
    { 
        $str = "";
        $str1 = "";
        $str2 = "";
        $str3 = "";
        $str4 = "";
        $str5 = "";
        $str6 = "";
        $a = "";
        $cnt = 0;
   

        while (($data = fgetcsv($handle,1000,',')) !== FALSE) {
           
          $str.= $data[1]." ";  //name
          $str1.= $data[2]. " "; //type

          if($data[2] == 'radio'){
          $str2.= $data[3]. " "; // radio button value 
          }

          if($data[2] == 'checkbox')
          {
              $str4 .= $data[3]. " "; // checkbox value
          }

          if($data[2] == 'select')
          {
              $str5 .= $data[3]. " "; // select value
          }
          if($data[2] == 'image')
          {
              $str6 .= $data[3]. " "; // image link
          }

          $str3.= $data[1]." ".","; // column name

          if(empty($a)){
            $a = $data[0];
            }

           }

       echo $str4.'<br>';
        //$radio = explode("." , $str2);

           $str3 = substr($str3, 0, -1);

         //echo $str6.'<br>';

           // making array from string
           $name = str_word_count($str, 1);
           $type = str_word_count($str1, 1);
           $radio = str_word_count($str2, 1);
           $checkbox = str_word_count($str4, 1);
           $select = str_word_count($str5, 1);
           $image = explode(" " , $str6);

           for ($i=0; $i < count($type); $i++) { 
            if($type[$i] == 'checkbox')
            {
              $cnt++;
            }
          }

          //echo "cnt ".$cnt.'<br>';


          // Radio button area
          $searchRadioIndex = "";
          // searching index matches with name array
           for ($i=0; $i < count($name); $i++) { 
              if(array_search($name[$i], $radio) > 0 && array_search($name[$i], $radio) < 10){
            $searchRadioIndex .= array_search($name[$i], $radio). " ";
              }
              else if(array_search($name[$i], $radio) >= 10) {
               $searchRadioIndex .= array_search($name[$i], $radio);
              }

           }

           $searchRadioIndex .= count($radio);

          //making array from string
         $radioIndex = str_split($searchRadioIndex, 2);

          // $radioIndex = explode(" " , $searchRadioIndex);

         
        // Checkbox area
          $searchCheckboxIndex = "";
          // searching index matches with name array
           for ($i=0; $i < count($name); $i++) { 
              if(array_search($name[$i], $checkbox) > 0 && array_search($name[$i], $checkbox) < 10){
            $searchCheckboxIndex .= array_search($name[$i], $checkbox). " ";
              }
              else if(array_search($name[$i], $checkbox) >= 10) {
               $searchCheckboxIndex .= array_search($name[$i], $checkbox);
              }

           }

           $searchCheckboxIndex .= count($checkbox);

         // making array from string
          $checkboxIndex = str_split($searchCheckboxIndex, 2);



        //Selection box area
        
        $searchSelectIndex = "";
        // searching index matches with name array
         for ($i=0; $i < count($name); $i++) { 
            if(array_search($name[$i], $select) > 0 && array_search($name[$i], $select) < 10){
          $searchSelectIndex .= array_search($name[$i], $select). " ";
            }
            else if(array_search($name[$i], $select) >= 10) {
             $searchSelectIndex .= array_search($name[$i], $select);
            }

         }

         $searchSelectIndex .= count($select);

       // making array from string
        $selectIndex = str_split($searchSelectIndex, 2);
    
          // echo 'SelectIndex';
          // echo '<pre>';
          // print_r($selectIndex);
          // echo '</pre>';
          
          //  echo 'Select';
          
          //    echo '<pre>';
          //  print_r($select);
          //  echo '</pre>';
      
           //$b = array_search(' password ', $type);
          // $b = array_search('     radio', $type);

          // echo $b;
           
      //     echo 'name';
      //       echo '<pre>';
      //      print_r($name);
      //      echo '</pre>';

        //    echo '<br><br>';
        // echo 'type';
        //   echo '<pre>';
        //    print_r($type);
        //    echo '</pre>';

      // //   //    echo '<br><br>';
      //   echo 'Radio value';
      //     echo '<pre>';
      //      print_r($radio);
      //      echo '</pre>';

        // echo '<br><br>';

        // for ($i=0; $i < count($type); $i++) { 
        //     echo $type[$i]." ";
        // }
        }
    
        fclose($handle);
?>



