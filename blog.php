<?php
// Koneksi ke database
include 'db.php';

// Ambil data dari tabel posts
$sql = "SELECT * FROM posts ORDER BY date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Artikel - CV Al Barokah Herbal Makassar</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    /* Styling Form Tambah Artikel */
    .form-container {
      display: flex;
      flex-direction: column;
      gap: 20px;
      max-width: 700px;
      margin: 50px auto;
      padding: 30px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-container label {
      font-weight: bold;
      margin-bottom: 5px;
      font-size: 16px;
    }
    .form-container textarea {
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 5px;
      font-size: 16px;
      width: 100%;
      box-sizing: border-box;
    }
    .form-container textarea {
      resize: vertical;
    }
    .form-container button {
      padding: 12px 20px;
      background-color: #3498db;
      color: #fff;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }
    .form-container button:hover {
      background-color: #2980b9;
    }
    .form-container input[type="file"] {
      padding: 10px;
    }

  /* Dasar Header */
.header {
  background-color: #2f353b;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 10px 20px;
  flex-wrap: wrap;
}

.logo-container {
  display: flex;
  align-items: center;
}

.logo {
  height: 50px;
  margin-right: 10px;
}

.company-name {
  color: white;
  font-size: 18px;
  font-weight: bold;
}

.nav ul {
  display: flex;
  list-style: none;
  gap: 15px;
  padding: 0;
  margin: 0;
}

.nav ul li a {
  text-decoration: none;
  color: #ccc;
  font-size: 14px;
}

.menu-toggle {
  display: none;
  font-size: 24px;
  color: white;
  cursor: pointer;
}
@media (max-width: 5716px) {
  .navbar-brand .logo {
    max-height: 30px;
  }
  .navbar-brand span {
    font-size: 1rem;
  }
}

/* Responsif */
@media (max-width: 768px) {
  .menu-toggle {
    display: block;
  }

  .nav {
    display: none;
    width: 100%;
  }

  .nav ul {
    flex-direction: column;
    gap: 10px;
    margin-top: 10px;
  }

  .nav.show {
    display: block;
  }
}



    /* Styling Post List */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    .post-list {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 30px;
      margin-top: 30px;
    }
    .post-item {
      background: #fff;
      padding: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    .blog-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
      margin-bottom: 15px;
      border-radius: 5px;
    }
    .date {
      font-size: 14px;
      color: #888;
      margin-bottom: 10px;
    }
    .read-more p {
      margin: 0;
      color: #3498db;
      font-weight: bold;
      font-size: 14px;
    }
    .read-more p:hover {
      text-decoration: underline;
    }

  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container"><!-- ← ganti container → container-fluid -->
    <!-- Logo dan Nama Brand -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="logo.png" alt="Logo Al Barokah" class="logo" style="max-height:40px;">
      <span class="ml-2 font-weight-bold">CV Al Barokah Herbal Makassar</span>
    </a>

    <!-- Tombol menu mobile tanpa border -->
    <button class="navbar-toggler border-0" type="button"
            data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Daftar Menu -->
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ml-auto text-center">
        <li class="nav-item"><a class="nav-link" href="http://localhost/web/">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Produk</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Publikasi</a></li>
      </ul>
    </div>
  </div>
</nav>


<!-- Konten Utama -->
<div class="container">
  <h1 style="text-align: center; font-size: clamp(1rem, 6vw, 3rem);"><b>Berita Terkini</b></h1>

  <div class="post-list">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while($post = $result->fetch_assoc()): ?>
        <div class="post-item">
          <a href="detail.php?id=<?= $post['id'] ?>">
            <?php if (!empty($post['image'])): ?>
              <img src="uploads/<?= htmlspecialchars($post['image']) ?>" alt="<?= htmlspecialchars($post['title']) ?>" class="blog-image">
            <?php endif ?>
            <h2><?= htmlspecialchars($post['title']) ?></h2>
          </a>
          <div class="date"><?= date('d M Y', strtotime($post['date'])) ?></div>
          <p><?= nl2br(htmlspecialchars(substr($post['content'], 0, 37))) ?>...</p>
          <a class="read-more" href="detail.php?id=<?= $post['id'] ?>"><p>Baca selengkapnya →</p></a>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Belum ada artikel.</p>
    <?php endif; ?>
  </div>

  <!-- Form Tambah Artikel -->
  <div class="form-container" style="text-align: center; margin-top: 50px;">
  <h2>Berita Baru</h2>
  <form action="logout.php" method="post" enctype="multipart/form-data">
    <button type="submit" style="background-color: #05a141; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
      Tambah Berita
    </button>
  </form>
</div>

</div>

</body>
</html>
