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
            max-width: 800px; 
            margin: 40px auto; 
            border: 1px solid #636F47; 
            border-radius: 12px; 
            background: #FFF; 
            padding: 40px; 
            text-align: center;
        }
        
        .instruction-text {
            color: black; 
            font-size: 20px; 
            margin-bottom: 15px; 
            margin-top: 10px; 
            font-weight: 500;
            text-align: left;
        }

        .va-number {
            color: #636F47; 
            font-size: 36px; 
            font-weight: 800; 
            margin: 20px 0;
            letter-spacing: 2px;
        }

        .timer-box {
            background-color: #FDF6F0;
            color: #D9534F;
            padding: 10px;
            border-radius: 8px;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 20px;
        }

        .copy-btn {
            background: none;
            border: none;
            color: #636F47;
            cursor: pointer;
            font-size: 20px;
            margin-left: 10px;
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

        <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 0px;">
            <div class="login-card shadow-sm">
                
                <div class="timer-box">
                    Selesaikan transaksi dalam <span id="countdown">23:59:59</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                    <small>Order ID: <span id="order-id">DG-882910</span></small>
                    <small id="payment-amount-label" style="font-weight: bold; font-size: 18px;">Total: IDR 0</small>
                </div>

                <h3 id="payment-title" style="color:black; font-size: 24px; margin-bottom: 10px; font-weight: 700;">Nomor Virtual Account</h3>
                
                <div class="d-flex justify-content-center align-items-center">
                    <div class="va-number" id="va-number">Loading...</div>
                    <button class="copy-btn" onclick="copyToClipboard()" title="Copy Number">📋</button>
                </div>
                
                <p id="payment-method-name" style="color: gray; margin-bottom: 30px;">Loading...</p>

                <hr>

                <h3 style="color:black; font-size: 20px; margin-bottom: 20px; margin-top: 20px; font-weight: 700; text-align: left;">Cara Pembayaran:</h3>
                
                <div class="instruction-text">1. Buka Menu Transfer / Pembayaran</div>
                <div class="instruction-text" id="instruction-2">2. Pilih Virtual Account</div>
                <div class="instruction-text">3. Masukkan Nomor / Scan Code di atas</div>
                <div class="instruction-text">4. Pastikan jumlah tagihan sesuai</div>
                
                <div class="mt-5">
                    <a href="/" class="btn btn-outline-secondary">Kembali ke Beranda</a>
                    <button class="btn btn-primary" style="background-color: #7A8646; border:none; margin-left: 10px;">Saya Sudah Membayar</button>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const urlParams = new URLSearchParams(window.location.search);
            const price = urlParams.get('price');
            const selectedMethod = urlParams.get('paymentMethod'); 
            
            if (price) {
                const formattedPrice = new Intl.NumberFormat('id-ID', { 
                    style: 'currency', 
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }).format(price);
                document.getElementById('payment-amount-label').textContent = 'Total: ' + formattedPrice;
            }

            const titleEl = document.getElementById('payment-title');
            const numberEl = document.getElementById('va-number');
            const nameEl = document.getElementById('payment-method-name');
            const instrEl = document.getElementById('instruction-2');

            const randomSuffix = Math.floor(1000000000 + Math.random() * 9000000000); 

            if (selectedMethod === 'BCA') {
                titleEl.textContent = "Nomor Virtual Account";
                numberEl.textContent = "8801 " + randomSuffix;
                nameEl.textContent = "BCA Virtual Account";
                instrEl.textContent = "2. Pilih menu BCA Virtual Account";
            } 
            else if (selectedMethod === 'Mandiri') {
                titleEl.textContent = "Nomor Virtual Account";
                numberEl.textContent = "89022 " + randomSuffix;
                nameEl.textContent = "Mandiri Virtual Account";
                instrEl.textContent = "2. Pilih menu Mandiri Virtual Account";
            } 
            else if (selectedMethod === 'BRI') {
                titleEl.textContent = "Nomor BRIVA";
                numberEl.textContent = "77888 " + randomSuffix; 
                nameEl.textContent = "BRI Virtual Account";
                instrEl.textContent = "2. Pilih menu Pembayaran BRIVA";
            } 
            else if (selectedMethod === 'QRIS') {
                titleEl.textContent = "Kode QRIS";
                numberEl.textContent = "(QRIS CODE)"; 
                nameEl.textContent = "QRIS";
                instrEl.textContent = "2. Pilih menu Scan QRIS";
            } 
            else if (selectedMethod === 'Gopay') {
                titleEl.textContent = "Nomor Virtual Account Gopay";
                numberEl.textContent = "70001 0812 3456 7890"; 
                nameEl.textContent = "Gopay (via Gojek)";
                instrEl.textContent = "2. Pilih menu Top Up / Tagihan Gopay";
            } 
            else {
                titleEl.textContent = "Nomor Virtual Account";
                numberEl.textContent = "8801 " + randomSuffix;
                nameEl.textContent = "BCA Virtual Account";
            }

            const randomId = Math.floor(100000 + Math.random() * 900000);
            document.getElementById('order-id').textContent = "DG-" + randomId;

            let time = 24 * 60 * 60; 
            const countdownEl = document.getElementById('countdown');

            setInterval(updateCountdown, 1000);

            function updateCountdown() {
                const hours = Math.floor(time / 3600);
                const minutes = Math.floor((time % 3600) / 60);
                const seconds = time % 60;

                countdownEl.innerHTML = `${hours < 10 ? '0' : ''}${hours}:${minutes < 10 ? '0' : ''}${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                time--;
            }
        });

        function copyToClipboard() {
            const vaNumber = document.getElementById('va-number').innerText.replace(/\s/g, '');
            navigator.clipboard.writeText(vaNumber).then(() => {
                alert("Nomor berhasil disalin!");
            });
        }
    </script>

</body>
</html>