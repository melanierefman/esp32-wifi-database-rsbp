<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP32 Data Retrieval</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-100 font-sans p-8">

    <h1 class="text-3xl font-bold mb-4">Anjungan Kesehatan Mandiri</h1>

    <p class="mb-4">Klik tombol di bawah untuk memulai pengukuran</p>

    <button onclick="getData()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Mulai</button>

    <div id="dataContainer" class="bg-white p-4 rounded shadow">
        <!-- Tempat untuk menampilkan data -->
    </div>

    <script>
        function getData() {
            // Buat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Tentukan metode, URL, dan apakah permintaan asinkron
            xhr.open("GET", "getData.php", true);

            // Atur fungsi yang akan dipanggil ketika permintaan selesai
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Tangkap dan tampilkan data
                    document.getElementById("dataContainer").innerHTML = xhr.responseText;
                } else {
                    // Tangkap dan tampilkan pesan kesalahan jika terjadi
                    document.getElementById("dataContainer").innerHTML = "Error: " + xhr.statusText;
                }
            };

            // Kirim permintaan
            xhr.send();
        }
    </script>
</body>

</html>