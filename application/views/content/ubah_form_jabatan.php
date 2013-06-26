<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Input</a></li>
      <!--li><a href="#profile" data-toggle="tab">Password</a></li-->
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
    <form id="tab" action="<?php echo current_url(); ?>" method="post"> 
        <label>Nama Jabatan</label>
        <input type="text" name="jabatan" class="input-xlarge" value="<?php echo $data_jab->nama_jabatan; ?>">
		<input type="submit" value="Ubah" name="submit">
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