<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Input</a></li>
      <!--li><a href="#profile" data-toggle="tab">Password</a></li-->
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="<?php echo current_url(); ?>" method="post"> 
        <label>Nama Jabatan</label>
        <input type="text" name="jabatan" class="input-xlarge">
		<input type="submit" value="submit" name="submit">
    </form>
      </div>
      <!--div class="tab-pane fade" id="profile">
    <form id="tab2">
        <label>New Password</label>
        <input type="password" class="input-xlarge">
        <div>
            <button class="btn btn-primary">Update</button>
        </div>
    </form-->
      </div>
  </div>
  
<div class="well">
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Jabatan</th>
          <th style="width: 70px;"></th>
        </tr>
      </thead>
      <tbody>
      
      <?php $i=1; foreach($data_jabatan->result() as $row): ?>
      
        <tr>
          <td><?php echo $i++; ?></td>
          <td><?php echo $row->nama_jabatan; ?></td>
          <td>
              <a href="<?php echo site_url('welcome/ubah_jabatan/'.$row->id_jabatan); ?>"><i class="icon-pencil"></i></a>
              <a href="<?php echo site_url('welcome/delete_jabatan/'.$row->id_jabatan); ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="icon-remove"></i></a>
          </td>
        </tr>
        
      <?php endforeach; ?>        
      </tbody>
    </table>
</div>  
