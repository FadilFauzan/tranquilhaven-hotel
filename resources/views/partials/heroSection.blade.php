<section class="site-hero overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('<?php echo $backgroundImage; ?>');">
    <div class="container">
        <div class="row align-items-center site-hero-inner justify-content-center">
            <div class="col-md-12 text-center">
                <div class="mb-5 element-animate">
                    <h1><?php echo $heroTitle; ?></h1>
                    <p><?php echo $description; ?></p>
                    <?php if ($showButton): ?>
                    <p><a href="{{ route("rooms") }}" class="btn btn-primary">Book Now</a></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
