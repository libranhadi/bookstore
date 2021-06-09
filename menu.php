<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container">

    <a class="navbar-brand" href="index.php">NerdLara Store</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-4">
                <a class="nav-link" href="index.php">Home </a>
            </li>
            <?php if (isset($_SESSION['pelanggan'])):?>
            <li class="nav-item ml-3">
                <a class="nav-link" href="logout.php">Logout </a>
            </li>
            <li class="nav- ml-3">
                <a class="nav-link" href="riwayat.php">Riwayat </a>
            </li>
            
            <li class="nav- ml-3">
                <a class="nav-link" href="checkout.php">Checkout</a>
            </li>
            <?php else:?>
            <li class="nav- ml-3">
                <a class="nav-link" href="login.php">Login </a>
            </li>
            <li class="nav- ml-3">
                <a class="nav-link" href="daftar.php">Daftar </a>
            </li>
                <?php endif ?>
            <li class="nav- ml-3">
                <a class="nav-link" href="keranjang.php">Chart</a>
            </li>
           
        </ul>
        <form method="get" action="search.php"class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

    </div>
</div>
</nav>
