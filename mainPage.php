<?php

    include 'php/koneksi.php';
    session_start();

    $sql = "SELECT * FROM pengguna WHERE username = '$_SESSION[username]'" ;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $sql2 = "SELECT * FROM akun" ;
    $result2 = mysqli_query($conn, $sql2);

    //select utang
    $sql3 = "SELECT SUM(jumlah) AS utang FROM `catatanutang` WHERE id_subkategori = '3' and id_pengguna = '$_SESSION[id]'";
    $result3 = mysqli_query($conn, $sql3);
    $piutang = mysqli_fetch_assoc($result3);

    //select piutang
    $sql4 = "SELECT SUM(jumlah) AS utang FROM `catatanutang` WHERE id_subkategori = '4' and id_pengguna = '$_SESSION[id]'";
    $result4 = mysqli_query($conn, $sql4);
    $utang = mysqli_fetch_assoc($result4);

    //select penjualan
    $sql4 = "SELECT SUM(ck.jumlah) AS utang FROM `catatankeuangan` ck INNER JOIN subkategori sk ON ck.id_subkategori = sk.id WHERE sk.id_kategori = '1' and id_pengguna = '$_SESSION[id]' and MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND YEAR(tanggal) = YEAR(CURRENT_DATE());";
    $result4 = mysqli_query($conn, $sql4);
    $penjualan = mysqli_fetch_assoc($result4);

    //select pengeluaran
    $sql5 = "SELECT SUM(ck.jumlah) AS utang FROM `catatankeuangan` ck INNER JOIN subkategori sk ON ck.id_subkategori = sk.id WHERE sk.id_kategori = '2' and id_pengguna = '$_SESSION[id]' and MONTH(tanggal) = MONTH(CURRENT_DATE())
    AND YEAR(tanggal) = YEAR(CURRENT_DATE());";
    $result5 = mysqli_query($conn, $sql5);
    $pengeluaran = mysqli_fetch_assoc($result5);
?>

<html>
    <head>
        <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/mainPage.css">
        

        <!--Import Font dari web-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&family=Raleway:ital,wght@0,800;1,500&family=Work+Sans:wght@500;900&display=swap" rel="stylesheet">
        
        
        <script src="js/components.js"></script>
    </head>
    <body>
    <div id="page">

        <div class = "navbar">
            <div class="navbarLogo">
                <h1>NOKET<h1>
            </div>
                <nav>
                        <ul class="navbarMenu">
                            <li><h3><a href="php/logout.php">Log out</a></h3></li>
                        </ul>
                </nav>
        </div>

        

        <div id="isi-page">
            <div id="sidebar">

                <div class="sidebar-item-profile">
                    <div id="sidebar-image-container">
                        <img src="foto/avatar-icon.png" alt="#" id="sidebar-image-profile">
                        <h1><?php
                        echo $row['username'];
                        ?></h1>   
                    </div>
                </div>
                
            
                <a href="mainPage.php" class="sidebar-item-container selected">
                    <div class="sidebar-item">
                        <div id="sidebar-item-icon">
                            <img src="foto/icons8-dashboard-100.png" alt="" id="sidebar-image">
                        </div>
                        <div class="sidebar-item-text">
                            <h3>Dashboard</h3>
                        </div>
                    </div>
                </a>

                <a href="#" class="sidebar-item-container collapsible">
                    <div class="sidebar-item">
                        <div id="sidebar-item-icon">
                            <img src="foto/icons8-money-96.png" alt="" id="sidebar-image">
                        </div>
                        <div class="sidebar-item-text">
                            <h3>Transaksi</h3>
                        </div>
                    </div>
                </a>

                    <div class="collapse-item">
                        <a href="penjualan.php" class="collapse-item-container" >
                            <div class="collapse-item-2">
                                <div id="collapse-item-icon">
                                    <img src="foto/kanan.png" alt="" id="sidebar-image">
                                </div>
                                <div class="sidebar-item-text">
                                    <h4>Penjualan</h4>
                                </div>
                            </div>
                        </a>
        
                        <a href="pengeluaran.php" class="collapse-item-container">
                            <div class="collapse-item-2">
                                <div id="collapse-item-icon">
                                    <img src="foto/kiri.png" alt="" id="sidebar-image">
                                </div>
                                <div class="sidebar-item-text">
                                    <h4>Pengeluaran</h4>
                                </div>
                            </div>
                        </a>

                    </div>

                <a href="#" class="sidebar-item-container collapsible">
                    <div class="sidebar-item">
                        <div id="sidebar-item-icon">
                            <img src="foto/icons8-money-bag-90.png" alt="" id="sidebar-image">
                        </div>
                        <div class="sidebar-item-text">
                            <h3>Utang & Piutang</h3>
                        </div>
                    </div>
                </a>

                    <div class="collapse-item">
                        <a href="utang.php" class="collapse-item-container" >
                            <div class="collapse-item-2">
                                <div id="collapse-item-icon">
                                  <img src="foto/keluar.png" alt="" id="sidebar-image">
                                </div>
                                <div class="sidebar-item-text">
                                    <h4>Utang</h4>
                                </div>
                            </div>
                        </a>

                        <a href="utang.php" class="collapse-item-container" >
                            <div class="collapse-item-2">
                                <div id="collapse-item-icon">
                                    <img src="foto/masuk.png" alt="" id="sidebar-image">
                                </div>
                                <div class="sidebar-item-text">
                                    <h4>Piutang</h4>
                                </div>
                            </div>
                        </a>

                    </div>

                <a href="#" class="sidebar-item-container">
                    <div class="sidebar-item">
                        <div id="sidebar-item-icon">
                            <img src="foto/icons8-goal-100.png" alt="" id="sidebar-image">
                        </div>
                        <div class="sidebar-item-text">
                            <h3>Target</h3>
                        </div>
                    </div>
            </a>
                <a href="#" class="sidebar-item-container collapsible">
                    <div class="sidebar-item">
                        <div id="sidebar-item-icon">
                            <img src="foto/icons8-account-100.png" alt="" id="sidebar-image">
                        </div>
                        <div class="sidebar-item-text">
                            <h3>Account</h3>
                        </div>
                    </div>
                </a>

                    <div class="collapse-item">
                        <a href="account.php" class="collapse-item-container" >
                            <div class="collapse-item-2">
                                <div id="collapse-item-icon">
                                    <img src="foto/icons8-admin-settings-male-90.png" alt="" id="sidebar-image">
                                </div>
                                <div class="sidebar-item-text">
                                    <h4>Profil</h4>
                                </div>
                            </div>
                        </a>
        
                        
                    </div>
            </div>

            

            <div id="content-card">
                
				<div class = "atas">
					<div class = "hijau">
					&nbsp&nbsp&nbsp&nbsp&nbsp Rp. <?php echo $penjualan['utang'];  ?>
					<img src = "foto/chartHijau.png">
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp Pemasukan Bulan ini</p>
					</div>
					
					<div class = "merah">
					&nbsp&nbsp&nbsp&nbsp&nbsp Rp. <?php echo $pengeluaran['utang']  ?>
					<img src = "foto/chartMerah.png">
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp Pengeluaran Bulan ini</p>
					</div>
				</div>
	
				<div class = "InfoAtas">
					<div class = "hInfo">
					<p></p>
					<center> <a href="penjualan.php">More Info</a></center>
					</div>
					<div class = "mInfo">
					<p></p>
					<center> <a href="pengeluaran.php">More Info</a></center>
					</div>
				</div>
				
				<div class = "bawah">
					<div class = "biru">
					&nbsp&nbsp&nbsp&nbsp&nbsp Rp. <?php echo $utang['utang'];?>
					<img src = "foto/chartBiru.png" >
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp Utang Belum dibayar</p>
					</div>
					
					<div class = "oren">
					&nbsp&nbsp&nbsp&nbsp&nbsp Rp. <?php echo $piutang['utang'];  ?>
					<img src = "foto/chartOren.png">
					<p>&nbsp&nbsp&nbsp&nbsp&nbsp Piutang Belum dibayar</p>
					</div>
				</div>
	
				<div class = "InfoBawah">
					<div class = "bInfo">
					<p></p>
					<center> <a href="utang.php">More Info</a></center>
					</div>
					<div class = "oInfo">
					<p></p>
					<center> <a href="piutang.php">More Info</a></center>
					</div>
				</div>
				
                </div>

				
            </div>

        </div>

        

        <div id="footer">
            <h4>Copyright@2021 Team ALOHA </h4>
        </div>
    </div>


    <script>
        /****Script Collapse Sidebar*****/
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
            content.style.display = "none";
            } else {
            content.style.display = "block";
            }
        });
        }
        /*********************************/
        
    </script>
    </body>
</html>
