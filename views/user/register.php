<!-- Section -->
<section id="section" class="login_block">
<h2>Registro</h2>

<!-- <form action="base_url/user/save" method="POST"> -->
<!-- <form action="base_urlcontroller=user&action=save" method="POST"> -->
<!-- <form action="index.php?#$url_direction" method="POST"> -->
<?php if( isset($_SESSION['register']) && $_SESSION['register'] == 'complete' ): ?>
        <strong class="alert alert-green">¡Registro completado con éxito!</strong>
<?php elseif( isset($_SESSION['register']) && $_SESSION['register'] == 'failed' ): ?>
        <strong class="alert alert-red">Algo pasó, ¡vuelve a intentar de nuevo, por favor!</strong>
<?php endif; ?>
<?php Utils::deleteSession('register'); ?>
<form action="/user/save" method="POST">
    <label for="name">Nombre:</label>
    <input type="text" name="name" id="name" required />
    
    <label for="surname">Apellidos:</label>
    <input type="text" name="surname" id="surname" required />

    <label for="email">Correo:</label>
    <input type="email" name="email" id="email" required />

    <label for="pwd">Contraseña</label>
    <input type="password" name="pwd" id="pwd" required />

    <input type="submit" value="Registrar"  />
</form>
<!-- Section -->
</section>