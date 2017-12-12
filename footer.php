



<footer class="spacer">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h4>Hulton Hotels</h4>
                    <p>Hulton Hotels strives to deliver its tried and true credo of comfort. The tireless staff works around the clock to insure every customer barely tolerates the overnight stay. Overcharging for mediocre breakfast and barely functional services allows us to improve what matters most: our bottom line. From the passive-aggressive receptionists, to the underpaid basement monkeys that coded this website, to the cockroaches living underneath that never washed bed (because we don't hire cleaning staff), every member of the Hulton family knows: Hulton is Home. Pls give us 100%</p>
                </div>              
                 
                 <div class="col-sm-3">
                    <h4>Quick Links</h4>                     
                       
                       
                       <?php 

					 if ($loginst == 1){ ?>
                       <ul class="list-unstyled">
                        <li><a href="rooms.php">Rooms</a></li>        
                        <li><a href="introduction.php">Introduction</a></li>
                        <li><a href="review.php">Reviews</a></li>
                        <li><a href="dashboard.php">User Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                    <?php } else { ?>
                    <ul class="list-unstyled">
                        <li><a href="rooms.php">Rooms</a></li>        
                        <li><a href="introduction.php">Introduction</a></li>
                        <li><a href="review.php">Reviews</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                    <?php } ?>
                </div>
                 <div class="col-sm-4 subscribe">
                    <h4>Subscription</h4>
                    <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter email id here">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Get Notified</button>
                    </span>
                    </div>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container-->    
    
    <!--/.footer-bottom--> 
</footer>

<div class="text-center copyright">Powered by <a href="http://thebootstrapthemes.com">thebootstrapthemes.com</a></div>

<a href="#home" class="toTop scroll"><i class="fa fa-angle-up"></i></a>




<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>





<script src="assets/jquery.js"></script>

<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>

<!-- uniform -->
<script src="assets/uniform/js/jquery.uniform.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>

<!-- jquery mobile -->
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>


<!-- custom script -->
<script src="assets/script.js"></script>










</body>
</html>





