<section id="testimonial" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="ser-title">see what Clients are saying?</h2>
                <hr class="botm-line">
            </div>
            <?php foreach ($passed_data as $data  ): ?>
            <div class="col-md-4 col-sm-4">
                <div class="testi-details">
                    <p><?=berkaPhp\helpers\String::limit_char($data["description"], 150, '...')?></p>
                </div>
                <div class="testi-info">
                    <h3><?=$data["client_name"]?></h3>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
</section>