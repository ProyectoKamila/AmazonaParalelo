<div id="content">  <div class="breadcrumb">
        <a href="./">Inicio</a>
        » <a href="./login">Login</a>
    </div>
    <h1>PkAccount Login</h1>
    <div class="login-content">
        <div class="left">
            <h2>Nuevo Cliente</h2>
            <div class="content">
                <p><b>Registrate en  PkAccount</b></p>
                <p>Al crear una cuenta podrá realizar sus compras rapidamente, revisar el estado de un pedido, y realizar un seguimiento de las órdenes de sus operaciones anteriores.</p>
                <a href="http://pkaccount.com/p/add.php?url=<?= $appdata['url'] ?>" class="button">Continuar</a></div>
        </div>
        <div class="right">
            <h2>Usuario Registrado</h2>
            <form action="http://pkaccount.com/p/login.php" method="post" enctype="multipart/form-data">
                <div class="content">
                    <p>Iniciar Sesión</p>
                    <b>Correo Electronico:</b><br>
                    <input type="hidden" name="url" value="<?= $appdata['url'] ?>">
                    <input type="email" name="user" placeholder=" | Correo Electronico" value="">
                    <br>
                    <br>
                    <b>Contraseña:</b><br>
                    <input type="password" name="pass" placeholder=" | Contraseña" value="">
                    <br>
                    <a href="http://pkaccount.com/p/lostpass.php?url=<?= $appdata['url'] ?>">¿Olvido Contrase&ntilde;a?</a><br>
                    <br>
                    <input type="submit" value="Iniciar" class="button">
                </div>
            </form>
        </div>
    </div>
</div>
