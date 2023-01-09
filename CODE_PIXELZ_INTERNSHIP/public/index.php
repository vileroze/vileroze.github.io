<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/practise.css">
    <title>PHP PRACTISE</title>
</head>
<body>

    <!-- creating a chess board -->
    <div class="container">
        <h1>Chess Board</h1>
        <table style="width:auto">
            <?php
                for ($i=0; $i < 8; $i++) { 
                    echo "<tr>";
                        for ($j=0; $j < 8; $j++) { 
                            if(($i+$j)%2 == 0){
                                echo "<td class='cube-black'></td>";
                            }else{
                                echo "<td class='cube-white'></td>";
                            }
                        }
                    echo "</tr>";
                }
            ?>
        </table>
    </div>


    <!-- create number table using for loop -->
    <div class="container">
        <h1>Number table</h1>
        <table style="min-width:400px">
            <?php
                for ($i=1; $i <= 10; $i++) { 
                    echo "<tr>";
                        for($j=1; $j <= 10; $j++){
                            echo "<td>".$i*$j."</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </table> 
    </div>


    <!-- creating letter G from '*' -->
    <div class="container">
        <h1>Creating the letter 'G'</h1>
        <?php
            echo"&nbsp;&nbsp;&nbsp;&nbsp;***<br>";
            echo"*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>";
            echo"*<br>";
            echo"*&nbsp;&nbsp;&nbsp;&nbsp;***<br>";
            echo"*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>";
            echo"*&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*<br>";
            echo"&nbsp;&nbsp;&nbsp;&nbsp;***<br>";
        ?>
    </div>

</body>
</html>