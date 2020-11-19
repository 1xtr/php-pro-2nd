<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=mb_strtoupper($template)?>Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<ul class="nav">
    <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
    <li class="nav-item"><a href="/catalog/" class="nav-link">Каталог</a></li>
    <li class="nav-item"><a href="/profile/" class="nav-link">Профиль</a></li>
    <?php if (isset($_SESSION['user_id']) AND isAdmin($_SESSION['user_id'])) :  ?>
    <li class="nav-item"><a href="/dev/" class="nav-link">Админка</a></li>
    <?php endif; ?>
    <li class="nav-item"><a href="/cart/" class="nav-link">Корзина
            <?php if ($_SESSION['cart']) : ?>
            <span class="badge badge-success"><?=array_sum($_SESSION['cart'])?></span>
            <?php endif; ?></a>
    </li>
    <?php if (!empty($_SESSION['user_id'])) : ?>
    <li class="nav-item"><a href="/orders/" class="nav-link">Заказы</a></li>
    <li class="nav-item"><a href="/auth/index.php?action=logout" class="nav-link">Logout</a></li>
    <?php else: ?>
    <li class="nav-item"><a href="/auth/index.php" class="nav-link">Login</a></li>
    <li class="nav-item"><a href="/auth/reg.php" class="nav-link">Registration</a></li>
    <?php endif; ?>
</ul>
<?=$content?>
</body>
</html>