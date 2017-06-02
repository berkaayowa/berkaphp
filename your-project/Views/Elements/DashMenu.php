<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <?= \berkaPhp\helpers\Html::link("Dashboard",['href'=>'/'], 'fa fa-home fa-fw') ?>
        </li>
        <li>
            <?= \berkaPhp\helpers\Html::link("menu",['href'=>'/'], 'fa fa-th-list') ?>
        </li>

        <li>
            <hr class="botm-line">
        </li>
        <li>
            <?= \berkaPhp\helpers\Html::link("menu",['href'=>'/'], 'fa fa-fw fa-edit') ?>
        </li>

        <li>
            <hr class="botm-line">
        </li>
        <li>
            <?= \berkaPhp\helpers\Html::link("menu",['href'=>'/'], 'fa fa-fw fa-file') ?>
        </li>
    </ul>
</div>