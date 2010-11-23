<?php
 include "common/config.php";
	
	if(empty($_POST[pert1]))
	{
	 ?>
		 <script language="javascript">
			 alert("Pertanyaan Pertama Belum Diisi");
				document.location="register1_ref.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis";
			</script>
		<?php
	}
	else if(empty($_POST[pert2]))
	{
	 ?>
		 <script language="javascript">
			 alert("Pertanyaan Kedua Belum Diisi");
				document.location="register1_ref.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis";
			</script>
		<?php
	}
	else if((($_POST[pert2])==1)&&(!empty($_POST[pert4])))
	{
	 ?>
		 <script language="javascript">
			 alert("Apabila Anda memilih Opsi 'Pernah' pada pertanyaan kedua, mohon tidak menjawab pertanyaan keempat.");
				document.location="register1_ref.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis";
			</script>
		<?php
	}
	else if((($_POST[pert2])==2)&&(!empty($_POST[pert3])))
	{
	 ?>
		 <script language="javascript">
			 alert("Apabila Anda memilih Opsi 'Tidak Pernah' pada pertanyaan kedua, mohon tidak menjawab pertanyaan ketiga.");
				document.location="register1_ref.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis";
			</script>
		<?php
	}
	else
	{
		if($_POST[pert4]==4)
		{
			$isi4=$_POST[lainnya];
		}
		else
		{
			$isi4=$_POST[pert4];
		}
		
	
		if(($_POST[lainlagi]==1)&&(empty($_POST[lainlagi2])))
		{
			$lainlagi="KOSONG";
		}
		else if(($_POST[lainlagi]==1)&&(!empty($_POST[lainlagi2])))
		{
			$lainlagi=$_POST[lainlagi2];
		}
		
		$kui="INSERT INTO kuisioner (pert1, pert2, pert3, pert4, computer, handphone, gadget, game, lcd, camera, fashion, kendaraan, ebook, furniture, property, home, handmade, pulsa, lainnya) 
								VALUES ('".$_POST[pert1]."', '".$_POST[pert2]."', '".$_POST[pert3]."', '".$isi4."', '".$_POST[computer]."', '".$_POST[handphone]."', '".$_POST[gadget]."', '".$_POST[game]."', '".$_POST[lcd]."', '".$_POST[camera]."', '".$_POST[fashion]."', '".$_POST[kendaraan]."', '".$_POST[ebook]."', '".$_POST[furniture]."', '".$_POST[property]."', '".$_POST[home]."', '".$_POST[handmade]."', '".$_POST[pulsa]."', '".$lainlagi."')";
		$kui2=mysql_query($kui);
		if($kui2)
		{
			header("location:register2_ref.php?_page=$_GET[_page]&_hal=regis");
		}
	}
	
?>