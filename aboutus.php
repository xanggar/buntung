<?php
 include "common/top2.php";
?>

      <!-- Sub Page Title Starts here-->
                  <h1>About Us </h1>
                  <p>Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. </p>
                  <!-- Sub Page Title End here-->
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
																								<?php
																								$about=mysql_fetch_array(mysql_query("SELECT * FROM about_us"));
																								?>
																		
                        <h2>About <?php echo $namaweb; ?></h2>
                        <p><?php echo $about[about_us]; ?></p>
                  </div>
                  <div class="text">
                        <h2>More <span>About</span></h2>
                        <p><?php echo $about[more_about]; ?><br />
                        </p>
                        <blockquote>
                              <p><br />
                                <?php echo $about[quote]; ?><br />
                              </p><br />
                        </blockquote>
                       </div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
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
