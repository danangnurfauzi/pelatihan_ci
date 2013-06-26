<script src="<?php echo base_url() ?>assets/lib/bootstrap/js/bootstrap-datepicker.js"></script>    
        <script type="text/javascript">
            $(function(){
               $('#dp3').datepicker({
                    format: 'yyyy-mm-dd'
               }); 
            });
        
        </script>
<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Input Karyawan</a></li>
      <!--li><a href="#profile" data-toggle="tab">Password</a></li-->
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form method="post" action="<?php echo current_url(); ?>">
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="input-xlarge" value="<?php if(!empty($ubah_karyawan)): echo $ubah_karyawan->nama_lengkap; endif; ?>">
        <label>Tempat Lahir</label>
        <input type="text" name="tmpLhr" class="input-xlarge" value="<?php if(isset($ubah_karyawan)): echo $ubah_karyawan->tempat_lahir; endif; ?>">
        <label>Tanggal Lahir</label>
        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
          <input class="span2" size="16" type="text" name="tglLhr" value="<?php if(isset($ubah_karyawan)): echo $ubah_karyawan->tanggal_lahir; endif; ?>">
          <span class="add-on"><i class="icon-th"></i></span>
        </div>        
        <label>Nomor Handphone</label>
        <input type="text" name="nohp" class="input-xlarge" value="<?php if(isset($ubah_karyawan)): echo $ubah_karyawan->no_hp; endif; ?>">        
        <label>Alamat</label>
        <textarea name="alamat" rows="3" class="input-xlarge"><?php if(isset($ubah_karyawan)): echo $ubah_karyawan->alamat; endif; ?></textarea>
        <label>Jabatan</label>
        <select name="jabatanid" class="input-xlarge">
            <?php foreach($data_jabatan->result() as $row): ?>
                <option value="<?php echo $row->id_jabatan ?>" <?php if($row->id_jabatan == $ubah_karyawan->id_jabatan): echo 'selected="selected"'; endif; ?>><?php echo $row->nama_jabatan; ?></option>
            <?php endforeach; ?>
        </select>
        <label></label>
        <input type="submit" name="submit" value="submit" class="btn btn-primary" />
    </form>
      </div>
      <div class="tab-pane fade" id="profile">
    <!--form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form-->
      </div>
  </div>

</div>


