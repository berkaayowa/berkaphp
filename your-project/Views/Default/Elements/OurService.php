<section id="service" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h2 class="ser-title">Our Service</h2>
                <hr class="botm-line">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris cillum.</p><br>
            </div>
            <?php foreach ($passed_data as $data): ?>
                <div class="col-md-3 col-sm-3 service-info">
                    <div class="icon">
                        <!-- <i class="<?php //$data["icon"]?>"></i> -->
                        <img src="/Views/Customer/Assets/web-site.png" class="img-responsive">
                    </div>
                    <div class="icon-info">
                        <h4><?=$data["title"]?></h4>
                        <p><?=berkaPhp\helpers\Str::limit_char($data["desciption"], 200, '...')?></p>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>

