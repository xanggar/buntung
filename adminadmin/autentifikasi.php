<?php

session_name("AUTHENUSER");
session_start();

function authen()
{
  include "../common/config.php";
  if (isset($_SESSION['SES_USERNAME']) && isset($_SESSION['SES_PASSWORD']))
  {
    if (($_SESSION['SES_USERNAME']!="")&&($_SESSION['SES_PASSWORD']!=""))
	  {
	    $sql_="SELECT * FROM admin WHERE user_id='".$_SESSION['SES_USERNAME']."' AND status='2'";
      $res_=mysql_query($sql_);
      if (!$res_)
      {
        return FALSE;
      }
      else
      {
        if (mysql_num_rows($res_)<1)
        {
          return FALSE;
          $_SESSION['SES_USERNAME']="";
          $_SESSION['SES_PASSWORD']="";
        }
        else
        {
          $row_=mysql_fetch_array($res_);
          if ($_SESSION['SES_PASSWORD']!=$row_['password'])
          {
            return FALSE;
            $_SESSION['SES_USERNAME']="";
            $_SESSION['SES_PASSWORD']="";
          }
          else
          {
            $_username=$_SESSION['SES_USERNAME'];
            return TRUE;
          }
        }
      }
    }
    else
    {
      return FALSE;
    }
  }
}
?>