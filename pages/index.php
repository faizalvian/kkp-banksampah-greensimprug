<?php
    include('header.php');
?>

<?php
//cek jika url index.php tidak ada nilai
if(isset($_GET['hal'])){
    //berikan nilai index.php?hal
    switch($_GET['hal']){
        //saat index?hal=beranda, tampilkan isi konten dari beranda.php
        case 'beranda'  : include 'beranda.php'; break;

        //saat index?hal=nsb, tampilkan isi konten dari mod_nasabah/datanasabah.php
        case 'nsb'      : include 'mod_nasabah/datanasabah.php'; break;

        //saat index?hal=cst, tampilkan isi konten dari mod_customer/datacustomer.php
        case 'cst'      : include 'mod_customer/datacustomer.php'; break;

        //saat index?hal=sph, tampilkan isi konten dari mod_sampah/datasampah.php
        case 'sph'      : include 'mod_sampah/datasampah.php'; break;

        //saat index?hal=tb, tampilkan isi konten dari mod_tabsampah/datatabsampah.php
        case 'etb'      : include 'mod_tabsampah/entrytabsampah.php'; break;
        case 'etbdtl'   : include 'mod_tabsampah/entrytabsampahdtl.php'; break;
        case 'tb'       : include 'mod_tabsampah/datatabsampah.php'; break;
        case 'lptb'     : include 'mod_tabsampah/lapperiode.php'; break;

        //saat index?hal=js, tampilkan isi konten dari mod_jualsampah/datajualsampah.php
        case 'ejs'      : include 'mod_jualsampah/entryjualsampah.php'; break;
        case 'ejsdtl'   : include 'mod_jualsampah/entryjualsampahdtl.php'; break;
        case 'js'       : include 'mod_jualsampah/datajualsampah.php'; break;
        case 'lppn'     : include 'mod_jualsampah/lapperiode.php'; break;

        //saat index?hal=pt, tampilkan isi konten dari mod_pencairantab/datapencairantab.php
        case 'ept'      : include 'mod_pencairantab/entrypencairantab.php'; break;
        case 'eptdtl'   : include 'mod_pencairantab/entrypencairantabdtl.php'; break;
        case 'dps'   : include 'mod_pencairantab/datapencairantab.php'; break;

        //saat index?hal=tk, tampilkan isi konten dari mod_penerimaankas/datapenerimaankas.php
        case 'etk'      : include 'mod_penerimaankas/entryterimakas.php'; break;
        case 'dtk'      : include 'mod_penerimaankas/dataterimakas.php'; break;

        //saat index?hal=pk, tampilkan isi konten dari mod_pengeluarankas/datapengeluarankas.php
        case 'ekk'      : include 'mod_pengeluarankas/entrykaskeluar.php'; break;
        case 'dpk'      : include 'mod_pengeluarankas/datapengeluarankas.php'; break;

        case 'lpkas'    : include 'lapkas.php'; break;

        //selain itu tampilkan konten dari 404.php
        default : include '404.php';
    }
}else{
    //halaman default dari index berisi konten beranda.php
    include 'beranda.php';
}
?>

<?php
    include('mod_tabsampah/detiltabsampah.php');
    include('mod_jualsampah/detiljualsampah.php');
    
?>

<!-- INPUT MODALS -->
<?php
    include('mod_nasabah/tambahnasabah.php');
    include('mod_customer/tambahcustomer.php');
    include('mod_penerimaankas/tambahkettransaksi.php');
    include('mod_pengeluarankas/tambahtransaksikeluar.php');
?>
<!-- END INPUT MODALS -->

<!-- UPDATE MODALS -->
<?php
    include('mod_nasabah/updatenasabah.php');
    include('mod_customer/updatecustomer.php');
    include('mod_sampah/updatesampah.php');
?>
<!-- END UPDATE MODALS -->

<?php
    include('mod_penerimaankas/detilterimakas.php');
    include('mod_pengeluarankas/detilkeluarkas.php');
    include('mod_pencairantab/detilpencairantab.php');
?>



<?php
    include('footer.php');
?>