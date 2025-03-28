<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup - World Green</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css"> 
</head>
<body>

<!-- 🔹 Form Sign Up -->
<div class="container mt-4">
    <h2 class="text-center mb-4">Create an Account</h2>

    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="fullname" class="form-control" required placeholder="Enter your full name">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required placeholder="Enter your email">
        </div>
        
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Enter your password">
        </div>

        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">Select Gender</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Phone Number</label>
            <input type="text" name="no_telp" class="form-control" required placeholder="Enter phone number">
        </div>

        <div class="mb-3">
            <label class="form-label">Address</label>
            <textarea name="alamat" class="form-control" required placeholder="Enter your address"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>

        <!-- Role otomatis User -->
        <input type="hidden" name="role_id" value="2">

        <button type="submit" class="btn btn-green w-100">Sign Up</button>
    </form>

    <p class="text-center mt-3">
        Already have an account? <a href="index.php?page=login">Login</a>
    </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
