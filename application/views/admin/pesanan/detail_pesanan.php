<?php $this->load->view('templates/dashboard_header'); ?>

<?php $this->load->view('templates/dashboard_sidebar'); ?>

<?php $this->load->view('templates/dashboard_topbar'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Table Begin -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pesanan</h1>
    </div>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <?php foreach ($pesanan as $row) : ?>
                    <input type="hidden" name="id" value="<?php echo $row->id ?>">

                    <div class="form-group">
                        <label for="nama">Nama pembeli</label>
                        <input class="form-control" type="text" name="nama" value="<?= $row->nama ?>" disabled />
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat Pengiriman</label>
                        <input class="form-control" type="text" name="alamat" value="<?= $row->alamat ?>" disabled />
                    </div>

                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon Penerima</label>
                        <input class="form-control" type="text" name="no_telp" value="<?= $row->no_telp ?>" disabled />
                    </div>

                    <div class="form-group">
                        <label for="payment">Metode Pembayaran</label>
                        <input class="form-control" type="text" name="payment" value="<?= $row->payment ?>" disabled />
                    </div>

                    <div class="form-group">
                        <label for="img_payment">Bukti Pembayaran</label><br>
                        <img src="<?= base_url('assets/img/' . $row->img_payment) ?>" alt="" width="400">
                    </div>

                    <div class="form-group">
                        <label for="tgl_pesan">Tanggal Pesanan Dibuat</label>
                        <input class="form-control" type="text" name="tgl_pesan" value="<?= $row->tgl_pesan ?>" disabled />
                    </div>


                <?php endforeach; ?>
                <!-- <input class="btn btn-success" type="submit" name="btn" value="Save" /> -->
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

<?php $this->load->view('templates/dashboard_footer'); ?>