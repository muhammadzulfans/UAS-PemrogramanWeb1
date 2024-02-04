<head>
  <title>Pharmavision</title>
  <link rel="icon" type="image/x-icon" href="/Pharmavision/img/logo4.png">
</head>

<?php
include('includes/header.php');
include('includes/navbar.php');
include('koneksi.php');

$query = "SELECT * FROM obat";
$result = $koneksi->query($query);
?>


<div class="modal fade" id="adddataobat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add potion Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="codeobat.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" placeholder="Masukan Nama">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="obat_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="editPotion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm" action="codeobat.php" method="POST">

        <div class="modal-body">
          <div class="form-group">
            <label> id Obat </label>
            <input type="number" id="editId" name="id_obat" class="form-control" placeholder="Masukan id">
          </div>
          <div class="form-group">
            <label> Nama Obat </label>
            <input type="text" id="editObat" name="edit_obat" class="form-control" placeholder="Masukan Nama Obat">
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
      <h6 class="m-0 font-weight-bold text-primary">Potion
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddataobat">
          Add Potion Profile
        </button>
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Id Obat </th>
              <th> Nama Obat </th>
              <th> EDIT </th>
              <th> DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td>
                  <?= $row['id']; ?>
                </td>
                <td>
                  <?= $row['nama_obat']; ?>
                </td>
                <td>
                  <form action="codeobat.php" method="post">
                    <input type="hidden" name="editId" value="<?= $row['id']; ?>">
                    <button type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#editPotion"
                      data-id="<?= $row['id']; ?>" data-obat="<?= $row['nama_obat']; ?>"> EDIT</button>
                  </form>
                </td>
                <td>
                  <form action="codeobat.php" method="post">
                    <input type="hidden" name="dltobt_id" value="<?= $row['id']; ?>">
                    <button type="submit" name="dltobt_btn" class="btn btn-danger"> DELETE</button>
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
  $(document).ready(function () {
    $('.edit-btn').click(function () {
      var id = $(this).data('id');
      var nama = $(this).data('obat');

      $('#editId').val(id);
      $('#editObat').val(nama);
    });
  });
</script>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>