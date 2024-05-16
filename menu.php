 <!--navbar-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary ">
     <div class="container">
         <a class="navbar-brand" href="#"><i class="fas fa-fw fa-fish"></i> Toko Ikan </a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav ml-auto">
                 
                 <a class="nav-item nav-link" href="index.php">
                     <i class="fas fa-fw fa-home"></i > Home
                      <span class="sr-only">(current)</span></a>  

                 <a class="nav-item nav-link" href="keranjang.php">
                     <i class="fas fa-fw fa-shopping-cart">
                 </i> keranjang</a>
                 <!-- jika sudah login ada session pelanggan-->
                 <?php if (isset($_SESSION["pelanggan"])) : ?>
                     <a class="nav-item nav-link" href="riwayat.php"><i class="fas fa-fw fa-sticky-note"></i> History</a>
                     <a class="nav-item nav-link" href="logout.php"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a>
                     <!-- selain itu belum login -->

                 <?php else : ?>
                     <a class="nav-item nav-link" href="login.php">
                          <i class="fas fa-fw fa-sign-in-alt"></i> Login</a>
                     <a class="nav-item nav-link" href="daftar.php"><i class="fas fa-fw fa-cash-register"></i> Daftar</a>

                 <?php endif ?>
                 <a class="nav-item nav-link" href="checkout.php"><i class="far fa-fw    fa-credit-card"></i> checkout</a>

                 </a>
             </div>
         </div>
     </div>
 </nav>