<head>
  <title>Pharmavision</title>
  <link rel="icon" type="image/x-icon" href="/Pharmavision/img/logo4.png">
</head>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include('includes/header.php'); 
include('includes/navbar.php'); 
include('koneksi.php');

$query = "SELECT * FROM transaksi";
$result = $koneksi->query($query);
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Transaction Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code_transaksi.php" method="POST">
        <div class="modal-body">          
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="Tanggal" class="form-control" placeholder="Masukan tanggal">
            </div>
            <div class="form-group">
                <label>Nama Pembeli</label>
                <input type="text" name="Nama" class="form-control" placeholder="Masukan Nama">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="transaksi_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="editTransaksi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="code_transaksi.php" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label> id Transaksi </label>
                        <input type="number" id="editId" name="id_transaksi" class="form-control" placeholder="Masukan id">
                    </div>
                    <div class="form-group">
                        <label> Tanggal </label>
                        <input type="date" id="editTanggal" name="edit_tanggal" class="form-control" placeholder="Masukan Tanggal">
                    </div>
                    <div class="form-group">
                        <label> Nama Pembeli </label>
                        <input type="text" id="editPembeli" name="edit_pembeli" class="form-control" placeholder="Masukan Nama Pembeli">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update_btn" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Transaction 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Transaction 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> Id Transaksi </th>
            <th> Tanggal </th>
            <th> Nama Pembeli </th>
            <th> EDIT </th>
            <th> DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['nama_pembeli']; ?></td>
                    <td>
                      <form action="code_transaksi.php" method="post">
                          <input type="hidden" name="editId" value="<?= $row['id']; ?>">
                          <button  type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#editTransaksi" data-id="<?= $row['id']; ?>" data-tanggal="<?= $row['tanggal']; ?>" data-pembeli="<?= $row['nama_pembeli']; ?>"> EDIT</button>
                      </form>
                    </td>
                    <td>
                      <form action="code_transaksi.php" method="post">
                        <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                        <button type="submit" name="dlt_transaksi" class="btn btn-danger"> DELETE</button>
                      </form>
            </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.edit-btn').click(function() {
            var id = $(this).data('id');
            var tanggal = $(this).data('tanggal');
            var pembeli = $(this).data('nama_pembeli');

            $('#editId').val(id);
            $('#editTanggal').val(tanggal);
            $('#editPembeli').val(pembeli);
        });
    });
</script>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>