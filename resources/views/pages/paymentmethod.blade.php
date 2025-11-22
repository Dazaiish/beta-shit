<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="resources/css/app.css">

    <style>
        body {
            background-color: #F7EEE5; /* ganti warna sesuai keinginan */
            font-size: 20px;
            font-family: sans-serif;
        }

        .navbar .nav-link {
            color: #7A8646 !important; /* warna default */
            font-weight: bold;
        }

        .navbar .nav-link:hover {
            color: #636F47 !important; /* warna saat hover */
            font-weight: bold;
            font-size: 20px;
        }
        
        .container-fluid {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 150px;
        }

        .login-card { 
            max-width: 1000px; 
            margin: 40px auto; 
            border: 1px solid #636F47; 
            border-radius: 12px; 
            background: #FFF; 
            padding: 30px; 
        }
        
        /* --- SPLIT CARD LAYOUT --- */
        .split-card-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .date-section {
            flex: 1;
            padding-right: 20px;
        }
        .car-summary-section {
            flex: 1;
            padding-left: 30px;
            border-left: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .date-label {
            color: #999;
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .date-value {
            color: #000;
            font-weight: bold;
            font-size: 18px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            max-width: 350px;
        }
        .car-summary-header {
            color: #999;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .car-summary-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .car-summary-content img {
            width: 120px;
            border-radius: 5px;
        }
        .car-summary-name {
            font-weight: bold;
            font-size: 20px;
            color: #000;
        }
        .refund-info {
            color: #636F47;
            font-size: 14px;
            font-weight: bold;
            margin-top: 15px;
        }
    </style>
    </head>

    <body>
    <div style="width:100%; min-height: 100vh; background-color: #F7EEE5;">

        <div class ="container py-3 d-flex align-items-center">
            <h1 style="margin-left: 10px; margin-top: 40px; color: #636F47;
            font-size: 48.333px;font-style: normal;font-weight: 700;line-height: normal;">DrivenGo</h1>

            <!-- Date and Time -->
            <div id="date-time" class="flex-grow-1 text-center" style="margin-center: 50px; margin-top: 40px; gap: 20px">
                <span style="margin: 0 15px;">Jakarta |</span> 
                <span style="margin: 0 15px;" id="time"></span> |
                <span style="margin: 0 15px;" id="date"></span>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <script>
            function updateTime() {
                const now = new Date();
                const timeOptions = { hour: '2-digit', minute: '2-digit', second: '2-digit' };
                const dateOptions = { year: 'numeric', month: 'long', day: 'numeric' };
                document.getElementById('time').textContent = now.toLocaleTimeString('en-US', timeOptions);
                document.getElementById('date').textContent = now.toLocaleDateString('en-US', dateOptions);
            }
            setInterval(updateTime, 1000);
            updateTime();
        </script>

        <nav class="navbar navbar-expand-lg" style="background-color: #F7EEE5;">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto" style="gap: 150px;">
                        <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2 style="text-align : center; color:black; font-size: 24px; margin-top: 40px; font-weight: 700;">Detail Pemesanan</h2>
        <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 0px;">
            <div class="login-card shadow-sm">
                <form>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Sesuai dengan KTP, SIM, atau Paspor" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomorhp" class="form-label">Nomor HP</label>
                        <input type="text" class="form-control" id="nomorhp" name="nomorhp" placeholder="+62081234" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Jemput</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Pilih Lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasidropoff" class="form-label">Lokasi Drop-Off</label>
                        <input type="text" class="form-control" id="lokasidropoff" name="lokasidropoff" placeholder="Pilih Lokasi">
                    </div>
                    <div class="flex flex-col items-start gap-3">
                        <label for="OptionSame" class="inline-flex items-center gap-3">
                            <input type="checkbox" class="size-5 rounded border-gray-300 shadow-sm" id="OptionSame">
                            <span class="font-medium text-gray-700"> Samakan dengan lokasi jemput </span>
                        </label>
                    </div>
                </form>
            </div>
        </div>

        <h2 style="text-align : center; color:black; font-size: 24px; margin-top: 40px; font-weight: 700;">Tanggal Penjemputan dan Drop Off</h2>
        <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 0px;">
            <div class="login-card shadow-sm">
                <div class="split-card-container">
                    
                    <div class="date-section">
                        <div class="date-label">Tanggal Penjemputan:</div>
                        <div class="date-value">
                            <span>Sabtu, 8 Maret 2025</span>
                            <span style="color: #636F47;">07.00 WIB</span>
                        </div>

                        <div class="date-label">Tanggal Drop-Off:</div>
                        <div class="date-value">
                            <span>Sabtu, 8 Maret 2025</span>
                            <span style="color: #636F47;">18.00 WIB</span>
                        </div>
                    </div>

                    <div class="car-summary-section">
                        <div class="car-summary-header">Tanpa Sopir</div>
                        <div class="car-summary-content">
                            <img id="summary-car-image" src="" alt="Car Image">
                            <div class="car-summary-name" id="summary-car-name">Loading...</div>
                        </div>
                        <div class="refund-info">Dapat Refund, Reschedule, Overtime</div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 0px;">
            <div class="login-card shadow-sm">
                
                <form method="GET" action="/paymentsection">
                    
                    <input type="hidden" name="price" id="input-hidden-price">
                    <input type="hidden" name="car_name" id="input-hidden-car-name">

                    <div class="mb-3">
                        <h3 class="text-center" style="color:#000000; font-weight:700; margin-top:20px; text-align:left;">Total Pembayaran</h3>
                        <h5 class="fw-bold" id="display-total-price" style="color: #636F47; font-size: 30px;">IDR 0</h5>
                        
                        <h3 class="text-center" style="color:#000000; font-weight:700; margin-top:20px; margin-bottom: 20px; text-align:left;">Metode Pembayaran</h3>
                        <div class="flex flex-col items-start gap-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="bcaVA" value="BCA" required>
                                <label class="form-check-label font-medium text-gray-700" for="bcaVA">BCA Virtual Account</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="mandiriVA" value="Mandiri">
                                <label class="form-check-label font-medium text-gray-700" for="mandiriVA">Mandiri Virtual Account</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="briVA" value="BRI">
                                <label class="form-check-label font-medium text-gray-700" for="briVA">BRI Virtual Account</label>
                            </div>
                        </div>

                        <h3 class="text-center" style="color:#000000; font-weight:700; margin-top: 20px; margin-bottom:20px; text-align:left;">E-Wallet</h3>
                        <div class="flex flex-col items-start gap-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="qris" value="QRIS">
                                <label class="form-check-label font-medium text-gray-700" for="qris">QRIS</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="paymentMethod" id="gopay" value="Gopay">
                                <label class="form-check-label font-medium text-gray-700" for="gopay">Gopay</label>
                            </div>
                        </div>

                        <div class="d-flex" style="gap: 10px; margin-left: 80%; margin-top: 30px; margin-bottom: 10px;"> 
                            <button type="submit" class="btn btn-primary" style="background-color: #7A8646; color: white; border:none; padding: 10px 30px; font-size: 18px;">Buat Pemesanan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const carName = urlParams.get('car_name');
            const price = urlParams.get('price');

            const carImages = {
                "Wuling Cloud EV": "images/PRISTINE_WHITE.png",
                "Wuling New Air EV": "images/new-air-ev-pro.png",
                "IONIQ 5 Signature Long Range": "images/Ioniq-5.avif",
                "Nissan Leaf": "images/iris (2).jpg",
                "BYD M6": "images/bydM6.png",
                "Chery OMODA E5": "images/chery-omoda.png",
                "Tesla Model 3": "images/tezla3.jpg",
                "Wuling Binguo EV": "images/wuling-binguo.png",
                "Wuling Hongguang EV": "images/whong.png"
            };

            if (carName) {
                document.getElementById('summary-car-name').textContent = carName;
                document.getElementById('input-hidden-car-name').value = carName;
                
                const imagePath = carImages[carName] || "images/PRISTINE_WHITE.png"; 
                document.getElementById('summary-car-image').src = imagePath;
            }

            if (price) {
                const formattedPrice = new Intl.NumberFormat('id-ID', { 
                    style: 'currency', 
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(price);
                document.getElementById('display-total-price').textContent = formattedPrice;

                document.getElementById('input-hidden-price').value = price;
            }
        });
    </script>

</body>
</html>