<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulisantai</title>
    <meta name="description" content="Tulisantai adalah website untuk menjalankan bot yang bisa menulis">
    <link rel="shortcut icon" href="fav.svg" type="image/x-icon">
    <link rel="stylesheet" href="asset/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- Tombol klik -->
    <?php
    error_reporting(0);
    if (isset($_POST["kirim"])) {
        $teks = $_POST["tulisan"];
        $media = $_POST["media"];

        // Cek kalo teks tidak kosong dan media tidak kosong
        if (!empty($teks) && !empty($media)) {

            // Cek kalo media adalah buku biasa (bb) / bukan
            if ($media == "bt") {
                $url = "https://hadi-api.herokuapp.com/api/canvas/nulis?text=" . urlencode($teks);
            } else {
                $url = "https://hadi-api.herokuapp.com/api/canvas/nulis2?text=" . urlencode($teks);
            }
        }
        // Cek kalo teks kosong
        else {
            echo "
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Lengkapi form',
                    text: 'Form media tulis jangan dikosongin, sobat!'
                })
            </script>
            ";
        }
    }
    ?>

    <!-- Start Navbar -->
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="container">
            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="asset/img/logo.svg" width="120" >
                </a>
                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Start Main -->
    <main class="is-flex-shrink-0">

        <!-- Start Header -->
        <header class="hero is-medium is-primary">
            <div class="hero-body">
            <img src="asset/img/welcome.svg" width="100%" style="border-radius: 20px;">
                <p class="title" style="text-align: center; margin-top: 20px;">
                    TULISANTAI
                </p>
                <p class="subtitle" style="text-align: justify;">
                    Pasti kalian sangat malas sekali dengan metode merangkum sebuah teks kedalam sebuah tulisan tangan kan? Apalagi pada saat E - Learning itu terkadang harus mewajibkan kita untuk menulisnya dibuku.<br><br>
                    Nah, dengan bantuan <a href="https://trakteer.id/armatriwah/tip" target="_blank">TULISANTAI</a> kalian dapat dengan mudah layaknya seperti tulisan tangan di buku dan HVS tanpa perlu cape nulis pastinya... Mending main Mobile Legends, becanda.
                </p>
            </div>
        </header>
        <!-- End Header -->

        <section class="mt-6 mb-6">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column is-6">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Form Tulisan
                                </p>
                                <button class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="far fa-paper-plane" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <form action="" method="post">
                                        <div class="field">
                                            <label class="label">Media Tulis</label>
                                            <div class="control">
                                                <div class="select is-100">
                                                    <select name="media">
                                                        <option disabled selected>Pilih Media</option>
                                                        <option value="bt">Buku Tulis</option>
                                                        <option value="hvs">HVS</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label">Teks</label>
                                            <div class="control">
                                                <textarea class="textarea" placeholder="Masukkan teks yang akan ditulis.." name="tulisan" required></textarea>
                                            </div>
                                        </div>
                                        <div class="field is-grouped">
                                            <div class="control">
                                                <button class="button is-primary" type="submit" name="kirim">Kirim</button>
                                            </div>
                                            <div class="control">
                                                <button class="button is-primary is-light" type="reset">Ulang</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Gambar
                                </p>
                                <button class="card-header-icon" aria-label="more options">
                                    <span class="icon">
                                        <i class="far fa-images" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <?php if (!empty($url)) : ?>
                                        <figure class="image is-square">
                                            <img src="<?= $url ?>" alt="gambar bot" id="gambar_bot">
                                        </figure>
                                        <a class="button is-primary" href="<?= $url ?>" download="<?= $url ?>" target="_blank">Download</a>
                                    <?php else : ?>
                                        <figure class="image is-square">
                                            <img src="asset/img/no-data-animate.svg" alt="gak ada gambar">
                                        </figure>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <!-- End Main -->

    <!-- Start Footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <p>Dibuat dengan <span class="has-text-danger">&hearts;</span> oleh <strong><a href="https://www.instagram.com/armatriwah/" target="_blank">Arma Gedon</a></strong></p>
            <script type='text/javascript' src='https://cdn.trakteer.id/js/embed/trbtn.min.js'></script><script type='text/javascript'>(function(){var trbtnId=trbtn.init('Trakteer Saya','#00D1B2','https://trakteer.id/armatriwah/tip','https://trakteer.id/images/mix/pizza.png','40');trbtn.draw(trbtnId);})();</script>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Cek Status -->
    <?php if (!empty($status)) : ?>
        <?php if ($status == 0) : ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Bot gagal menulis!'
                })
            </script>
        <?php elseif ($status == 1) : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Bot berhasil menulis!'
                })
            </script>
        <?php endif ?>
    <?php endif ?>
    <script src="asset/js/main.js"></script>
</body>

</html>