<!-- <?php
        // require('../checkActiveStatus.php')
        ?> -->

<!-- <div class="header">
    <div class="head">
        <img class='logo-black' src="../Images/logo.png" alt="">
        <h1 style="font-size: 40px;">Omnifood</h1>
        <nav>
            <ul>
                <li>
                    <a href="#">Add Item</a>
                </li>

                <li>
                    <a href="../logout.php">Logout</a>
                </li>
            </ul>
        </nav>
    </div>
</div> -->

<navbar>
    <H1> <a style="text-decoration: none; color:blue" href="Admin_home_page.php">Omnifood</a></H1>
    <form action="searchExecutionHome.php" method="post">
        <input type="search" name="searchQuery" id="" class="search" required>
        <button class='searchIcon' type="submit"><i class="fa fa-search"></i></button>
    </form>
    <links>
        <ul>
            <a href="addItem.php">Add Item</a>
            <a href="Admin_home_page.php">Add Deliveryboy</a>
            <a href="../logout.php">Logout</a>
        </ul>
    </links>
</navbar>