    <!-- Header Start -->
    <div class="container-fluid bg-primary py-3 mb-5 page-header">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown"><?php echo $pagename; ?></h1>
                    <?php if (in_array($pagename, array("Kutyák", "Macskák"))) { ?>
                        <h5 class="whitetext"><i>A képre kattintva, bejelentkezés után lehetséges az időpontfoglalás</i></h5>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->