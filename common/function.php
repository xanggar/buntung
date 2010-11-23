<?php
if (eregi('function.php', $_SERVER['PHP_SELF']))
{
  header('location:index.php');
  exit;
}

function get_ses($a_param_key)
{
  $a_param_value = isset($_SESSION[$a_param_key])? trim($_SESSION[$a_param_key]) : '';
  return $a_param_value;
}

function get_ses_2d($param_1, $param_2)
{
  $a_param_value = isset($_SESSION[$param_1][$param_2])? trim($_SESSION[$param_1][$param_2]) : '';
  return $a_param_value;
}

function valid_HTML($string, $length = null)
{
  $string = trim($string);
  $string = utf8_decode($string);
  $string = htmlentities($string, ENT_QUOTES);
  $string = str_replace(" ", "&#32", $string);
  $length = intval($length);
  if ($length > 0) {
      $string = substr($string, 0, $length);
  }
  return $string;
}

function val_date_time($ay, $am, $ad, $ah=0, $ai=0, $as=0)
{
  //echo $ay.' '.$am.' '.$ad.' '.$ah.' '.$ai.' '.$as;
  if ($ah != '')
  {
    $ah = intval($ah);
    if ($ah < 0 || $ah > 23)
    {
      echo('a');
      return false;
    }
  }
  else if ($ah != 0)
  {
    echo('e');
    return false;
  }
    
  if ($ai != '')
  {
    $ai = intval($ai);
    if ($ai < 0 || $ai > 59)
    {
      echo('b');
      return false;
    }
  }
  else if ($ai != 0)
  {
    echo('f');
    return false;
  }
  
  if ($as != '')
  {
    $as = intval($as);
    if ($as < 0 || $as > 59)
    {
      echo('c');
      return false;
    }
  }
  else if ($as != 0)
  {
    echo('g');
    return false;
  }
    
  $am = intval($am);
  $ad = intval($ad);
  $as = intval($as);
  if (!checkdate($am, $ad, $ay))
  {
    echo('d');
    return false;
  }

  return true;
}

function val_get($a_param_key, $the_type, $theDefinedValue = '', $theNotDefinedValue = '')
{
  $a_param_value = isset($_GET[$a_param_key])? trim($_GET[$a_param_key]) : '';

  return validate_input($a_param_value, $the_type, $theDefinedValue, $theNotDefinedValue);
}

function val_post($a_param_key, $the_type, $theDefinedValue = '', $theNotDefinedValue = '')
{
  $a_param_value = isset($_POST[$a_param_key])? trim($_POST[$a_param_key]) : '';

  return validate_input($a_param_value, $the_type, $theDefinedValue, $theNotDefinedValue);
}

function validate_input($a_value, $the_type, $theDefinedValue = '', $theNotDefinedValue = '')
{
  $the_type = strtolower(trim($the_type));
  $a_value = trim($a_value);

  if($the_type != 'password')
  {
    $a_value = get_magic_quotes_gpc() ? stripslashes($a_value) : $a_value;

    //$a_value = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($a_value) : mysql_escape_string($a_value);

    switch ($the_type)
    {
      case "text":
        $a_value = ($a_value != "") ? htmlentities($a_value, ENT_QUOTES) : '';
        break;
      case "long":
      case "int":
        $a_value = ($a_value != "") ? intval($a_value) : '';
        break;
      case "double":
        $a_value = ($a_value != "") ? doubleval($a_value) : '';
        break;
			case "float":
        $a_value = ($a_value != "") ? floatval($a_value) : '';
        break;
      case "date":
        $a_value = ($a_value != "") ? $a_value : '';
        break;
      case "defined":
        $a_value = ($a_value != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
    }
  }
  else
  {
    $a_value = str_ireplace('select', '', $a_value);
    $a_value = str_ireplace('from', '', $a_value);
    $a_value = str_ireplace('update', '', $a_value);
    $a_value = str_ireplace('insert', '', $a_value);
    $a_value = str_ireplace('delete', '', $a_value);
  }
  return $a_value;
}

function undo_valid_HTML($string, $length = null)
{
  $string = str_replace("<br />", PHP_EOL, $string);

  return $string;
}

function validateImage($field, &$afile, $tmp_name_image, $type, $typelist, $typestring, $imagesizelist, &$err_message)
{
  $afile=str_replace(" ", "_", $afile);
  $afile=str_replace("-","_", $afile);
  $afile=str_replace("\'","", $afile);
  $afile=str_replace("+","", $afile);
  $afile=str_replace("*","", $afile);
  $afile=str_replace(",","", $afile);
  $afile=str_replace('\"',"", $afile);
  $afile=str_replace("&","", $afile);
  $afile=str_replace("$","", $afile);
  $afile=str_replace("#","", $afile);
  $afile=str_replace("@","", $afile);
  $afile=str_replace("(","", $afile);
  $afile=str_replace(")","", $afile);
  $afile=str_replace("{","", $afile);
  $afile=str_replace("}","", $afile);
  $afile=str_replace("[","", $afile);
  $afile=str_replace("]","", $afile);
  $afile=str_replace(":","", $afile);
  $afile=str_replace(";","", $afile);
  $afile=str_replace("!","", $afile);

  $typematched = FALSE;
  foreach ($typelist as $key => $val)
  {
    if ($type == $val)
    {
      $typematched = TRUE;
      break;
    }
  }
  if (!$typematched)
    $err_message .= 'Maaf, tipe file <b>' . $field . '</b> harus sama dengan: ' . $typestring . '<br>';

  $image_size_ok = false;

  foreach ($imagesizelist as $size_limit)
  {
    if (!isset($size_limit[2]))
      $size_limit[2] = '=';
    else if ($size_limit[2] != '=' && $size_limit[2] != '>=' && $size_limit[2] != '<=')
      $size_limit[2] = '=';

    if ($size_limit[0] != '' && $size_limit[1] != '')
    {
      list ($imgwidth, $imgheight, $imgtype, $imgattr) = getimagesize($tmp_name_image);
      if ($size_limit[2] == '=')
      {
        if (($imgwidth == $size_limit[0]) && ($imgheight == $size_limit[1]))
          $image_size_ok = true;
      }
      else if ($size_limit[2] == '>=')
      {
        if (($imgwidth >= $size_limit[0]) && ($imgheight >= $size_limit[1]))
          $image_size_ok = true;
      }
      else if ($size_limit[2] <= '<=')
      {
        if (($imgwidth <= $size_limit[0]) && ($imgheight <= $size_limit[1]))
          $image_size_ok = true;
      }
    }
    else if ($size_limit[0] != '')
    {
      list ($imgwidth, $imgheight, $imgtype, $imgattr) = getimagesize($tmp_name_image);
      if ($size_limit[2] == '=')
      {
        if ($imgwidth == $size_limit[0])
          $image_size_ok = true;
      }
      else if ($size_limit[2] == '>=')
      {
        if ($imgwidth >= $size_limit[0])
          $image_size_ok = true;
      }
      else if ($size_limit[2] <= '<=')
      {
        if ($imgwidth <= $size_limit[0])
          $image_size_ok = true;
      }
    }
    else if ($size_limit[1] != '')
    {
      list ($imgwidth, $imgheight, $imgtype, $imgattr) = getimagesize($tmp_name_image);
      if ($size_limit[2] == '=')
      {
        if ($imgheight <= $size_limit[1])
          $image_size_ok = true;
      }
      else if ($size_limit[2] == '>=')
      {
        if ($imgheight <= $size_limit[1])
          $image_size_ok = true;
      }
      else if ($size_limit[2] <= '<=')
      {
        if ($imgheight <= $size_limit[1])
          $image_size_ok = true;
      }
    }

    if ($image_size_ok)
      break;
  }

  if (!$image_size_ok)
  {
    $img_size_crit = '';
    foreach ($imagesizelist as $size_limit)
    {
      if ($img_size_crit != '')
        $img_size_crit .= ' or ';

      if ($size_limit[0] != '' && $size_limit[1] != '')
      {
        $img_size_crit .= 'width' . $size_limit[2] . $size_limit[0] .'px height' . $size_limit[2] .$size_limit[1] . 'px';
      }
      else if ($size_limit[0] != '')
      {
        $img_size_crit .= 'width' . $size_limit[2] . $size_limit[0] .'px';
      }
      else if ($size_limit[1] != '')
      {
        $img_size_crit .= 'height' . $size_limit[2] . $size_limit[1] . 'px';
      }
    }
    $img_size_crit = 'Sorry, <b>' . $field . '</b> got to have size:  ' . $img_size_crit . '.<br>';
    $err_message .= $img_size_crit;
  }
}

function ctn_rep($a_str, $a_ctn, $a_raw_tpl)
{
  return str_replace('{@'.$a_str.'}', $a_ctn, $a_raw_tpl);
}

function page_index($pg_nm)
{
  if (isset($_SESSION['page']))
  {
    if ($_SESSION['page'] != $pg_nm)
    {
      unset($_SESSION['pg_set']);
      $_SESSION['page'] = $pg_nm;
    }
  }
  else
  {
    $_SESSION['page'] = $pg_nm;
  }
}


function describe($source, $num_word, $start_from)
{ $text_array=$source;
  return implode(" ", array_slice($text_array, $start_from, $num_word));
  }

//echo $tanggal_update." | ".$limabelas2; 
$cek_waktu_booking="SELECT * FROM booking WHERE status='0'";
$cek_waktu_booking2=mysql_query($cek_waktu_booking);
while($cek_waktu_booking3=mysql_fetch_array($cek_waktu_booking2))
{
	list($a, $b, $c, $d, $e, $f)=split ("[- :]", $cek_waktu_booking3[tanggal]);
	
	$limabelas = mktime($d,$e+15,$f,$b,$c,$a);
	$limabelas2=date("Y-m-d H:i:s", $limabelas);
	//echo $tanggal_update." | ".$limabelas2."<br>";
	if($tanggal_update>$limabelas2)
	{
	 mysql_query("UPDATE booking SET status='11' WHERE id_booking='".$cek_waktu_booking3[id_booking]."'");
	}
	
}

?>