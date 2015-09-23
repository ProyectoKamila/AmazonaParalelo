<? // debug($this->user->information);      ?>
<div id="content">  
    <? if (isset($mensaje)) { ?>
        <div class="warning"><?= $mensaje ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } if (isset($msj)) { ?>
        <div class="success"><?= $msj ?><img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>
    <? } ?>
    <div class="breadcrumb">
        <a href="./">Inicio</a>
        » <a href="./contacto">Contacto</a>
    </div>
    <h1><?= $appdata['nombre2'] ?></h1>
    <div class="login-content">
        <div class="left">
            <h2>Contactanos</h2>
            <div class="content">
                <form action="" method="POST">
                    <b>Nombre y Apellido</b>
                    <br>
                    <input type="text" name="nombre" placeholder=" | Nombre y Apellido" value="<?
                    if ($this->user->conect) {
                        echo $this->user->information->name . ' ' . $this->user->information->last_name;
                    }
                    ?>">
                    <br>
                    <br>
                    <b>E-mail</b>
                    <br>
                    <input type="email" name="email" placeholder=" | Correo Electronico" value="<?
                    if ($this->user->conect) {
                        echo $this->user->information->email;
                    }
                    ?>">
                    <br>
                    <br>
                    <b>Asunto</b>
                    <br>
                    <input type="text" name="asunto" placeholder=" | Asunto" value="" required="">
                    <br>
                    <br>
                    <b>Mensaje</b>
                    <br>
                    <textarea name="texto" placeholder=" | Mensaje" style="width: 443px;height: 160px;" required=""></textarea>
                    <br>
                    <br>
                    <input type="submit" value="Enviar" class="button">
                </form>
            </div>
        </div>
    </div>
</div>
