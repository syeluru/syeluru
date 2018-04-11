<?php if(is_active_sidebar('footer-sidebar-1')||is_active_sidebar('footer-sidebar-2')): ?>
    <!---  Footer  2 -->
    <section id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-sidebar-1">
                    <div class="col-lg-8 col-md-6 col-sm-7 col-xs-12 center-widget ">
                        <?php if(dynamic_sidebar('footer-sidebar-1')); ?>
                    </div><!--col-md -->
                </div> <!--end of footer-1-->

                <!--start footer-sidebar-2 widget-->
                <div class="footer-sidebar-2">
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                       <?php if(dynamic_sidebar('footer-sidebar-2')); ?>
                    </div><!--col-md -->
                </div> <!--end of footer-sidebar-2-->
            </div>   <!--end of row-->
        </div>  <!--end of container-->
    </section> <!-- end of footer section-->
<?php endif; ?>
