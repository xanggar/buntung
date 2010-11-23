<?php
 include "common/top2.php";
?>

      <!-- Sub Page Title Starts here-->
                  <h1>Welcome to Buntung.com</h1>
                  <p>Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. </p>                  <!-- Sub Page Title End here-->
            </div>
												
<?php
 include "common/search.php";
?>
</div>
</div>
<div class="clear">&nbsp;</div>
<div class="content cbg">
      <div class="container_16 linebg">
            <!--left part of text follows here-->
            <div class="grid_11 para sepline">
                  <div class="text">
																		      <h2>Welcome to <span>Buntung.com</span></h2>
																								<?php
																								$about=mysql_fetch_array(mysql_query("SELECT * FROM welcome WHERE id='1'"));
																								?>
																		
                        <p><?php echo $about[ket]; ?></p>
                  </div>
                  <div class="text">
                  </div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
            </div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
