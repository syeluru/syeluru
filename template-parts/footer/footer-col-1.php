<?php if(is_active_sidebar('footer-sidebar-1')): ?>
    <!-- Footer 1-->
    <section id="footer" class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-sidebar-1">
                    <div class="col-lg-12 center-widget">
                        <?php if(dynamic_sidebar('footer-sidebar-1')); ?>
                    </div><!--col-lg -->
                </div> <!--end of footer-1-->
            </div>   <!--end of row-->
        </div>  <!--end of container-->
    </section> <!-- end of footer section-->
<?php endif; ?>

 