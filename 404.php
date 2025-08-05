<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>404 | Halaman Tidak Ditemukan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(135deg, #e9f0f7, #ffffff);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    .error-container {
      text-align: center;
      padding: 30px;
      max-width: 500px;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      animation: fadeIn 0.8s ease-in-out;
    }

    .error-icon svg {
      width: 100px;
      height: 100px;
      fill: #dc3545;
      margin-bottom: 15px;
    }

    h1 {
      font-size: 64px;
      margin-bottom: 10px;
      color: #dc3545;
    }

    p.lead {
      font-size: 18px;
      color: #6c757d;
      margin-bottom: 25px;
    }

    a.btn-home {
      background: #0d6efd;
      border: none;
      color: #fff;
      padding: 10px 24px;
      border-radius: 8px;
      font-weight: 500;
      text-decoration: none;
      transition: background 0.3s ease;
    }

    a.btn-home:hover {
      background: #0b5ed7;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
  <style>
  .btn-outline-primary {
    border-radius: 8px;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: 500;
    transition: all 0.2s ease-in-out;
  }

  .btn-outline-primary:hover {
    background-color: #0d6efd;
    color: white;
  }
</style>

</head>
<body>
  <div class="error-container">
    <div class="error-icon">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 0C5.371 0 0 5.372 0 12s5.371 12 12 12 12-5.372 12-12S18.629 0 12 0zm0 22C6.486 22 2 17.514 2 12S6.486 2 12 2s10 4.486 10 10-4.486 10-10 10zm1-9h-2v5h2v-5zm0-7h-2v5h2V6z"/>
      </svg>
    </div>
    <h1>404</h1>
    <p class="lead">Halaman yang Anda cari tidak tersedia atau telah dipindahkan.</p>
    <div class="text-center mt-4">
    <button onclick="history.back()" class="btn btn-outline-primary btn-lg">
        ← Kembali ke Halaman Sebelumnya
    </button>
    </div>

  </div>
</body>
</html>
