<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nip = isset($_POST['nip']) ? $_POST['nip'] : '';
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $alamat = isset($_POST['alamat']) ? $_POST['alamat'] : '';
    

    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO pegawai VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $nip, $nama, $alamat]);
    // Output message
    $msg = 'Created Successfully!';
}
?>


<?=template_header('Create')?>

<div class="content update">
	<h2>RIZKI EMBAH</h2>
    <form action="create.php" method="post">
        <label for="nip">NIP</label>
        <label for="nama">NAMA</label>
        <input type="text" name="nip" id="id">
        <input type="text" name="nama" id="nama">
        <label for="alamat">ALAMAT</label>
        <label for="notelp">.</label><br>
        <input type="text" name="alamat" id="email">
        
       
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

