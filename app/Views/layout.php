<!DOCTYPE html>
<html lang="es">

<head>
    <?php require_once('inc/shared/head.php') ?>
</head>

<body>
    <?php require_once('inc/shared/header.php') ?>
    <?php if ($user && isset($user['logged_in'])) : ?>
        <?php require_once('inc/shared/cart.php') ?>
    <?php endif; ?>
    <?= $this->renderSection('content') ?>
    <?php require_once('inc/shared/footer.php') ?>

    <?php require_once('inc/shared/scripts.php') ?>
</body>

</html>