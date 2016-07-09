<!DOCTYPE html>
<html>
<head>
    <title>
    <?php if(isset($title)): echo $this->escape($title) . ' - '; endif; ?>Mini Blog
    </title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<div id="header">
    <h1><a href="<?php echo $base_url; ?>">Mini Blog</a></h1>
</div>

<div1nav>
    <p>
        <?php if ($session->isAuthenticated()): ?>
            <a href="<?php echo $base_url; ?>/">ホーム</a>
            <a href="<?php echo $base_url; ?>/account">アカウント</a>
        <?php else: ?>
            <a href="<?php echo $base_url; ?>/account/signin">ログイン</a>
            <a href="<?php echo $base_url; ?>/account/signup">アカウント登録</a>
        <?php endif ?>
    </p>
</div1nav>

<div id="main">
    <?php echo $_content; ?>
</div>
</body>
</html>