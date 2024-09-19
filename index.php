<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css ">
    <link rel="stylesheet" href="countdown/simplyCountdown.theme.default.css" />
    <script src="countdown/simplyCountdown.min.js"></script>
    <title>Undangan pernikahan </title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Grey+Qo&family=Noto+Sans+JP:wght@100..900&family=Sacramento&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
</head>

<body>

    <main>
        <div class="wrapper">
            <div class="group-1">
                <h1 class="undangan" id="undangan"><b>Undangan pernikahan</b></h1>
                <h1 class="sacramento-regular">Shiny dan keili</h1>
                <img src="po.jpg" alt="orang yang ingin nikah" class="responsive">
                <h2 class="nama"><b>(pernikahan)</b></h2>
                <h2 class="bi"><b>Michael susanto</b></h2>
                <h4>Anak kedua dari Ayah Shiny dan ibu Shiny </h4>
                <h2 class="ki"><b>Keili taki chandra</b></h2>
                <h4>Anak ketiga dari Ayah Keili dan ibu Keili</h4>
                <div class="carousel">
                    <div class="carousel-inner">
                        <img src="hi.jpg" alt="image 1" class="active">
                        <img src="mi.jpg" alt="image 2">
                        <img src="mahiru.png" alt="image 3">
                    </div>
                    <button class="prev">prev</button>
                    <button class="next">next</button>
                </div>
                <h2>pernikahan ini dilaksanakan pada tanggal 21 bulan 2 tahun 2025</h2>
                <div class="simply-countdown"></div>
                <h2>Pernikahan ini dilangsungkan Di Hotel Tepian</h2>
            </div>
        </div>
        <div class="wrap">
            <div class="group-2">
                <div style="width: 100%">
                    <iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=hote%20tepian+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                            href="https://www.gps.ie/">
                            lihat map</iframe>
                </div>
            </div>
        </div>
        <h3>Ucapan dan doa</h3>
        <P>berikan ucapan harapan dan doa untuk mempelai</P>
        <form action="insert.php" method="post">
            <input type="text" name="nama" placeholder="nama" required><br>
            <textarea name="ucapan" cols="30" rows="4" placeholder="ucapan" required></textarea><br>
            <select name="keterangan" required>
                <option value="" selected disabled hidden>Konfirmasi kehadiran</option>
                <option value="1">hadir</option>
                <option value="2">tidak hadir</option>
                <option value="3">tidak tau</option>
            </select>
            <button>kirim</button>
            <?php
            include 'koneksi.php';
            //menampilkan data
            $SQL2 = "SELECT * FROM bukutamu ORDER BY ID DESC";
            $hasil = $connection->query($SQL2);

            ?>
            <div style="margin:auto; text-align:center; height:200px; width:300px;  overflow:scroll;" class="ucapan">
                <?php
                while ($baris = $hasil->fetch_row()) {
                ?>
                    <div style="border-style:solid;border-color:red;margin:10px;">
                        <p style="font-weight:bold;">nama:<?= $baris[1] ?></p>
                        <P>ucapan:<?= $baris[2] ?></p>
                        <p>keterangan:<?= $baris[3] ?></p>
                    </div>
                <?php
                }
                $hasil->free_result();
                ?>
            </div>
        </form>
        <audio controls autoplay loop src="poli.mp3"></audio>
    </main>
    <script>
        simplyCountdown('.simply-countdown', {
            year: 2025, // required
            month: 2, // required
            day: 21, // required
            hours: 8, // Default is 0 [0-23] integer
            words: { //words displayed into the countdown
                days: {
                    singular: 'hari',
                    plural: 'hari'
                },
                hours: {
                    singular: 'jam',
                    plural: 'jam'
                },
                minutes: {
                    singular: 'menit',
                    plural: 'menit'
                },
                seconds: {
                    singular: 'detik',
                    plural: 'detik'
                }
            },
        });
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.querySelector('.carousel-inner');
            const images = carousel.querySelectorAll('img');
            const prevBTN = document.querySelector('.prev');
            const nextBTN = document.querySelector('.next');
            let currentIndex = 0;

            function showImage(index) {
                images[currentIndex].classList.remove('active');
                images[index].classList.add('active');
                currentIndex = index;
            }

            prevBTN.addEventListener('click', function() {
                let index = currentIndex - 1;
                if (index < 0) index = images.length - 1;
                showImage(index);
            });

            nextBTN.addEventListener('click', function() {
                let index = currentIndex + 1;
                if (index >= images.length) index = 0;
                showImage(index);
            });

            function startAutoSlide() {
                setInterval(() => {
                    let index = currentIndex + 1;
                    if (index >= images.length) index = 0;
                    showImage(index);
                }, 3000);
            }

            startAutoSlide();
        });
    </script>

</body>

</html>