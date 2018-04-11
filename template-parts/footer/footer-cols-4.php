<?php if(is_active_sidebar('footer-sidebar-1')||is_active_sidebar('footer-sidebar-2')||is_active_sidebar('footer-sidebar-3')||is_active_sidebar('footer-sidebar-4') ) : ?>
    <!--  Footer 4-->
    <section id="footer" class="footer">
        <div class="container">

            <div class="row">
                <div class="footer-sidebar-1">
                    <div class="col-md-3 col-sm-6">
                        <?php if(dynamic_sidebar('footer-sidebar-1')); ?>
                    </div><!--col-md -->
                </div> <!--end of footer-sidebar-1-->

                <!--start footer-sidebar-2 widget-->
                <div class="footer-sidebar-2">
                    <div class="col-md-3 col-sm-6">
                        <?php if(dynamic_sidebar('footer-sidebar-2')); ?>
                    </div><!--col-md -->
                </div> <!--end of footer-sidebar-2-->

                <!-- Start footer-sidebar-3 Widget-->
                <div class="footer-sidebar-3">
                    <div class="col-md-3 col-sm-6">
                      <?php if(dynamic_sidebar('footer-sidebar-3')); ?>
                   </div>
                </div> <!--end of footer-sidebar-3-->

                <!-- Start footer-sidebar-4 Widget-->
                <div class="footer-sidebar-4">
                    <div class="col-md-3 col-sm-6">
                      <?php if(dynamic_sidebar('footer-sidebar-4')); ?>
                    </div><!--col-md -->
                </div> <!--end of footer-sidebar-4-->
                
            </div>   <!--end of row-->
        </div>  <!--end of container-->
    </section> <!-- end of footer section-->
<?php endif; ?>

