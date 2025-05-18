<?php
// Koneksi ke database
include 'db.php';

// Ambil id artikel dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Ambil data artikel berdasarkan id
$sql = "SELECT * FROM posts WHERE id = $id";
$result = $conn->query($sql);

if (!$result || $result->num_rows === 0) {
  echo "Artikel tidak ditemukan.";
  exit;
}
$post = $result->fetch_assoc();
?>

<style>
    .content-container {
      display: flex;
      flex-direction: column;
    }
    .back-link {
      align-self: flex-end; /* Ini akan memposisikan elemen ke kanan */
      margin-top: 20px;
    }
    .back-link a {
      text-decoration: none;
      color: #000000;
      font-weight: bold;
    }
    .back-link a:hover {
      text-decoration: underline;
    }
  </style>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($post['title']) ?></title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p class="date"><?= date('d M Y', strtotime($post['date'])) ?></p>
    <?php if (!empty($post['image'])): ?>
      <img src="uploads/<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="blog-image">
    <?php endif ?>
    <div class="content-container">
      <div class="content">
        <?= formatLongText($post['content'] ?? 'No content available') ?>
      </div>
      <div class="back-link">
        <a href="index.php">&larr; Kembali ke halaman</a>
      </div>
    </div>
  </div>
</body>
</html>

<?php
function formatLongText($content) {
    // 1. Escape karakter khusus
    $content = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
    
    // 2. Potong teks yang terlalu panjang (misal: lebih dari 100 karakter tanpa spasi)
    $content = preg_replace_callback('/(\S{100,})/', function($matches) {
        return wordwrap($matches[1], 100, ' ', true);
    }, $content);
    
    // 3. Format paragraf dan line breaks
    $content = '<p>' . str_replace(["\n\n", "\n"], ['</p><p>', '<br>'], $content) . '</p>';
    
    // 4. Tambahkan overflow-wrap untuk kata panjang
    return '<div style="overflow-wrap: break-word; word-wrap: break-word;">' . $content . '</div>';
}
?>