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
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Baru</h1>
    </div>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/kategori/add'); ?>" method="post">
                <div class="form-group">
                    <label for="categoryName">Nama Kategori</label>
                    <input class="form-control <?php echo form_error('categoryName') ? 'is-invalid' : '' ?>" type="text" name="categoryName" placeholder="Nama Kategori" />
                    <div class="invalid-feedback">
                        <?php echo form_error('categoryName') ?>
                    </div>
                </div>

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