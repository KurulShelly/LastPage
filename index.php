<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PDF Progress Reader</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            width: 350px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        h2 {
            margin-bottom: 10px;
            color: #333;
        }

        .desc {
            font-size: 13px;
            color: #777;
            margin-bottom: 15px;
        }

        .last-page {
            margin: 15px 0;
            font-size: 18px;
        }

        .highlight {
            color: #4facfe;
            font-weight: bold;
        }

        input {
            width: 85%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            outline: none;
        }

        input:focus {
            border-color: #4facfe;
        }

        button {
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            background: #4facfe;
            color: white;
            cursor: pointer;
            margin: 5px;
            transition: 0.3s;
        }

        button:hover {
            background: #007bff;
        }

        .open-btn {
            background: #28a745;
        }

        .open-btn:hover {
            background: #1e7e34;
        }

        .reset-btn {
            background: #dc3545;
        }

        .reset-btn:hover {
            background: #a71d2a;
        }

        footer {
            margin-top: 15px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>PDF Progress Reader</h2>

    <div class="desc">
        Simpan halaman terakhir dan lanjutkan membaca di Google Drive
    </div>

    <div class="last-page">
        Halaman terakhir: 
        <span id="lastPage" class="highlight">1</span>
    </div>

    <input type="number" id="pageInput" placeholder="Masukkan nomor halaman..." min="1">

    <br>

    <button onclick="savePage()">Simpan Halaman</button>

    <br>

    <a id="openDrive" target="_blank">
        <button class="open-btn">Buka di Google Drive</button>
    </a>

    <br>

    <button class="reset-btn" onclick="resetPage()">Reset</button>

    <footer>
        Project sederhana untuk menyimpan progress membaca PDF
    </footer>
</div>

<script>
// ===== GANTI FILE ID DI SINI =====
const fileId = "1ewNhvYGoxFjso9puvNEKWY0a41lAOUaZ";

// Ambil data dari localStorage
let lastPage = parseInt(localStorage.getItem("lastPage")) || 1;

// Tampilkan halaman terakhir
document.getElementById("lastPage").innerText = lastPage;

// Set link awal
updateLink();

// Update link Google Drive
function updateLink(){
    document.getElementById("openDrive").href =
        `https://drive.google.com/file/d/${fileId}/view#page=${lastPage}`;
}

// Simpan halaman
function savePage(){
    let input = document.getElementById("pageInput").value;
    let page = parseInt(input);

    if(!page || page < 1){
        alert("Masukkan nomor halaman yang valid!");
        return;
    }

    localStorage.setItem("lastPage", page);
    lastPage = page;

    document.getElementById("lastPage").innerText = page;
    updateLink();

    document.getElementById("pageInput").value = "";
}

// Reset halaman
function resetPage(){
    localStorage.removeItem("lastPage");
    lastPage = 1;

    document.getElementById("lastPage").innerText = 1;
    updateLink();
}
</script>

</body>
</html>
