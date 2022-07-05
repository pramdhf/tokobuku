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
        <h1 class="h3 mb-0 text-gray-800">Update Produk</h1>
    </div>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">

                <?php foreach ($produk as $row) : ?>
                    <input type="hidden" name="id_produk" value="<?php echo $row->id_produk ?>">

                    <div class="form-group">
                        <label for="productName">Nama Produk</label>
                        <input class="form-control <?php echo form_error('productName') ? 'is-invalid' : '' ?>" type="text" name="productName" placeholder="Nama Produk" value="<?= $row->productName ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('productName') ?>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="img">Foto Produk</label>
                        <input class="form-control-file <?php echo form_error('img') ? 'is-invalid' : '' ?>" type="file" name="img" value="<?= $row->img ?>" required />
                        <div class="invalid-feedback">
                            <?php echo form_error('img') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input class="form-control <?php echo form_error('stock') ? 'is-invalid' : '' ?>" type="number" name="stock" min="0" placeholder="Stok Produk" value="<?= $row->stock ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('stock') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="categoryId">ID Kategori</label>
                        <input class="form-control <?php echo form_error('categoryId') ? 'is-invalid' : '' ?>" type="number" name="categoryId" min="0" placeholder="Kategori ID" value="<?= $row->categoryId ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('categoryId') ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" min="0" placeholder="Harga Produk" value="<?= $row->price ?>" />
                        <div class="invalid-feedback">
                            <?php echo form_error('price') ?>
                        </div>
                    </div>

                <?php endforeach; ?>
                <input class="btn btn-success" type="submit" name="btn" value="Save" />
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