<!DOCTYPE html>
<html>
<head>
    <title>PDF Reader</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
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

        .last-page {
            font-size: 18px;
            margin: 15px 0;
            color: #555;
        }

        .highlight {
            font-weight: bold;
            color: #4facfe;
        }

        input {
            width: 80%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            outline: none;
            margin-bottom: 10px;
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
            transform: scale(1.05);
        }

        .open-btn {
            display: inline-block;
            margin-top: 15px;
            background: #28a745;
        }

        .open-btn:hover {
            background: #1e7e34;
        }
    </style>
</head>

<body>

<div class="card">
    <h2>📖 PDF Reader</h2>

    <div class="last-page">
        Halaman terakhir: <span id="lastPage" class="highlight">1</span>
    </div>

    <input type="number" id="pageInput" placeholder="Masukkan halaman..." min="1">

    <br>

    <button onclick="savePage()">💾 Simpan</button>

    <br>

    <a id="openDrive" target="_blank">
        <button class="open-btn">🚀 Buka di Google Drive</button>
    </a>
</div>

<script>
const fileId = "1ewNhvYGoxFjso9puvNEKWY0a41lAOUaZ";

let lastPage = parseInt(localStorage.getItem("lastPage")) || 1;
document.getElementById("lastPage").innerText = lastPage;

updateLink();

function updateLink(){
    document.getElementById("openDrive").href =
        `https://drive.google.com/file/d/${fileId}/view#page=${lastPage}`;
}

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
</script>

</body>
</html>