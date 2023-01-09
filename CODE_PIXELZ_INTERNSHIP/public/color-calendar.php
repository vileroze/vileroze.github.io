<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
    <title>COLOR CALENDAR</title>
</head>
<body>
    <div class="container text-center mt-5">
        <h3>January, 2023</h3>
        <div class="row justify-content-center">
            <div class="col-7">
            <table class="table">
                <colgroup>
                    <?php
                        /* function that takes in the day value as a number and returns corresponding colored column */
                        function give_color(int $col_day){
                            switch ($col_day) {
                                case 1:
                                    return"<col span='1' style='background-color: red;'>";
                                    break;
                                case 2:
                                    return"<col span='1' style='background-color: green;'>";
                                    break;
                                case 3:
                                    return"<col span='1' style='background-color: pink;'>";
                                    break;
                                case 4:
                                    return"<col span='1' style='background-color: blue;'>";
                                    break;
                                case 5:
                                    return"<col span='1' style='background-color: yellow;'>";
                                    break;
                                case 6:
                                    return"<col span='1' style='background-color: purple;'>";
                                    break;
                                case 7:
                                    return"<col span='1' style='background-color: red;'>";
                                    break;
                                default:
                                    return"There shouldnt be more than 7 days in a week??";
                            }
                        }

                        //creating an empty string to store all the colored columns
                        $colored_columns = "";

                        //create a colored column for each day and add it to $colored_columns
                        for($i=1; $i<=7;$i++){
                            $colored_columns .= give_color($i);
                        }

                        //display the colored columns
                        echo $colored_columns;
                    ?>
                </colgroup>
                <thead>
                    <!-- days of the week as heading -->
                    <tr>
                        <th scope="col">Sunday</th>
                        <th scope="col">Monday</th>
                        <th scope="col">Tuesday</th>
                        <th scope="col">Wednesday</th>
                        <th scope="col">Thursday</th>
                        <th scope="col">Friday</th>
                        <th scope="col">Saturday</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $day = 1; //populates the table with numbers that represent each day of this month
                        
                        $total_days = 31; //the total days in the current month
                        $curr_day_count = 0;
                        
                        $cells_offset = 4; //signifies the number of empty cells at the beginning of the month

                        //creates five rows with a total of 31 cells
                        for ($i=1; $i <= 5; $i++) { 
                            
                            //checks for days offset at the beginning of the month
                            if($cells_offset > 0){
                                echo "<tr>";
                                    //adding "cells_offset" number of empty cells
                                    for($k=0; $k < $cells_offset; $k++){
                                        echo "<td></td>";
                                    }

                                    for($j=1; $j <= 7-$cells_offset; $j++){
                                        
                                        echo "<td>".$day."</td>";

                                        $curr_day_count++;
                                        $day++;
                                    }

                                    
                                echo "</tr>";
                            }

                            //if no days offset
                            echo "<tr>";
                                for($j=1; $j <= 7; $j++){

                                    //exit loop when total days in month reached
                                    if($curr_day_count == $total_days){break;}
                                    
                                    echo "<td>".$day."</td>";

                                    $curr_day_count++;
                                    $day++;
                                }
                            echo "</tr>";

                            $cells_offset=-1; //to ensure the for-loop for offset days only runs once
                        }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</body>
</html>