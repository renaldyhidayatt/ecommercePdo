<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Kelompok 2</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <?php
                require "admin/include/auth.php";
                require "admin/include/database.php";
                require "admin/repository/cart.php";
                session_start();
                $pdo = Database::connect();
                $auth = new Auth();
                $cart = new Cart($pdo);
                
                if(isset($_SESSION['id_username'])){
                    $result = $cart->getRowCartById($_SESSION['id_username']);

                }

                echo $auth->isLoggedIn() ? "<li class=`nav-item`><a href='cart.php' class='nav-link'>Cart: $result</a></li><li class=`nav-item`><a href='./admin/logout.php' class='nav-link'>Logout</a></li>" : "<li class='nav-item'>
                    <a class='nav-link' href='login.php'>Login</a>
                </li>";
                Database::disconnect();
                ?>
            </ul>
        </div>
    </div>
</nav>