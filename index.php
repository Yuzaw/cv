<?php
include 'config.php';

$result = mysqli_query($conn, "SELECT * FROM cv_data WHERE id=1"); // Sesuaikan dengan id CV
$data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="main.css">
  <script src="script.js"></script>
  <title>Curriculum Vitae</title>
  <style>
    body {
      background-color: #495057;
      color: #fff;
    }

    .navbar {
      background-color: #007bff;
    }

    .card {
      margin: 20px;
      background-color: #212529;
      color: #fff;
    }

    #comments {
      margin-top: 20px;
    }

    .comment {
      border: 1px solid #007bff;
      padding: 10px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar sticky-top navbar-dark">
    <div class="container">
      <h1 class="navbar-brand">Curriculum Vitae</h1>
      <a class="navbar-brand" href="admin.php">Update</a>
    </div>
  </nav>

  <div class="container">
    <div class="card">
      <div class="p-3">
        <img src="<?php echo $data['foto_path']; ?>" alt="Foto Profil" class="img-fluid mb-3">
        <div class="card-body">
          <h1 class="card-title"><?php echo $data['nama']; ?></h1>
          <p class="card-text"><?php echo $data['alamat']; ?></p>
          <p class="card-text"><?php echo $data['telepon']; ?></p>
          <p class="card-text"><?php echo $data['email']; ?></p>
          <p class="card-text"><?php echo $data['web']; ?></p>

          <h2>Pendidikan</h2>
          <p class="card-text"><?php echo $data['pendidikan']; ?></p>

          <h2>Pengalaman Kerja</h2>
          <p class="card-text"><?php echo $data['pengalaman_kerja']; ?></p>

          <h2>Keterampilan</h2>
          <p class="card-text"><?php echo $data['keterampilan']; ?></p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="p-3">
        <h1 class="mb-4">Komentar</h1>
        <div id="comments">
          <?php
          $cvId = 1;
          $query = "SELECT * FROM comments WHERE cv_id = $cvId";
          $result = mysqli_query($conn, $query);

          if ($result && mysqli_num_rows($result) > 0) {
            while ($comment = mysqli_fetch_assoc($result)) {
              echo '<div class="comment">' . $comment['comment_text'] . '</div>';
            }
          } else {
            echo 'Belum ada komentar.';
          }

          mysqli_close($conn);
          ?>
        </div>

        <label for="commentInput" class="form-label">Tambahkan Komentar</label>
        <textarea class="form-control" id="commentInput" name="comment" rows="3" placeholder="Tambahkan komentar..."></textarea>
        <button class="btn btn-primary mt-3" onclick="addComment()">Tambah Komentar</button>
      </div>
    </div>
  </div>
</body>

</html>
