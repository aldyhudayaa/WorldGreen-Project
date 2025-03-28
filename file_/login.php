<?php include './_partials/_template/header.php';?>

<?php
include './config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, fullname, email, password, role_id FROM tb_users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role_id'] = $user['role_id'];
            
            if ($user['role_id'] == 1) {
                header("Location: index.php?page=admin_dashboard");
            } else {
                header("Location: index.php?page=home");
            }
            exit();
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Email tidak ditemukan!";
    }
    $stmt->close();
}
?>

<div style="min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div style="background: rgba(255, 255, 255, 0.95); border-radius: 20px; box-shadow: 0 15px 40px rgba(0,0,0,0.2); padding: 50px; width: 100%; max-width: 480px; position: relative; z-index: 1; backdrop-filter: blur(10px);">
       
        <?php if (isset($error)): ?>
            <div style="background: #dc3545; border-radius: 10px; padding: 15px; color: white; margin-bottom: 25px; text-align: center; font-family: 'Segoe UI', sans-serif; font-size: 14px;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div style="margin-bottom: 30px;">
                <label style="display: block; color: #000; font-weight: bold; margin-bottom: 10px;">Email</label>
                <input type="email" name="email" required class="form-control" placeholder="Masukkan email Anda">
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; color: #000; font-weight: bold; margin-bottom: 10px;">Password</label>
                <input type="password" name="password" id="password" required class="form-control" placeholder="Masukkan password Anda">
            </div>

            <button type="submit" class="btn btn-success w-100">Masuk</button>
        </form>

        <p style="text-align: center; margin-top: 25px; color: #555; font-size: 14px;">
            Belum punya akun? <a href="index.php?page=signup" style="color: #28a745; font-weight: 600; text-decoration: none;">Daftar</a>
        </p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
