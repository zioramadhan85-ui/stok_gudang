<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12 col-md-10">
        <h4 class="mb-0"><i class="fa fa-cubes"></i> Data Stok Obat</h4>
    </div>
    <div class="col-sm-12 col-md-2">
        <a href="<?= site_url('tambah_barang'); ?>" class="btn btn-success btn-sm btn-block">Tambah Data</a>
    </div>
</div>
<hr class="mt-0" />
<?php
//tampilkan pesan success
if ($this->session->flashdata('success')) {
    echo '<div class="alert alert-success" role="alert">
    ' . $this->session->flashdata('success') . '
  </div>';
}

//tampilkan pesan error
if ($this->session->flashdata('error')) {
    echo '<div class="alert alert-danger" role="alert">
    ' . $this->session->flashdata('error') . '
  </div>';
}
?>
<div class="table-responsive">
    <table class="table table-sm table-hover table-striped" id="tables">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Brand</th>
                <th scope="col">Stok</th>
                <th scope="col">Harga Jual</th>
                <th scope="col">Tanggal Expired</th>
                <th scope="col">Status</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            
<?php $no = 1; foreach ($barang as $b) : ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $b->kode_barang; ?></td>
        <td><?= $b->nama_barang; ?></td>
        <td><?= $b->brand; ?></td>
        <td><?= $b->stok; ?></td>
        <td><?= number_format($b->harga); ?></td>
        <td><?= date('d-m-Y', strtotime($b->tanggal_expired)); ?></td> <!-- Tambahan -->
        <td><?= $b->active == 'Y' ? 'Aktif' : 'Nonaktif'; ?></td>
        <td>
           
    <a href="<?= site_url('data_barang/edit_data/' . $b->kode_barang); ?>" class="btn btn-warning btn-sm">
        <i class="fa fa-edit"></i>
    </a>
    <a href="<?= site_url('data_barang/hapus_data/' . $b->kode_barang); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
    <i class="fa fa-trash"></i>
</a>

        </td>
    </tr>
<?php endforeach; ?>

        </tbody>
    </table>
</div>