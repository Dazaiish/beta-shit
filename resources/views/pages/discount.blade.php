<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #F7EEE5; /* ganti warna sesuai keinginan */
            font-size: 20px
        }

        .navbar .nav-link {
            color: #7A8646 !important;   /* warna default */
            font-weight: bold;
        }

        .navbar .nav-link:hover {
            color: #636F47 !important;   /* warna saat hover */
            font-weight: bold;
            font-size: 20px;
        }

        /* --- ADDED CSS FOR DISCOUNT --- */
        .discount-badge {
            background-color: #FFC107; /* A standard yellow color */
            color: #000;
            padding: 4px 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            display: inline-block;
            margin-bottom: 5px;
        }

        .original-price {
            text-decoration: line-through;
            color: #6c757d; /* A muted grey color */
            font-size: 18px;
        }
        /* --- END OF ADDED CSS --- */

        /* --- NEW CSS FOR DROPDOWN --- */
        .car-collapse-trigger {
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .car-collapse-trigger[aria-expanded="true"] {
            border-bottom-left-radius: 0 !important;
            border-bottom-right-radius: 0 !important;
            border-bottom: none !important;
            margin-bottom: 0 !important; 
        }

        .car-details-panel {
            background: #FFF;
            border: 1px solid #F7EEE5; 
            border-top: none; 
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
            margin-top: 0;
            margin-bottom: 1.5rem; 
            padding: 30px;
            font-size: 18px;
        }

        /* --- New Styles for Order Button --- */
        .order-section {
            margin-top: 30px;
        }
        .order-price {
            color: #636F47;
            font-weight: 700;
            font-size: 24px;
            text-align: right;
            margin-bottom: 10px;
        }
        .btn-order {
            background-color: #636F47;
            color: white;
            width: 100%;
            font-weight: bold;
            padding: 12px;
            border-radius: 5px;
            border: none;
            transition: background-color 0.3s;
        }
        .btn-order:hover {
            background-color: #4f5a36;
            color: white;
        }

    </style>
    </head>



    <body>
    <div style="width:100%; min-height: 1024px; background-color: #F7EEE5; border: 1px solid var(--Background, #F7EEE5);background: #F7EEE5;">

        <div class ="container py-3 d-flex align-items-center">
            <h1 style="margin-left: 10px; margin-top: 40px; color: #636F47;
            font-size: 48.333px;font-style: normal;font-weight: 700;line-height: normal;">DrivenGO</h1>

            <div id="date-time" class="flex-grow-1 text-center" style="margin-center: 50px; margin-top: 40px; gap: 20px">
                <span style="margin: 0 15px;">Jakarta |</span> 
                <span style="margin: 0 15px;" id="time"></span> |
                <span style="margin: 0 15px;" id="date"></span>
            </div>


            <div class="d-flex" style="gap: 10px; margin-left: auto; margin-right: 50px; margin-top: 40px;"> 
                <a href="/login" class="btn btn-outline-primary me-2" style="border-color: #7A8646; color: #7A8646;background-color: white;">Login</a>
                <a href="/register" class="btn btn-primary" style="background-color: #7A8646; color: white;">Register</a>
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

                    <form class="d-flex" style="margin-left: 30px; margin-top: 10px; max-width: 800px; border-radius: 20px;">
                        <input class="form-control me-2" type="text" placeholder="Cari" aria-label="Cari" style="width: 458px; height: 58px; border-radius: 20px;">
                        </form>

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto" style="gap: 150px;">

                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/">Beranda</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link #636F47" href="/filter">Filter</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link #636F47" href="/discount">Discount 10.10</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Sopir</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Sopir</a></li>
                                    <li><a class="dropdown-item" href="#">Tanpa Sopir</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                </nav>


                <div class="container-custom mx-auto p-4" style="max-width: 1450px; margin-top: 20px;">
                    
                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descCloudEV" aria-expanded="false">

                        <img src="{{ asset('images/PRISTINE_WHITE.png') }}" 
                        alt="Wuling Cloud EV" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Wuling Cloud EV</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 5 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 1.200.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 840.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descCloudEV">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Wuling Cloud EV adalah mobil listrik modern dengan desain elegan dan interior luas yang nyaman untuk perjalanan keluarga maupun bisnis. Dilengkapi kapasitas 5 penumpang dan 2 bagasi besar, mobil ini cocok untuk perjalanan jarak dekat maupun menengah.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Car Charger tersedia untuk mendukung perjalanan jarak jauh tanpa khawatir baterai habis.</li>
                                <li>Gratis 2 botol air mineral bagi setiap penyewa untuk kenyamanan perjalanan.</li>
                                <li>E-Toll Card sudah terintegrasi, memudahkan Anda melewati gerbang tol tanpa repot.</li>
                                <li>Kabin senyap khas mobil listrik memberikan pengalaman berkendara yang lebih tenang.</li>
                            </ul>
                            <p>Dengan performa ramah lingkungan dan biaya hemat energi, Wuling Cloud EV menjadi pilihan tepat bagi Anda yang ingin bepergian dengan nyaman sekaligus mendukung gaya hidup berkelanjutan.</p>
                            
                            <div class="order-section">
                                <div class="order-price">IDR 840.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Wuling Cloud EV">
                                    <input type="hidden" name="price" value="840000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descAirEV" aria-expanded="false">

                        <img src="{{ asset('images/new-air-ev-pro.png') }}" 
                        alt="Wuling New Air EV" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Wuling New Air EV</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 4 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 850.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 595.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descAirEV">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Wuling New Air EV adalah mobil listrik berukuran ringkas dengan desain compact yang futuristik, menjadikannya sangat ideal untuk mobilitas harian di perkotaan. Mobil ini mudah dikendarai, diparkir, dan dapat menempuh jarak hingga 300 km dalam sekali pengisian daya.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Desain Compact memudahkan berkendara di jalan sempit dan parkir di ruang terbatas.</li>
                                <li>Easy Home Charging System memungkinkan pengisian daya yang praktis di rumah.</li>
                                <li>WIND (Wuling Indonesian Command) untuk perintah suara yang cerdas.</li>
                            </ul>
                            <p>Wuling New Air EV menawarkan solusi mobilitas perkotaan yang proven & tested, menjamin kepraktisan dan efisiensi dalam setiap perjalanan.</p>

                            <div class="order-section">
                                <div class="order-price">IDR 595.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Wuling New Air EV">
                                    <input type="hidden" name="price" value="595000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descIoniq5" aria-expanded="false">

                        <img src="{{ asset('images/Ioniq-5.avif') }}" 
                        alt="IONIQ 5" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">IONIQ 5 Signature Long Range</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 5 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 3.000.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 2.100.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descIoniq5">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Hyundai IONIQ 5 Signature Long Range merupakan SUV Crossover listrik premium yang menggabungkan desain retro-futuristik dengan teknologi mutakhir. Model Long Range ini menawarkan jarak tempuh yang lebih jauh (klaim hingga ≈451 km) dan performa tinggi (hingga ≈217 hp) berkat baterai ≈72.6 kWh.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Desain Parametrik Pixel yang ikonik dan unik.</li>
                                <li>Vehicle-to-Load (V2L) yang dapat menyalurkan daya listrik ke perangkat eksternal.</li>
                                <li>Panoramic Roof dan kursi kulit premium untuk kenyamanan maksimal.</li>
                                <li>Dilengkapi Hyundai SmartSense untuk fitur keselamatan dan bantuan pengemudi canggih.</li>
                            </ul>
                            <p>Nikmati pengalaman berkendara yang mewah, berteknologi tinggi, dan ramah lingkungan dengan Hyundai IONIQ 5 Signature Long Range.</p>

                            <div class="order-section">
                                <div class="order-price">IDR 2.100.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="IONIQ 5 Signature Long Range">
                                    <input type="hidden" name="price" value="2100000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descLeaf" aria-expanded="false">

                        <img src="{{ asset('images/iris (2).jpg') }}" 
                        alt="Nissan Leaf" style="width: 450px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Nissan Leaf</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 5 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 2.500.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 1.750.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descLeaf">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Nissan Leaf adalah hatchback 5 pintu listrik yang sudah teruji secara global, dikenal sebagai mobil listrik terlaris di dunia. Dengan desain yang ramah lingkungan (Leading, Environmentally friendly, Affordable, Family car), Leaf memberikan pengalaman berkendara yang responsif dan gesit.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>e-Pedal memungkinkan pengemudi berakselerasi, deselerasi, dan berhenti hanya dengan satu pedal.</li>
                                <li>ProPILOT Assist untuk pengalaman semi-autonomous driving yang meringankan beban pengemudi di jalan tol.</li>
                                <li>Sistem Regenerative Braking untuk efisiensi energi yang lebih baik.</li>
                                <li>V2G (Vehicle-to-Grid) Ready, memungkinkannya menyalurkan kembali energi ke jaringan listrik.</li>
                            </ul>
                            <p>Nissan Leaf adalah pilihan yang tepat bagi Anda yang mencari mobil listrik yang andal, praktis, dan telah terbukti performanya.</p>

                            <div class="order-section">
                                <div class="order-price">IDR 1.750.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Nissan Leaf">
                                    <input type="hidden" name="price" value="1750000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descBYD" aria-expanded="false">

                        <img src="{{ asset('images/bydM6.png') }}" 
                        alt="BYD M6" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">BYD M6</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 7 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 1.500.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 1.050.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descBYD">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>BYD M6 adalah mobil MPV listrik modern yang dirancang khusus untuk kenyamanan dan kapasitas keluarga. Dengan kemampuan menampung 7 penumpang dan interior yang lega, mobil ini sangat ideal untuk perjalanan keluarga besar atau kebutuhan bisnis.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Jarak Tempuh Optimal untuk perjalanan jauh tanpa sering mengisi daya.</li>
                                <li>Sistem Infotainment Canggih dengan layar besar yang intuitif untuk navigasi dan hiburan.</li>
                                <li>Interior Premium dengan material berkualitas tinggi untuk pengalaman berkendara yang mewah.</li>
                                <li>Fitur Keselamatan Komprehensif untuk memberikan ketenangan pikiran sepanjang perjalanan.</li>
                            </ul>

                            <div class="order-section">
                                <div class="order-price">IDR 1.050.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="BYD M6">
                                    <input type="hidden" name="price" value="1050000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descOmoda" aria-expanded="false">

                        <img src="{{ asset('images/chery-omoda.png') }}" 
                        alt="Chery OMODA E5" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Chery OMODA E5</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 7 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 450.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 315.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descOmoda">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Chery OMODA E5 adalah Crossover EV futuristik yang memadukan desain berani dan artistik dengan teknologi listrik mutakhir. Mobil ini menawarkan kenyamanan premium untuk 5 penumpang dan sangat cocok untuk gaya hidup perkotaan yang dinamis.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Desain Aerodinamis yang menarik perhatian dan meningkatkan efisiensi energi.</li>
                                <li>Fitur ADAS Lengkap (Advanced Driver Assistance Systems) untuk bantuan dan keamanan berkendara.</li>
                                <li>Pengisian Daya Cepat yang memungkinkan baterai terisi dalam waktu singkat.</li>
                                <li>Performa Bertenaga khas mobil listrik yang responsif untuk pengalaman mengemudi yang menyenangkan.</li>
                            </ul>

                            <div class="order-section">
                                <div class="order-price">IDR 315.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Chery OMODA E5">
                                    <input type="hidden" name="price" value="315000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descTesla" aria-expanded="false">

                        <img src="{{ asset('images/tezla3.jpg') }}" 
                        alt="Tesla Model 3" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Tesla Model 3</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 5 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 3.500.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 2.450.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descTesla">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Tesla Model 3 adalah sedan listrik performa tinggi yang mendefinisikan ulang standar kendaraan listrik dengan teknologi revolusioner dan desain minimalis. Mobil ini menawarkan pengalaman berkendara yang mendebarkan untuk 5 penumpang dan ideal untuk penggemar teknologi.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Akselerasi Instan yang memberikan sensasi sporty yang tak tertandingi.</li>
                                <li>Autopilot yang canggih untuk mengemudi yang lebih santai dan aman.</li>
                                <li>Konektivitas Maksimal melalui layar sentuh tunggal sebagai pusat kendali.</li>
                                <li>Jaringan Supercharger Global untuk kemudahan pengisian daya di mana pun Anda berada.</li>
                            </ul>

                            <div class="order-section">
                                <div class="order-price">IDR 2.450.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Tesla Model 3">
                                    <input type="hidden" name="price" value="2450000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descBinguo" aria-expanded="false">

                        <img src="{{ asset('images/wuling-binguo.png') }}" 
                        alt="Wuling Binguo EV" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Wuling Binguo EV</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 5 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 800.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 560.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descBinguo">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Wuling Binguo EV adalah hatchback listrik yang stylish dan ringkas, sempurna untuk mobilitas perkotaan. Dengan desain retro-modern dan interior yang cukup lega, mobil ini memberikan kenyamanan untuk 4 penumpang dalam aktivitas harian.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Manuver Lincah yang sangat cocok untuk kondisi lalu lintas padat dan parkir sempit.</li>
                                <li>Interior Bernuansa Premium dengan aksen kulit sintetis dan desain yang apik.</li>
                                <li>Pengoperasian yang Sangat Hemat Biaya, ideal untuk penggunaan sehari-hari.</li>
                                <li>Jarak Tempuh yang Memadai untuk aktivitas harian di dalam kota.</li>
                            </ul>

                            <div class="order-section">
                                <div class="order-price">IDR 560.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Wuling Binguo EV">
                                    <input type="hidden" name="price" value="560000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="car-collapse-trigger d-flex align-items-center border rounded mb-4 bg-white shadow-sm w-100 justify-content-between" 
                         style="min-height: 150px; height: 228px; border-radius: 10px; border: 1px solid #636F47; background: #FFF;"
                         data-bs-toggle="collapse" data-bs-target="#descHongguang" aria-expanded="false">

                        <img src="{{ asset('images/whong.png') }}" 
                        alt="Wuling Hongguang EV" style="width: 400px; height: auto; border-radius: 10px; margin-right: 10px; padding-left: 100px;">

                        <div class="d-flex flex-column" style="flex: 1;">
                            <h5 class="mb-2" style="color: #000000; margin-bottom: 30px;">Wuling Hongguang EV</h5>
                            <div class="d-flex mb-2" style="gap: 20px;">
                                <span>👤 4 Orang</span>
                                <span>🧳 2 Koper</span>
                            </div>
                        </div>     

                        <div class="text-end pe-5">
                            <span class="discount-badge">Discount 30%</span>
                            <div class="original-price">IDR 700.000 / hari</div>
                            <h5 class="fw-bold" style="color: #636F47; font-size: 30px;">IDR 490.000 / hari</h5>
                        </div>
                    </div>

                    <div class="collapse" id="descHongguang">
                        <div class="car-details-panel">
                            <h3 class="fw-bold mt-4 mb-3">Deskripsi Mobil</h3>
                            <p>Wuling Hongguang EV adalah mobil mini listrik praktis dan fungsional, yang fokus pada efisiensi ruang dan kemudahan akses di perkotaan. Meskipun ukurannya ringkas, mobil ini mampu membawa 4 penumpang dan merupakan solusi transportasi yang terjangkau.</p>
                            <p>Fitur unggulan:</p>
                            <ul>
                                <li>Ukuran Kompak yang membuatnya sangat mudah untuk parkir dan bermanuver di jalan sempit.</li>
                                <li>Biaya Kepemilikan yang Rendah berkat efisiensi listrik dan perawatan minimal.</li>
                                <li>Pengisian Daya yang Fleksibel, dapat dilakukan di rumah dengan mudah.</li>
                                <li>Cocok sebagai Kendaraan Komuter yang andal untuk aktivitas harian jarak pendek.</li>
                            </ul>

                            <div class="order-section">
                                <div class="order-price">IDR 490.000</div>
                                <form action="/paymentmethod" method="GET">
                                    <input type="hidden" name="car_name" value="Wuling Hongguang EV">
                                    <input type="hidden" name="price" value="490000">
                                    <button type="submit" class="btn-order">Lanjut ke Form Pemesanan</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </body>
</html>