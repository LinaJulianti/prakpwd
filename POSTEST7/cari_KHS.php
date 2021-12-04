<?php
include 'koneksi.php';
?>

<h3>Form Pencarian DATA KHS Dengan PHP</h3>

<form action="" method="get">
    <label for="">Cari : </label>
    <input type="text" name="cari">
    <input type="submit" value="Cari">
</form>

<?php
$result = 0;
if (isset($_GET['cari'])){
    $cari = $_GET['cari'];
    echo "<b> Hasil Pencarian : ".$cari."</b>";
}
?>

<table border="1">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama_MHS</th>
        <th>KodeMK</th>
        <th>Nama_MK</th>
        <th>nilai</th>
    </tr>
    <?php
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $sql = "SELECT * FROM khs WHERE NIM= '".$cari."'";
            $result = mysqli_query($con,$sql);
        } else{
            $sql = "SELECT * FROM khs";
            $result = mysqli_query($con,$sql);
        }
        $no = 1;
        while($r = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['NIM']; ?></td>
            <td><?php echo $r['Nama_MHS']; ?></td>
            <td><?php echo $r['KodeMK']; ?></td>
            <td><?php echo $r['Nama_MK']; ?></td>
            <td><?php echo $r['nilai']; ?></td>
        </tr>
        <?php } ?>
</table> 