<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESP32 Data Retrieval</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-gray-100 font-sans p-8">

    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-3xl font-bold mb-4">Anjungan Kesehatan Mandiri</h1>
    </div>

    <div class="flex flex-col items-center justify-center h-screen">
        <p class="mb-4 ml-auto">Selamat Datang, Silahkan klik tombol dibawah ini untuk melihat hasil pengukuran</p>
    </div>

    <div class="flex flex-col items-center justify-center h-screen">
        <button onclick="getData()" class="bg-blue-500 text-white px-4 py-2 rounded mb-4">Mulai</button>
    </div>

    <div class="flex flex-col items-center mb-4" style="padding-left:100px">
        <img src=" ./png/body1.png" alt="body" class="max-w-full h-200 m-6 mx-8" style="margin-right: 140px;"><br>

        <div class="m-6 mx-4">
            <!-- Cards Row 1 -->
            <div class="flex justify-center mb-4">
                <!-- Card 1 -->
                <div id="suhuCard" class="flex-col items-center justify-center bg-white rounded-lg shadow-md m-6 mx-4 p-20 overflow-hidden sm:w-52" style="margin-right: 20px; padding:10px;">
                    <img src="./png/suhu_tubuh.png" alt="suhu_tubuh" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold text-center">Suhu Badan</h2>
                    <p class="text-center">00</p>
                </div>
                <!-- Card 2 -->
                <div id="tinggiCard" class="flex-col items-center bg-white rounded-lg shadow-md m-6 mx-4 overflow-hidden sm:w-52" style="margin-right: 20px; padding:10px;">
                    <img src=" ./png/tinggi_badan.png" alt="tinggi_badan" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold">Tinggi Badan</h2>
                    <p>00</p>
                </div>
                <!-- Card 3 -->
                <div id="beratBadanCard" class="flex-col items-center bg-white rounded-lg shadow-md m-6 mx-4 overflow-hidden sm:w-52" style="margin-right: 20px; padding:10px;">
                    <img src=" ./png/berat_badan.png" alt="berat_badan" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold">Berat Badan</h2>
                    <p>00</p>
                </div>
                <!-- Card 4 -->
                <div id="tekananDarahCard" class="flex-col items-center bg-white rounded-lg shadow-md m-6 mx-4 overflow-hidden sm:w-52" style="margin-right: 20px; padding:10px;">
                    <img src=" ./png/tekanan_darah.png" alt="tekanan_darah" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold">Tekanan Darah</h2>
                    <p>00</p>
                </div>
            </div>

            <!-- Cards Row 2 -->
            <div class="flex justify-center">
                <!-- Card 5 -->
                <div id="denyutJantungCard" class="flex-col items-center bg-white rounded-lg shadow-md m-6 overflow-hidden sm:w-52" style="margin-right: 20px; padding:10px;">
                    <img src=" ./png/denyut_jantung.png" alt="denyut_jantung" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold">Denyut Jantung</h2>
                    <p>00</p>
                </div>
                <!-- Card 6 -->
                <div id="gulaDarahCard" class="flex-col items-center bg-white rounded-lg shadow-md m-6 overflow-hidden sm:w-52" style="margin-right: 20px; padding:10px;">
                    <img src=" ./png/gula_darah.png" alt="gula_darah" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold">Kadar Gula Darah</h2>
                    <p>00</p>
                </div>
                <!-- Card 7 -->
                <div id="kolesterolCard" class="flex-col items-center bg-white rounded-lg shadow-md m-6 overflow-hidden sm:w-52" style="padding:10px;">
                    <img src=" ./png/kolesterol.png" alt="kolesterol" class="max-w-full h-20 m-6 mx-8" style="margin-right: 10px;">
                    <h2 class="font-bold">Kolesterol</h2>
                    <p>00</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getData() {
            // Buat objek XMLHttpRequest
            var xhr = new XMLHttpRequest();

            // Tentukan metode, URL, dan apakah permintaan asinkron
            xhr.open("GET", "getData.php", true);

            // Atur fungsi yang akan dipanggil ketika permintaan selesai
            xhr.onload = function() {
                console.log(xhr.responseText);
                if (xhr.status == 200) {
                    // Parse data JSON
                    var data = JSON.parse(xhr.responseText);

                    // Identifikasi elemen-elemen card
                    var suhuCard = document.getElementById("suhuCard");
                    var tinggiCard = document.getElementById("tinggiCard");
                    var tekananDarahCard = document.getElementById("tekananDarahCard");
                    var denyutJantungCard = document.getElementById("denyutJantungCard");
                    var beratBadanCard = document.getElementById("beratBadanCard");
                    var gulaDarahCard = document.getElementById("gulaDarahCard");
                    var kolesterolCard = document.getElementById("kolesterolCard");

                    // Ubah isi elemen card sesuai dengan data yang diterima
                    suhuCard.querySelector("p").textContent = data['Suhu Badan'];
                    tinggiCard.querySelector("p").textContent = data['Tinggi Badan'];
                    tekananDarahCard.querySelector("p").textContent = data['Tekanan Darah'];
                    denyutJantungCard.querySelector("p").textContent = data['Denyut Jantung'];
                    beratBadanCard.querySelector("p").textContent = data['Berat Badan'];
                    gulaDarahCard.querySelector("p").textContent = data['Kadar Gula Darah'];
                    kolesterolCard.querySelector("p").textContent = data['Kolesterol'];
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