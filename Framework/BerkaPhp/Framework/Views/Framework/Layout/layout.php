<!DOCTYPE html>
<html lang="en">
<head>

    <?= $metaData ?>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="-1" />
    <meta name="robots" content="all">

    <link rel="stylesheet" href="/Views/Client/Layout/css/bootstrap.min.css">
    <link rel="stylesheet" href="/BerkaPhp/Framework/Views/Framework/Layout/css/style.css">
    <title><?= ucfirst($title) ?></title>
</head>
<body>
<div class="container">
    <br/>
    <nav class="navbar navbar-default">
        <div class="container-fluid nav-bg">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">BerkaPhp Framework</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand active" href="/framework/page/">
                    BerkaPhp
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="/framework/page/setup">How To Setup</a></li>
                    <li><a href="/framework/page/controller">Controller</a></li>
                    <li><a href="/framework/page/action">Action</a></li>
                    <li><a href="/framework/page/view">View</a></li>
                    <li><a href="/framework/page/layout">Layout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br/>
    {content}
</div>
</body>
</html>






