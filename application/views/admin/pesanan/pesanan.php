<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Table Begin -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>
    </div>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTables Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pembeli</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Mtd. Pembayaran</th>
                            <th>Konfirmasi Pembayaran</th>
                            <th>Tgl. Pesan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Pesanan</th>
                            <th>Nama Pembeli</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Mtd. Pembayaran</th>
                            <th>Konfirmasi Pembayaran</th>
                            <th>Tgl. Pesan</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($pesanan as $order) : ?>
                            <tr>
                                <td><?= $order->id ?></td>
                                <td><?= $order->nama ?></td>
                                <td><?= $order->alamat ?></td>
                                <td><?= $order->no_telp ?></td>
                                <td><?= $order->payment ?></td>
                                <td><img src="<?= base_url('assets/img/' . $order->img_payment) ?>" alt="" width="100"></td>
                                <td><?= $order->tgl_pesan ?></td>
                                <td><a href="<?php echo site_url('admin/pesanan/detail/' . $order->id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Detail </a>
                                    <a href="<?= base_url('admin/pesanan/delete/' . $order->id) ?>" class="btn btn-small text-danger" onclick="if(!confirm('Hapus data ini?')){ return false; }">Hapus
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
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