<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Table Begin -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Kategori</h1>
    </div>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="<?php echo site_url('admin/kategori/add') ?>"><i class="fas fa-plus"></i> Tambah Kategori Baru</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($kategori as $row) : ?>
                            <tr>
                                <td><?= $row->id ?></td>
                                <td><?= $row->categoryName ?></td>
                                <td><a href="<?php echo site_url('admin/kategori/edit/' . $row->id) ?>" class="btn btn-small"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('admin/kategori/delete/' . $row->id) ?>" class="btn btn-small text-danger" onclick="if(!confirm('Hapus data ini?')){ return false; }">Hapus
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