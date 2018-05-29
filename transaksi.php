<?php 
  include "model/getbarangbeli.php";
?>
  <?php include 'base/header.php' ?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">
        
        <div class="col-lg-1"></div>
        
        <div class="col-lg-11">
          <div class="row"></div>
          <br>
          <div class="row"><a href="/tambahbarang.php"><button class="btn btn-warning">Tambah Barang</button></a></div>
          <br>         
          <div class="row">
            <div class="col-12">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($data)){ 
                    $no = 0;
                    foreach($data as $row){ 
                      $no=$no+1;
                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $row['namaBarang'] ?></td>
                        <td><?php echo $row['hargaBarang'] ?></td>
                        <?php  if($row['statusBarang'] == 1){ ?>
                          <td><a href="/uploadbukti.php?idbarang=<?php echo $row['idbarang']; ?>"><button class="btn btn-info">Upload Bukti</button></a></td>
                        <?php }elseif($row['statusBarang'] == 2){ ?>
                          <td>Menunggu Konfirmasi Penjual</td>
                        <?php }elseif($row['statusBarang'] == 3){ ?>
                          <td><a href="model/acceptbarang.php?idbarang=<?php echo $row['idbarang']; ?>"><button class="btn btn-warning">Terima Barang</button></a></td>
                        <?php }elseif($row['statusBarang'] == 4){ ?>
                          <td>Barang Telah Diterima</td>
                        <?php } ?>
                      </tr>
                    <?php } ?>
                  <?php }else{ ?>
                    <tr>
                      <td colspan="5"><center>Tidak Ada Barang Dagangan</center></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include 'base/footer.php' ?>