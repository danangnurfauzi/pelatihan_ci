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
        <input type="text" name="nama" class="input-xlarge" />
        <label>Tempat Lahir</label>
        <input type="text" name="tmpLhr" class="input-xlarge" />
        <label>Tanggal Lahir</label>
        <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
          <input class="span2" size="16" type="text" name="tglLhr">
          <span class="add-on"><i class="icon-th"></i></span>
        </div>
        <label>Nomor Handphone</label>
        <input type="text" name="nohp" class="input-xlarge" />        
        <label>Alamat</label>
        <textarea name="alamat" rows="3" class="input-xlarge"></textarea>
        <label>Jabatan</label>
        <select name="jabatanid" class="input-xlarge">
            <?php foreach($data_jabatan->result() as $row): ?>
                <option value="<?php echo $row->id_jabatan ?>" ><?php echo $row->nama_jabatan; ?></option>
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

<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama</th>
          <th>Tempat Lahir</th>
          <th>Tanggal Lahir</th>
          <th>Alamat</th>
          <th>Nomor HP</th>
          <th>Jabatan</th>
          <th style="width: 23px;"></th>
        </tr>
      </thead>
      <tbody>
      
      <?php $i=1; 
      
      if($karyawan->num_rows() > 0):
      
        foreach($karyawan->result() as $row): ?>
      
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row->nama_lengkap; ?></td>
          <td><?php echo $row->tempat_lahir; ?></td>
          <td><?php echo $row->tanggal_lahir; ?></td>
          <td><?php echo $row->alamat; ?></td>
          <td><?php echo $row->no_hp; ?></td>
          <td><?php echo $row->nama_jabatan; ?></td>
          <td>
              <a href="<?php echo site_url('welcome/form_user_edit/'.$row->id_karyawan); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('welcome/delete_karyawan/'.$row->id_karyawan); ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-remove"></i></a>
          </td>
        </tr>
        
      <?php endforeach; endif ?>        
      </tbody>
    </table>
</div>


