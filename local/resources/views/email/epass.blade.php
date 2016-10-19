<h1>Hi, <?php echo Session::get('email_nama'); ?></h1>
 
<p>Berikut kami kirimkan password anda untuk dapat login ke PT. PLN BATU BARA</p>
<p></p>
<p>Nama Perusahaan : <?php echo Session::get('email_nama'); ?></p>
<p>Alamat Surat	   : <?php echo Session::get('email_alamat'); ?></p>
<p>Email    	   : <?php echo Session::get('email_email'); ?></p>
<p>NPWP    	       : <?php echo Session::get('email_npwp'); ?></p>
<p>Password        : <?php echo Session::get('email_password'); ?></p>
<p></p>
<p>Terima Kasih </p>
<p>PT. PLN BATU BARA</p>


