<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto 2: Shop</title>
    <link rel='stylesheet' type='text/css' href='<?=dir_url?>/assets/css/styles.css' />
    <link rel='stylesheet' type='text/css' href='<?=dir_url?>/assets/css/table.css' />
</head>

<body>
    <div id="container">

        <!-- Header -->
        <header id="header">
            <div id="logo">
                <img src="<?=dir_url?>assets/img/terminal_logo.png" alt="terminal Logo" />
                <a href="/product/index">Shop</a>
            </div>
        </header>
        <!-- NavMenu -->
        <nav id="menu">
            <ul>
                <li><a href="/">Inicio</a></li>
                <?php  
                    $categories = Utils::categoryMenu();
                ?>
                <?php if($categories->num_rows > 1): ?>
                    <?php while($category = $categories->fetch_object()): ?>
                        <li><a href="/product/category&category_id=<?=$category->id?>"><?=$category->name?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?> 
            </ul>
        </nav>
        <!-- Content/Main -->
        <div id="main">