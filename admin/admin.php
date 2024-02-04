<head>
  <title>Pharmavision</title>
  <link rel="icon" type="image/x-icon" href="/Pharmavision/img/logo4.png">
</head>

<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include('koneksi.php');

$query = "SELECT * FROM admin";
$result = $koneksi->query($query);

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code_admin.php" method="POST">

        <div class="modal-body">
            <div class="form-group">
                <label> id </label>
                <input type="number" name="id_admin" class="form-control" placeholder="Masukan id">
            </div>
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="Username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="text" name="Password" class="form-control" placeholder="Enter Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="admin_btn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="editAdminProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" action="code_admin.php" method="POST">

                <div class="modal-body">
                    <div class="form-group">
                        <label> id </label>
                        <input type="number" id="editId" name="id_admin" class="form-control" placeholder="Masukan id">
                    </div>
                    <div class="form-group">
                        <label> Username </label>
                        <input type="text" id="editUsername" name="edit_Usernmae" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label> Email</label>
                        <input type="text" id="editEmail" name="edit_Email" class="form-control" placeholder="Masukan Email">
                    </div>
                    <div class="form-group">
                        <label> Password </label>
                        <input type="text" id="editPassword" name="edit_Password" class="form-control" placeholder="Masukan Password">
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
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Admin Profile 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>EDIT </th>
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['password']; ?></td>
                    <td>
                      <form action="code_admin.php" method="post">
                          <input type="hidden" name="edit_id" value="<?= $row['id']; ?>">
                          <button  type="button" class="btn btn-success edit-btn" data-toggle="modal" data-target="#editAdminProfile" data-id="<?= $row['id']; ?>" data-username="<?= $row['username']; ?>" data-email="<?= $row['email']; ?>" data-password="<?= $row['password']; ?>"> EDIT</button>
                      </form>
                    </td>
                    <td>
                      <form action="code_admin.php" method="post">
                        <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                        <button type="submit" name="dlt_admin" class="btn btn-danger"> DELETE</button>
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
            var username = $(this).data('username');
            var email = $(this).data('email');
            var password = $(this).data('password');

            $('#edit_id').val(id);
            $('#editUsername').val(username);
            $('#editEmail').val(email);
            $('#editPassword').val(password);
        });
    });
</script>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>