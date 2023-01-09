<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <title>PRACTISE QUESTIONS</title>
</head>
<body>
    <div class="container text-center mt-5">
        <div class="row justify-content-center">
            <div class="col-7">

                <!-- displaying colors -->
                <h5 class="">DISPLAYING COLORS</h5>
                <?php 
                    $colors = array('white', 'green', 'red');

                    foreach ($colors as $color) {
                        echo $color.",";
                    }
                    
                    echo"<br>";
                    echo"<br>";

                    echo"<ul style='max-width:50px' class='m-auto'>";
                        foreach ($colors as $color) {
                            echo "<li>".$color."</li>";
                        }
                    echo"</ul>";
                ?>
                

                <!-- displaying countries and their capitals -->
                <h5 class="mt-5">COUNTRIES AND CAPITAL</h5>
                <?php 
                    $ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw") ;

                    foreach ($ceu as $country => $capital) {
                        echo "The capital of ".$country." is ".$capital;
                        echo "<br>";
                    }
                ?>
                

                <!-- json decoding -->
                <h5 class="mt-5">BOOK JSON</h5>
                <?php 
                    $book = '{
                                "Title": "The Cuckoos Calling",
                                "Author": "Robert Galbraith",
                                "Detail": {
                                    "Publisher": "Little Brown"
                                }
                            }';

                    //decoding json string        
                    extract(json_decode($book, true));
                    
                    //displaying the data in format
                    echo "Title : ".$Title;
                    echo "<br>";
                    echo "Author : ".$Author;
                    echo "<br>";
                    echo "Publisher : ".$Detail['Publisher'];
                ?>
                

                <!-- associative array -->
                <h5 class="mt-5">ASSOCIATIVE ARRAY</h5>
                <?php 
                    //input array
                    $user_and_age =  array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");
                    
                    //sort by key descending
                    echo"<strong>By value asscending: </strong> <br>";
                    asort($user_and_age);

                    foreach($user_and_age as $key=>$value)
                    {
                        echo $key . " => " . $value . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    
                    echo"<br>";

                    //sort by key asscending
                    echo"<strong>By value descending: </strong> <br>";
                    arsort($user_and_age);

                    foreach($user_and_age as $key=>$value)
                    {
                        echo $key . " => " . $value . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }


                    echo "<br>";
                    echo "<br>";


                    //sort by key descending
                    echo"<strong>By key asscending: </strong><br>";
                    ksort($user_and_age);

                    foreach($user_and_age as $key=>$value)
                    {
                        echo $key . " => " . $value . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    
                    echo"<br>";

                    //sort by key asscending
                    echo"<strong>By key descending: </strong><br>";
                    krsort($user_and_age);

                    foreach($user_and_age as $key=>$value)
                    {
                        echo $key . " => " . $value . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                ?>
                

                <!-- merging array according to index -->
                <h5 class="mt-5">MERGE ARRAY BY INDEX</h5>
                <?php 
                    $array1 = array(array(77, 87), array(23, 45));
                    $array2 = array("w3resource", "com");

                    $result = array();

                    foreach($array1 as $key=>$val){ // Loop though one array
                        //w3resource | com
                        $value2 = $array2[$key]; 
                        
                        //pushing value2 to the nested array of array1
                        array_push($val, $value2);

                        //pushing $val to result array
                        array_push($result, $val);
                    }
                    print_r($result);
                ?>
            </div>
        </div>
    </div>
</body>
</html>