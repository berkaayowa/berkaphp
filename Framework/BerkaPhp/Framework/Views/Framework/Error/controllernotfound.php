<div class="console " role="alert">
    <div class="heading">
        <span data-close-message class="glyphicon glyphicon-remove-circle pull-right close-message" aria-hidden="true"></span>
    </div>
    <span id="message">
        <?php
            BerkaPhp\Helper\Debug::PrintOut($params);
        ?>
    </span>
</div>