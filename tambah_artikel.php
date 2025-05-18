<li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li><?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
  die("Akses ditolak. Hanya admin yang dapat menambahkan berita.");
}

include 'db.php';

$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');

// Upload gambar jika ada
$image = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
  $target_dir = "uploads/";
  $image = basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir . $image);
}

$sql = "INSERT INTO posts (title, content, image, date) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $title, $content, $image, $date);

if ($stmt->execute()) {
  header("Location: admin.php");
} else {
  echo "Gagal menambahkan berita: " . $conn->error;
}
?>


