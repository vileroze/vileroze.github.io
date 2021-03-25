<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="userSearch">Search for:</label>
        <input type="text" name="userSearch" value="<?php if(isset($_POST['userSearch'])){echo $_POST['userSearch']; }?>">

        <label for="category">Category:</label>
        <select name="category">
            <option value="all" <?php if(isset($_POST['category']) and $_POST['category'] == 'all'){echo 'selected';} ?>>All</option>
            <option value="men" <?php if(isset($_POST['category']) and $_POST['category'] == 'men'){echo 'selected';} ?>>Men</option>
            <option value="women" <?php if(isset($_POST['category']) and $_POST['category'] == 'women'){echo 'selected';} ?>>Women</option>
            <option value="gender neutral" <?php if(isset($_POST['category']) and $_POST['category'] == 'gender neutral'){echo 'selected';} ?>>Gender Neutral</option>
        </select>


        <label >Sort by:</label>
        <input type="radio" name="sort" value="ProductName" <?php if(isset($_POST['sort']) and $_POST['sort'] == 'ProductName'){echo "checked";} ?> checked>
        <label for="sortByName">Name</label>
        <input type="radio" name="sort" value="ProductPrice" <?php if(isset($_POST['sort']) and $_POST['sort'] == 'ProductPrice'){echo "checked";} ?>>
        <label for="sort">Price</label>

        <input type="submit" class="searchButton" name="searchSubmit" value="GO">

</form>
