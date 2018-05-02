<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="style/main/main.css">
    <link type="text/css" rel="stylesheet" href="style/main/header.css">
    <link type="text/css" rel="stylesheet" href="style/main/hmenu.css">
    <link type="text/css" rel="stylesheet" href="style/main/container.css">
    <link type="text/css" rel="stylesheet" href="style/main/footer.css">
    <link type="text/css" rel="stylesheet" href="style/main/uye.css">
    <title>Karaca</title>
</head>
<body>
<?php
$db=include 'baglanti.php';
?>
    <div class="notifications">
        <div class="notiLeft">%50 ye varan  İndirim!</div>
        <div class="notiRight">
            <ul>
                <li>
                    <b><a>Kampanya</a></b>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
                <li>
                    <b><a>Test Mutfağı</a></b>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
                <li>
                    <b><a>OPEN by KARACA</a></b>
                    &nbsp;&nbsp;|&nbsp;&nbsp;
                </li>
            </ul>
        </div>
    </div>
    <div>
            <div class="main-container">
                <section class="header">
                    <div class="hcontainer">
                        <div class="row">
                                <a href="main.html"><img src="img/karaca_black.png" id="main_img"></a>
                                <input title="asdasd">
                                <ul>
                                    <li><a href="/">SİPARİŞ TAKİP</a></li>
                                    <li><a href="index.php?secim=kayit">GİRİŞ</a></li>
                                    <li><a href="/">SEPET</a></li>
                                </ul>
                        </div>
                    </div>
                    <nav class="hmenu">
                        <div class="row">
                            <!--<ul>
                                <li>
                                    <a href="#">YENİLER</a>
                                </li>
                                <li>
                                    <a href="#">SOFRA GRUBU</a>
                                    <div class="popup">
                                        <ol>
                                            <li>Yemek</li>
                                            <li>Yemek</li>
                                            <li>Yemek</li>
                                            <li>Yemek</li>
                                        </ol>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">MUTFAK GRUBU</a>
                                    <div class="popup">
                                        <ol>
                                            <li>Mutfak</li>
                                            <li>Mutfak</li>
                                            <li>Mutfak</li>
                                            <li>Mutfak</li>
                                        </ol>
                                    </div></li>
                                <li><a href="#">KÜÇÜK EV ALETLERİ</a>
                                    <div class="popup">
                                        <ol>
                                            <li>Ev aletleri</li>
                                            <li>Ev aletleri</li>
                                            <li>Ev aletleri</li>
                                            <li>Ev aletleri</li>
                                        </ol>
                                    </div></li>
                                <li><a href="#">EV TEKSTİLİ</a>
                                    <div class="popup">
                                        <ol>
                                            <li>Ev Tekstili</li>
                                            <li>Ev Tekstili</li>
                                            <li>Ev Tekstili</li>
                                            <li>Ev Tekstili</li>
                                        </ol>
                                    </div></li>
                                <li><a href="#">AKSESUARLAR</a>
                                    <div class="popup">
                                        <ol>
                                            <li>Aksesuar</li>
                                            <li>Aksesuar</li>
                                            <li>Aksesuar</li>
                                            <li>Aksesuar</li>
                                        </ol>
                                    </div></li>
                                <li><a href="#">KEŞFET</a></li>
                                <li><a href="#">İNDİRİM</a></li>
                            </ul>-->
                            <ul>
                                <?php
                                    $sql="SELECT GroupName FROM product_groups";
                                    $result=mysqli_query($db,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo "<li><a href='#'>".$row['GroupName']."</a>
                                                <div class='popup'>
                                                <ol class='category'>";
                                            $sql2="SELECT CategoryName FROM category WHERE GroupsID=(SELECT GroupID FROM product_groups WHERE GroupName='".$row['GroupName']."')";
                                            $result2=mysqli_query($db,$sql2);
                                            while($row2=mysqli_fetch_assoc($result2)){
                                                echo "<li><a href='#'>".$row2['CategoryName']."</a>
                                                <ol class='subcategory'>";
                                                $sql3="SELECT SubCategoryName FROM sub_category WHERE CategoryID=(SELECT CategoryID FROM category WHERE CategoryName='".$row2['CategoryName']."' LIMIT 1) ";
                                                $result3=mysqli_query($db,$sql3);
                                                while($row3=mysqli_fetch_assoc($result3)){
                                                    echo "<li>".$row3['SubCategoryName']."</li>";
                                                }
                                                echo "</ol>
                                                </li>";
                                            }
                                           echo "</ol>
                                            </div>
                                            </li>";
                                    }
                                ?>
                            </ul>
                        </div>
                    </nav>
                </section>
                <section class="container">
                    <div class="slider">
                        <a href="#"><img src="img/slider/vantuzslider.jpg" alt="süpürge"></a>
                    </div>
                    <div class="home">
                        <div class="ikili">
                            <div>
                                <a href="#"><img src="img/home/ikili/neseli-yemek.png" alt="yemektakımı"></a>
                            </div>
                            <div>
                                <a href="#"><img src="img/home/ikili/herseytamam-kcuk.jpg" alt="çatalbıçak"></a>
                            </div>
                        </div>
                        <div class="pankart">
                            <p><i><b>Fark Yaratan Ürünler, Süper Fiyatlar ve Daha Fazlası!</b></i></p>
                        </div>
                        <div class="uclu">
                            <div>
                                <a href="#"><img src="img\home\uclu\cook-pres.jpg" alt="yemektakımı"></a>
                            </div>
                            <div>
                                <a href="#"><img src="img\home\uclu\lunabanner.jpg" alt="yemektakımı"></a>
                            </div>
                            <div>
                                <a href="#"><img src="img\home\uclu\tencere-dekstop.jpg" alt="yemektakımı"></a>
                            </div>
                        </div>
                        <div class="ikili">
                            <div>
                                <a href="#"><img src="img/home/ikili/sepet20-ban.jpg" alt="yemektakımı"></a>
                            </div>
                            <div>
                                <a href="#"><img src="img/home/ikili/melina-nevr.jpg" alt="çatalbıçak"></a>
                            </div>
                         </div>
                         <div class="ikili">
                            <div>
                                <a href="#"><img src="img/home/ikili/re-jumbo-banner.jpg" alt="yemektakımı"></a>
                            </div>
                            <div>
                                <a href="#"><img src="img/home/ikili/unicef-bqanner.jpg" alt="çatalbıçak"></a>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
    </div>
    
    <section class="footer">
            <div class="footer-container">
                <div>
                    <ul>
                        <li class="footer-cel">
                            <p>KARACA</p>
                            <ul>
                                <li>Hakkımızda</li>
                                <li>Ödüllerimiz</li>
                                <li>Mağazalar</li>
                                <li>Katalog</li>
                                <li>Franchise Başvuru</li>
                                <li>Havale Bildirim Formu</li>
                                <li>Kırık Parça Talep Formu</li>
                                <li>Sık Sorulan Sorular</li>
                                <li>İletişim</li>
                            </ul>
                        </li>
                        <li class="footer-cel">
                            <p>SERVİS</p>
                            <ul>
                                <li>Gizlilik ve Güvenlik</li>
                                <li>Kargo ve Teslimat</li>
                                <li>Ödeme Yöntemleri</li>
                                <li>Sağlam Ürün Sigortası</li>
                                <li>İade ve İptal Şartları</li>
                                <li>Sipariş Takibi</li>
                                <li>Bilgi Toplumu Hizmetleri</li>
                                <li>İşlem Rehberi</li>
                            </ul>
                        </li>
                        <li class="footer-cel">
                                <p>KATEGORİLER</p>
                                <ul>
                                    <li>Fine Pearl</li>
                                    <li>Blendfit</li>
                                    <li>Balık Sofrası</li>
                                    <li>Kahve Keyfi</li>
                                    <li>Kahvaltı Saati</li>
                                    <li>Bio Granit</li>
                                    <li>Çay Saati</li>
                                    <li>Barbekü</li>
                                    <li>Evde Eğlence</li>
                                    <li>Sağlıklı Yaşam</li>
                                </ul>
                        </li>
                        <li class="footer-cel">
                                <p>LIFE</p>
                                <ul>
                                    <li>Senin Sofran</li>
                                    <li>OPEN by KARACA</li>
                                </ul>
                                <p style="padding-top:30px">MARKALAR</p>
                                <ul style="padding-top:30px">
                                    <li style="float:left;padding-right:15px;font-size:15px"><b>Dil Seçimi</b></li>
                                    <li style="display:inline">
                                        <select name="list-language" id="list_lang" style="width:150px;text-align:center">
                                            <option value="#">Türkçe</option>
                                            <option value="#">English</option>
                                        </select>
                                    </li>
                                </ul>
                        </li>
                    </ul>
                </div>
                <div class="footer-social">
                    <div><img src="./img/karaca_black.png" alt=""></div>
                    <div class="social-icon">
                        <img src="./img/social/facebook.png" alt="">
                        <img src="./img/social/twitter.png" alt="">
                        <img src="./img/social/instagram.png" alt="">
                        <img src="./img/social/pinterest.png" alt="">
                        <img src="./img/social/youtube.png" alt="">
                    </div>
                </div>
                <div>
                    <small>Krc.com.tr © 2018 - Karaca Züccaciye A.Ş. Tüm hakları saklıdır.</small>
                </div>
                <div class="footer-card">
                    <img src="./img/cards/axess.png" alt="">
                    <img src="./img/cards/bonus.png" alt="">
                    <img src="./img/cards/cardfinans.png" alt="">
                    <img src="./img/cards/comodo.png" alt="">
                    <img src="./img/cards/maximum.png" alt="">
                    <img src="./img/cards/paraf.png" alt="">
                    <img src="./img/cards/visa-and-mastercard.png" alt="">
                    <img src="./img/cards/world.jpg" alt="">
                </div>
            </div>
        </section>

<?php
$secim="";$islem="";
    if($secim.isset($_GET["secim"]))
        $secim=$_GET["secim"];
    if($islem.isset($_GET["islem"]))
        $islem=$_GET["islem"];
    if($secim=="kayit"&&$islem!="kaydet"){
?>
        <div class="uyelik"></div>
        <div class="uyeol">
            <div class="uyepanel">
                <form action="index.php?islem=kaydet" name="uyekayit" method="post">
                <table width="205px">
                    <thead>Kayıt Ol</thead>
                    <tr>
                        <td><input type="text" name="isim" placeholder="ADINIZ"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="soyisim" placeholder="SOYADINIZ"></td>
                    </tr>
                    <tr>
                        <td><input type="email" name="mail" placeholder="E-Posta"></td>
                    </tr>
                    <tr>
                        <td><input type="password" name="sifre" placeholder="Parola"></td>
                    </tr>

                    <tr width="200px">
                        <td>
                            <input type="checkbox" name="gizlilik" value="Gizlilik" style="width: 15px"><p style="margin-left: 20px">Gizlilik sözleşmesini okudum, kabul ediyorum.</p>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <input type="checkbox" name="duyuru" value="Duyuru" style="width: 15px"><p style="margin-left: 20px">Duyuru ve kampanyalardan haberdar olmak istiyorum.</p>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="button" value="Kayıt Ol" ></td>
                    </tr>
                </table>
            </div>
        </div>
<?php }
elseif ($islem=="kaydet"){
        mysqli_set_charset($db,"utf8");
        $adi=$_POST["isim"];
        $soyadi=$_POST["soyisim"];
        $email=$_POST["mail"];
        $sifre=$_POST["sifre"];

        $denetle="SELECT * FROM member WHERE Mail='$email' LIMIT 1";
        $kontrol=mysqli_num_rows(mysqli_query($db,$denetle));

        if($kontrol<1){

            $ekle="INSERT INTO member(Mail,Mad,Msoyad,Msifre) VALUES ('$email','$adi','$soyadi',md5('$sifre'))";
            mysqli_query($db,$ekle);
        }
        else{
            echo "Aynı kullanıcı var";
        }
}?>
</body>
</html>