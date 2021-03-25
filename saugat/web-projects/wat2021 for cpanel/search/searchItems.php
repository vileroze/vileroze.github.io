<?php
        if (isset($_POST['searchSubmit'])) {
            $query = '';
            if (!empty($_POST['userSearch']) or !empty($_POST['category']) or !empty($_POST['sort'])){
                if (!empty($_POST['category']) and empty($_POST['userSearch']) and !empty($_POST['sort'])) {
                    $category = $_POST['category'];
                    $sort = $_POST['sort'];
                    if ($category == "all") {
                        $query = "SELECT * FROM products ORDER BY $sort ASC";
                    } else{
                        $query = "SELECT * FROM products WHERE category = '$category' ORDER BY $sort ASC";
                    }
                } elseif (!empty($_POST['category']) and !empty($_POST['userSearch']) and !empty($_POST['sort'])){
                    $category = $_POST['category'];
                    $sort = $_POST['sort'];
                    $search = $_POST['userSearch'];

                    if ($category == "all") {
                        $query = "SELECT * FROM products WHERE ProductName LIKE '$search%' ORDER BY $sort ASC";
                    } else{
                        $query = "SELECT * FROM products WHERE ProductName
                            LIKE '$search%' AND category = '$category' ORDER BY $sort ASC";
                    }
                }
            } else echo "<br><br>Enter or select a search request<br><br>" ;
            $result = mysqli_query($connection, $query);
    ?>


        <?php
            $rowcount=mysqli_num_rows($result);
            if ($rowcount > 0) {
        ?>
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                    <?php
                        while ($row=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$row['ProductName']."</td>";
                            echo "<td>".$row['ProductPrice']."</td>";
                            echo '<td><img width = 100px height = 100px class = "productImages" src="../crud/images/' . $row['ProductImageName'] .'.jpg' .'" /></td>';
                            echo "</tr>";
                        }
                    ?>
                </table>

    <?php
            } else echo "<h2>Search criteria doesn't match any products :( </h2>";
        }
    ?>
