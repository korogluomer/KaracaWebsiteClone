
<html>
<head></head>
<body>

<?php
    $islem="";
    if($islem.isset($_GET["islem"]))
        $islem=$_GET["islem"];
    $db=include 'baglanti.php';
    if(isset($_POST['groupname'])){
        $sql="INSERT INTO product_groups(GroupName) VALUES ('".$_POST['groupname']."')";
        mysqli_query($db,$sql);
    }
    if(isset($_POST['categoryname'])){
        $sql="SELECT GroupID FROM product_groups WHERE GroupName='".$_POST['group']."' LIMIT 1";
        $result=mysqli_query($db,$sql);
        $grupid=mysqli_fetch_assoc($result);
        $sql="INSERT INTO category(CategoryName,GroupsID) VALUES ('".$_POST['categoryname']."',".$grupid['GroupID'].")";
        mysqli_query($db,$sql);
        echo $_POST['group'];
    }
    if(isset($_POST['subcategoryname'])){
        $sql="SELECT CategoryID FROM category Where CategoryName='".$_POST['category']."' LIMIT 1";
        $result=mysqli_query($db,$sql);
        $categoryid=mysqli_fetch_assoc($result);
        $sql="INSERT INTO sub_category(SubCategoryName,CategoryID) VALUES ('".$_POST['subcategoryname']."',".$categoryid['CategoryID'].")";
        mysqli_query($db,$sql);
    }
    if(isset($_POST['brandname'])){
        $sql="INSERT INTO brands(BrandName) VALUES ('".$_POST['brandname']."')";
        mysqli_query($db,$sql);
    }
    if(isset($_POST['urunadd'])){
        $filetmp=$_FILES['urunresmi']['tmp_name'];
        $filename=$_FILES["urunresmi"]['name'];
        $filetype=$_FILES["urunresmi"]['type'];
        $filepath="img/products/".$filename;
        move_uploaded_file($filetmp,$filepath);
        echo $filepath;
        $productname=$_POST['urunadi'];
        $productfiyat=$_POST['urunfiyati'];
        $productstok=$_POST['urunstok'];
        $productindirimy=$_POST['urunyuzdesi'];
        $productindirim=$productfiyat-($productfiyat*($productindirimy/100));
        $sql="SELECT GroupID FROM product_groups WHERE GroupName='".$_POST['grupadi']."' LIMIT 1";
        $groupadi=mysqli_query($db,$sql);
        $sql="SELECT CategoryID FROM category WHERE CategoryName='".$_POST['kategoriadi']."' LIMIT 1";
        $categoryadi=mysqli_query($db,$sql);
        $sql="SELECT SubCategoryID FROM sub_category WHERE SubCategoryName='".$_POST['altkategoriadi']."' LIMIT 1";
        $subcategoryadi=mysqli_query($db,$sql);
        $sql="SELECT BrandID FROM brands WHERE BrandName='".$_POST['markaadi']."'";
        $brandadi=mysqli_query($db,$sql);
        echo is_string($filepath);
        $sql="INSERT INTO products(Padi,Pfiyat,Pstok,Presim,Pindirim,Pindirimy,GroupID,CategoryID,SubCategoryID,BrandID) 
              VALUES ('$productname',$productfiyat,$productstok,'$filepath',$productindirim,$productindirimy,$groupadi,$categoryadi,$subcategoryadi,$brandadi)";
        mysqli_query($db,$sql);
        echo "eklendi";
    }
    if($islem=="altkategori"){
        $sql="DELETE FROM sub_category WHERE SubCategoryName='".$_POST['subcatsil']."'";
        mysqli_query($db,$sql);
    }
    elseif($islem=="kategori"){
        $sql="DELETE FROM sub_category WHERE CategoryID=(SELECT CategoryID FROM category WHERE CategoryName='".$_POST['catsil']."' LIMIT 1)";
        mysqli_query($db,$sql);
        $sql="DELETE FROM category WHERE CategoryName='".$_POST['catsil']."'";
        mysqli_query($db,$sql);
    }
    elseif ($islem=="grup"){
        $sql="DELETE FROM sub_category WHERE CategoryID=(SELECT CategoryID FROM category WHERE GroupsID=(SELECT GroupID FROM product_groups WHERE GroupName='".$_POST['groupsil']."') LIMIT 1)";
        mysqli_query($db,$sql);
        $sql="DELETE FROM category WHERE GroupsID=(SELECT GroupID FROM product_groups WHERE GroupName='".$_POST['groupsil']."')";
        mysqli_query($db,$sql);
        $sql="DELETE FROM product_groups WHERE GroupName='".$_POST['groupsil']."'";
        mysqli_query($db,$sql);
    }
?>
<form action="adminpanel.php" method="post" name="kategorikayit">
    <table style="border: 1px solid">
        <tr>
            <td>
                Kategori Adı:
            </td>
            <td>
                <input type="text" name="categoryname"/>
            </td>
        </tr>
        <tr>
            <td>
                Ait Olduğu Grup:
            </td>
            <td>
                <select style="width: 150px" name="group">
                    <?php
                        $sql="SELECT GroupName FROM product_groups";
                        $result=mysqli_query($db,$sql);
                        while($row=mysqli_fetch_assoc($result)){
                            echo "<option>".$row["GroupName"]."</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="categoryadd"/>
            </td>
        </tr>
    </table>
</form>
<form action="adminpanel.php" name="grupkayit" method="post">
        <table style="border: 1px solid">
        <tr>
            <td>
                Grup Adı:
            </td>
            <td>
                <input name="groupname" type="text"/>
            </td>
        </tr>
        <tr>
            <td>
                <input name="groupadd" type="submit" />
            </td>
        </tr>
    </table>
    </form>
<form action="adminpanel.php" method="post" name="altkategorikayit">
    <table style="border: 1px solid">
        <tr>
            <td>
                Alt Kaegori Adı:
            </td>
            <td>
                <input type="text" name="subcategoryname"/>
            </td>
        </tr>
        <tr>
            <td>
                Kategori Adi:
            </td>
            <td>
                <select name="category">
                    <?php
                    $sql="SELECT CategoryName FROM category";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row["CategoryName"]."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="subcategoryadd"/>
            </td>
        </tr>
    </table>
</form>
<form action="adminpanel.php?islem=altkategori" method="post" name="altkategorisil">
    <table style="border: 1px solid">
        <tr>
            <td>
                Silinecek AltKategori:
            </td>
            <td>
                <select name="subcatsil">
                    <?php
                    $sql="SELECT SubCategoryName FROM sub_category";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['SubCategoryName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="subcategorydel"/>
            </td>
        </tr>
    </table>
</form>
<form action="adminpanel.php?islem=kategori" method="post" name="kategorisil">
    <table style="border: 1px solid">
        <tr>
            <td>
                Silinecek Kategori:
            </td>
            <td>
                <select name="catsil">
                    <?php
                    $sql="SELECT CategoryName FROM category";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['CategoryName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit"/>
            </td>
        </tr>
    </table>
</form>
<form action="adminpanel.php?islem=grup" method="post" name="grupsil">
    <table style="border: 1px solid">
        <tr>
            <td>
                Silenecek Grup:
            </td>
            <td>
                <select name="groupsil">
                    <?php
                    $sql="SELECT GroupName FROM product_groups";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['GroupName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit"/>
            </td>
        </tr>
    </table>
</form>
<form action="adminpanel.php" method="post" name="markaekle">
    <table style="border: 1px solid">
        <tr>
            <td>
                Marka Adı:
            </td>
            <td>
                <input type="text" name="brandname"/>
            </td>
        </tr>
        <tr>
            <td style="collapse: 2">
                <input type="submit">
            </td>
        </tr>
    </table>
</form>
<form action="adminpanel.php" method="post" enctype="multipart/form-data">
    <table style="border: 1px solid">
        <tr>
            <td>
                Ürün Adı:
            </td>
            <td>
                <input type="text" name="urunadi"/>
            </td>
        </tr>
        <tr>
            <td>
                Marka Adı :
            </td>
            <td>
                <select name="markaadi">
                    <?php
                    $sql="SELECT BrandName FROM brands";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['BrandName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Ürün Resmi:
            </td>
            <td>
                <input type="file" name="urunresmi"/>
            </td>
        </tr>
        <tr>
            <td>
                Ürün Fiyatı:
            </td>
            <td>
                <input type="number" name="urunfiyati">
            </td>
        </tr>
        <tr>
            <td>
                Ürün İndirim Yüzdesi:
            </td>
            <td>
                <input type="number" name="urunyuzdesi">
            </td>
        </tr>
        <tr>
            <td>
                Ürün Stok:
            </td>
            <td>
                <input type="number" name="urunstok">
            </td>
        </tr>
        <tr>
            <td>
                Grup Adı:
            </td>
            <td>
                <select name="grupadi">
                    <?php
                    $sql="SELECT GroupName FROM product_groups";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['GroupName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Kategori Adı:
            </td>
            <td>
                <select name="kategoriadi">
                    <?php
                    $sql="SELECT CategoryName FROM category";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['CategoryName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Alt Kategori Adı:
            </td>
            <td>
                <select name="altkategoriadi">
                    <?php
                    $sql="SELECT SubCategoryName FROM sub_category";
                    $result=mysqli_query($db,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        echo "<option>".$row['SubCategoryName']."</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="urunadd"/>
            </td>
        </tr>
    </table>
</form>
</body>
</html>