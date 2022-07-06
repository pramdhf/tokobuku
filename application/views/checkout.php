<!-- Navbar Start -->
<div class="container-fluid">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 1;">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 124px">
                        <a href="" class="nav-item nav-link">Fiksi</a>
                        <a href="" class="nav-item nav-link">Non Fiksi</a>
                        <a href="" class="nav-item nav-link">Pengetahuan</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="<?= base_url() ?>" class="nav-item nav-link">Home</a>
                            <a href="<?= base_url() ?>shop" class="nav-item nav-link active">Shop</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                        <?php 
                            if ($this->session->userdata('email')) {
                                echo '<a href="' . base_url() .'auth/logout' .'" class="nav-item nav-link">Logout</a>';
                            } else {
                                echo '<a href="' . base_url(). 'auth'.'" class="nav-item nav-link">Login</a>';
                            }
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                <form action="<?=base_url()?>checkout/order" method="post" enctype="multipart/form-data">
                    <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label>Nama</label>
                            <input class="form-control" type="text" placeholder="John" name="nama" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>Alamat</label>
                            <input class="form-control" type="text" placeholder="Doe" name="alamat" required>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>No Telepon</label>
                            <input class="form-control" type="text" placeholder="0812969xxx" name="no_telp" required>
                        </div>
                        <div class="col-md-12 form-group">
                    <label>Bukti Pembayaran</label>
                    <input class="form-control" type="file" name="img" required/>
                </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">
                        <h5 class="font-weight-medium mb-3">Products</h5>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                        <div class="d-flex justify-content-between">
                            <p><?=$items['name'] ." x". $items['qty']?> </p>
                            <p>Rp <?php echo number_format($items['price'], 0,',','.')  ?></p>
                        </div>
                        <?php endforeach; ?>
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium"><?php echo "Rp " . number_format($this->cart->total(), 0,',','.' ) ?></h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rp 10.000</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold"><?php 
                                $total = $this->cart->total() + 10000;
                            echo "Rp " . number_format($total, 0,',','.' ) 
                            ?></h5>
                        </div>
                    </div>
                </div>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Payment</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="BNI" value="BNI">
                                <label class="custom-control-label" for="BNI">BNI</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="BCA" value="BCA">
                                <label class="custom-control-label" for="BCA">BCA</label>
                            </div>
                        </div>
                        <div class="">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="MANDIRI" value="MANDIRI">
                                <label class="custom-control-label" for="MANDIRI">MANDIRI</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Place Order</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Checkout End -->