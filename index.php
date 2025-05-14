<?php include "db.php"; ?>
<?php include "includes/header.php"; ?>

<?php
// Handle form submission (Create or Update)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['userId'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    if ($id) {
        // Update
        mysqli_query($conn, "UPDATE tbl_user SET name='$name', email='$email' WHERE userId=$id");
    } else {
        // Create
        mysqli_query($conn, "INSERT INTO tbl_user (name, email) VALUES ('$name', '$email')");
    }

    header("Location: index.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM tbl_user WHERE userId=$id");
    header("Location: index.php");
    exit();
}
?>

<!-- Button to Open Modal -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#userModal" onclick="openCreateModal()">Add User</button>

<!-- User Table -->
<table class="table table-bordered bg-white">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th width="200px">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
       $result = mysqli_query($conn, "SELECT * FROM tbl_user ORDER BY userId DESC");
        while ($row = mysqli_fetch_assoc($result)) :
        ?>
            <tr>
                <td><?= $row['userId'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td>
                    <button 
                        class="btn btn-warning btn-sm"
                        data-bs-toggle="modal" 
                        data-bs-target="#userModal"
                        onclick="openEditModal(<?= $row['userId'] ?>, '<?= htmlspecialchars($row['name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($row['email'], ENT_QUOTES) ?>')"
                    >
                        Edit
                    </button>
                    <a href="?delete=<?= $row['userId'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<!-- Create/Edit Modal -->
<div class="modal fade" id="userModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Add User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="userId" id="userId">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="submitBtn">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- JavaScript to handle modal logic -->
<script>
    function openCreateModal() {
        document.getElementById('modalTitle').innerText = 'Add User';
        document.getElementById('userId').value = '';
        document.getElementById('name').value = '';
        document.getElementById('email').value = '';
    }

    function openEditModal(id, name, email) {
        document.getElementById('modalTitle').innerText = 'Edit User';
        document.getElementById('userId').value = id;
        document.getElementById('name').value = name;
        document.getElementById('email').value = email;
    }
</script>
