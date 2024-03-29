<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>
    <!-- <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data mahasiswa <strong>berhasil</strong> <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

<div class="container-fluid">
<br>
  <h2 style="text-align: center;">Check Shipping Costs</h2>
  <br>
  <?= form_open('') ?>
  <!-- <form action="/action_page.php"> -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
              <label for="kota_asal">Origin Shipment:</label>
              <select class="browser-default custom-select" name="kota_asal" required>

                <?php if(empty($input['kota_asal'])): ?>
                  <option value="" selected>Origin</option>
                <?php endif; ?>

                <?php foreach($daftar_kota as $kota): ?>
                  <?php if($input['kota_asal'] === $kota['city_id']): ?>
                    <option value="<?= $kota['city_id'] ?>" selected><?= $kota['city_name'] ?></option>
                  <?php else: ?>
                    <option value="<?= $kota['city_id'] ?>"><?= $kota['city_name'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>

              </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
              <label for="kota_tujuan">Destination Shipment:</label>
              <select class="browser-default custom-select" name="kota_tujuan" required>

                <?php if(empty($input['kota_tujuan'])): ?>
                  <option value="" selected>Destination</option>
                <?php endif; ?>

                <?php foreach($daftar_kota as $kota): ?>
                  <?php if($input['kota_tujuan'] === $kota['city_id']): ?>
                    <option value="<?= $kota['city_id'] ?>" selected><?= $kota['city_name'] ?></option>
                  <?php else: ?>
                    <option value="<?= $kota['city_id'] ?>"><?= $kota['city_name'] ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
            </div>        
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
              <label for="berat">Weight (Gram):</label>
              <input type="number" class="form-control" id="berat" value="<?= !empty($input['berat']) ? $input['berat'] : 1000 ?>" placeholder="The shipment weight is in grams" name="berat" required>              
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
              <label for="kurir">Courier:</label>
              <select class="browser-default custom-select" name="kurir" required>

                <?php if(empty($input['kurir'])): ?>
                  <option value="" selected>Select Courier</option>
                  <option value="jne">JNE</option>
                  <option value="tiki">TIKI</option>
                  <option value="pos">POS</option>
                <?php else: ?>
                  <option value="jne"<?= $input['kurir'] === 'jne' ? ' selected' : '' ?>>JNE</option>
                  <option value="tiki"<?= $input['kurir'] === 'tiki' ? ' selected' : '' ?>>TIKI</option>
                  <option value="pos"<?= $input['kurir'] === 'pos' ? ' selected' : '' ?>>POS</option>
                <?php endif; ?>
                
              </select>
            </div>        
        </div>
    </div>
    <button type="submit" class="btn btn-danger btn-block">CHECK</button>
    <?= form_close() ?>
</div>
</div>
<br>
<hr>

<?php if(!empty($daftar_ongkir)): ?>
<div class="container">
<h2>Courier Name: <?= $daftar_ongkir[0]['name'] ?></h2>
<?php foreach($daftar_ongkir[0]['costs'] as $deskripsi_ongkir): ?>
    <ul>
        <li><strong>Type of Delivery: <?= $deskripsi_ongkir['service'] ?> (<?= $deskripsi_ongkir['description'] ?>)</strong></li>
        <?php foreach($deskripsi_ongkir['cost'] as $ongkir_detail): ?>
            Price: Rp <?= number_format($ongkir_detail['value'],0,",",".") ?>
            <br>Estimate: <?= $ongkir_detail['etd'] ?> Hari
            <br>Note: <?= $ongkir_detail['note'] ?>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
</div>
<?php endif; ?>

<br><br><br>
<!-- Footer -->
<footer class="page-footer font-small text-white bg-dark fixed-bottom">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
  Find me on <a href="https://github.com/ijonk7" target="_blank" style="text-decoration: none;">Github 
    <i class="fa fa-github w3-hover-opacity"></i>. </a>Created by <a href="" style="text-decoration: none;">Muhammad Rizal</a>
    
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->