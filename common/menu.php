<div class="top_bg">
<div class="container_16">
<div class="grid_5">
<a href="#">
<!-- Untuk Logo <img src="images/logo.png" class="logo" alt="Memix" /> -->
</a>
</div>
<!-- Top menu Start -->
<div class="grid_11">
<div class="topmenu">
	<ul class="sf-menu">
		<li <?php if($_GET[_page]=="") { ?> class="current_page_item" <?php } ?>><a href="index.php">Home</a></li>
		<li <?php if($_GET[_page]=="news") { ?> class="current_page_item" <?php } ?>><a href="news.php?_page=news">Berita Buntung</a></li>
		<li <?php if($_GET[_page]=="aboutus") { ?> class="current_page_item" <?php } ?>><a href="aboutus.php?_page=aboutus">About Us</a></li>
		<!--
		<li><a href="services.html">Services</a>
		<ul>
		<li><a href="#">Sub Nav Link</a></li>
		<li><a href="#">Sub Nav Link</a></li>
		<li><a href="#">Sub Nav Link</a></li>
		<li><a href="#">Sub Nav Link</a></li>
		<li><a href="#">Sub Nav Link</a></li>
		<li><a href="#">Sub Nav Link</a></li>
		</ul>
		</li>
		-->
		<?php
		if(empty($USERNAME))
		{
		?>
		<li <?php if($_GET[_page]=="regis") { ?> class="current_page_item" <?php } ?>><a href="register.php?_page=regis">Register</a></li>
		<li <?php if($_GET[_page]=="login") { ?> class="current_page_item" <?php } ?>><a href="login.php?_page=login">Login</a></li>
		<?php
		}
		else
		{
		$popo=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$USERNAME."'"));
		?>
		<li <?php if($_GET[_page]=="myaccount") { ?> class="current_page_item" <?php } ?>><a href="myaccount.php?_page=myaccount"><?php echo $USERNAME; ?> Account | <?php echo $popo[jumlah_poin]; ?> Poin</a></li>
		<?php
		}
		?>
		<li <?php if($_GET[_page]=="contact") { ?> class="current_page_item" <?php } ?>><a href="contact.php?_page=contact">Contact Us</a></li>
	 <?php 
		if(!empty($USERNAME)) 
		{ 
		?>
		<li><a href="logout.php">Logout</a></li>
		<?php
		}
		?>
	</ul>
</div>
</div>
</div>
</div>
