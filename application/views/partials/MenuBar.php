<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('index.php');?>">Borrow Books</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('index.php');?>">หน้าหลัก <span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo base_url('index.php/add/customer');?>">เพิ่มลูกค้า</a></li>
        <li><a href="<?php echo base_url('index.php/add/borrow');?>">เพิ่มการยืมหนังสือ</a></li>
        <li><a href="<?php echo base_url('index.php/get/exportjson');?>">Export Json</a></li>
      </ul>
    </div>
  </div>
</nav>