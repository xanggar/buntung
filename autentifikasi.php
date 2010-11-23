<?php
session_name("AUTHENUSER");
session_start();

function authen()
{ include "common/config.php";
  global $USERNAME, $SES_PASSWORD, $SES_NAMA; 
  if (($USERNAME!="")&&($SES_PASSWORD!=""))
  { $sql_="SELECT password FROM member WHERE username='$USERNAME'";
		$res_=mysql_query($sql_);
		if (!$res_)
		{ return FALSE;
			mysql_close();
			}
		else
		{ if (mysql_num_rows($res_)<1)
			{ return FALSE;
				$USERNAME="";
				$SES_PASSWORD="";
				mysql_close();
				}
			else
			{ $row_=mysql_fetch_array($res_);
				if ($SES_PASSWORD!=$row_[password])
				{ return FALSE;
					$USERNAME="";
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