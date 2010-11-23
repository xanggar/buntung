<?php
session_name("AUTHENUSER");
session_start();

function authen()
{ include "common/config.php";
  global $SES_USERNAME, $SES_PASSWORD, $SES_NAMA, $SES_PRODUCTINCART, $SES_PRODUCTQTY, $SES_IDID; 
  if (($SES_USERNAME!="")&&($SES_PASSWORD!=""))
  { $sql_="SELECT password FROM member WHERE username='$SES_USERNAME'";
		$res_=mysql_query($sql_);
		if (!$res_)
		{ return FALSE;
			mysql_close();
			}
		else
		{ if (mysql_num_rows($res_)<1)
			{ return FALSE;
				$SES_USERNAME="";
				$SES_PASSWORD="";
				mysql_close();
				}
			else
			{ $row_=mysql_fetch_array($res_);
				if ($SES_PASSWORD!=$row_[password])
				{ return FALSE;
					$SES_USERNAME="";
					$SES_PASSWORD="";
					mysql_close();
					}
				else
				{ return TRUE;
					mysql_close();
					} 
				}
			}
		}
		else
		{ return FALSE;
			mysql_close();
			}  
		}

?>