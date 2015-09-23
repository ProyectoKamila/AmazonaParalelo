<html>
    <script>
        $(document).ready(function() {
            $('#colorfondo').change(function() {
                $('.color-fondo').css('background-color', $('#colorfondo').val());
                $('.footer-about').css('background-color', $('#colorfondo').val());
            });
            $('#letra-fondo').change(function() {
                $('*').css('color', $('#letrafondo').val());
            });
            $('#color1').change(function() {
                $('.color1').css('background-color', $('#color1').val());
            });
            $('#letra1').change(function() {
                $('.color1').css('color', $('#letra1').val());
            });
            $('#color2').change(function() {
                $('.color2').css('background-color', $('#color2').val());
            });
            $('#letra2').change(function() {
                $('.color2').css('color', $('#letra2').val());
            });
            $('#color3').change(function() {
                $('.color3').css('background-color', $('#color3').val());
                $('.button').css('background-color', $('#color3').val());
            });
            $('#letra3').change(function() {
                $('.color3').css('color', $('#letra3').val());
                $('.button').css('color', $('#letra3').val());
            });
            $('#color4').change(function() {
                $('.checkout-heading').css('background-color', $('#color4').val());
                $('#cart').css('background-color', $('#color4').val());
            });
            $('#letra4').change(function() {
                $('..checkout-heading').css('color', $('#letra4').val());
                $('#cart').css('color', $('#letra4').val());
                $('.heading a #cart-total').css('color', $('#letra4').val());
            });
<? if (isset($config->color1)) { ?>
                $('#colorfondo').val("<?= $config->colorfondo ?>");
                $('#letrafondo').val("<?= $config->letrafondo ?>");
                $('#color1').val("<?= $config->color1 ?>");
                $('#letra1').val("<?= $config->letra1 ?>");
                $('#color2').val("<?= $config->color2 ?>");
                $('#letra2').val("<?= $config->letra2 ?>");
                $('#color3').val("<?= $config->color3 ?>");
                $('#letra3').val("<?= $config->letra3 ?>");
                $('#color4').val("<?= $config->color4 ?>");
                $('#letra4').val("<?= $config->letra4 ?>");
<? } else { ?>

                $('#colorfondo').val("#FFFFFF");
                $('#letrafondo').val("#000000");
                $('#color1').val("#000000");
                $('#letra1').val("#FFFFFF");
                $('#color2').val("#FFAA31");
                $('#letra2').val("#FFFFFF");
                $('#color3').val("#6CBE42");
                $('#letra3').val("#FFFFFF");
                $('#color4').val("#58BAE9");
                $('#letra4').val('#FFFFFF');
<? } ?>
        });
        function estandar() {
            $('#colorfondo').val("#FFFFFF");
            $('#letrafondo').val("#000000");
            $('#color1').val("#000000");
            $('#letra1').val("#FFFFFF");
            $('#color2').val("#FFAA31");
            $('#letra2').val("#FFFFFF");
            $('#color3').val("#6CBE42");
            $('#letra3').val("#FFFFFF");
            $('#color4').val("#58BAE9");
            $('#letra4').val('#FFFFFF');
            cambiarcolor();
        }
        function cambiarcolor() {
            $('.color-fondo').css('background-color', $('#colorfondo').val());
            $('.footer-about').css('background-color', $('#colorfondo').val());
//            $('*').css('color', $('#letrafondo').val());
            $('.color1').css('background-color', $('#color1').val());
            $('.color1').css('color', $('#letra1').val());
            $('.color2').css('background-color', $('#color2').val());
            $('.color2').css('color', $('#letra2').val());
            $('.color3').css('background-color', $('#color3').val());
            $('.button').css('background-color', $('#color3').val());
            $('.color3').css('color', $('#letra3').val());
            $('.button').css('color', $('#letra3').val());
            $('.checkout-heading').css('background-color', $('#color4').val());
            $('#cart').css('background-color', $('#color4').val());
            $('..checkout-heading').css('color', $('#letra4').val());
            $('#cart').css('color', $('#letra4').val());
            $('.heading a #cart-total').css('color', $('#letra4').val());
        }
    </script>
    <head>
        <title>Configuracion de app</title>
    </head>
    <body>
        <? if (!$tokken) { ?>
            <div class="login">
                <h1>Configurar Tienda</h1>
                <form action="./configapp" method="POST">
                    <p>
                        <label>Correo:</label>
                        <input type="email" name="email">
                    </p>
                    <p>
                        <label>Clave:</label>
                        <input type="password" name="password">
                    </p>
                    <p>
                        <label>TokkenApp:</label>
                        <input type="text" name="tokkenapp">
                    </p>
                    <? if (isset($mensaje)) { ?>
                        <p>
                            <label><?= $mensaje ?></label>
                        </p>
                    <? } ?>
                    <p>
                        <input type="submit" value="enviar">
                    </p>
                </form>
            </div>
        <? } else { ?>
            <div class="colores">
                <h1>Configurar Colores</h1>
                <form action="./configapp" method="POST">
                    <? if (isset($_GET['edt'])) { ?>
                        <p>
                            <label>Tokken: </label>
                            <input type="text" name="tokkenapp" value="<?= $tokken ?>" required="">
                        </p>
                    <? } else { ?>
                        <!--<input type="hidden" name="tokkenapp" value="<?= $tokken ?>">-->
                    <? } ?>
                    <p>
                        <label>Principal: </label>
                        Fondo <input type="color" name="colorfondo" id="colorfondo">
                        <!--Letra--> 
                        <input type="hidden" name="letrafondo" id="letrafondo">
                    </p>
                    <p>
                        <label>Area 1: </label>
                        Fondo <input type="color" name="color1" id="color1">
                        Letra <input type="color" name="letra1" id="letra1">
                    </p>
                    <p>
                        <label>Area 2:</label>
                        Fondo <input type="color" name="color2" id="color2">
                        Letra <input type="color" name="letra2" id="letra2">
                    </p>
                    <p>
                        <label>Area 3:</label>
                        Fondo <input type="color" name="color3" id="color3">
                        Letra <input type="color" name="letra3" id="letra3">
                    </p>
                    <p>
                        <label>Area 4:</label>
                        Fondo <input type="color" name="color4" id="color4">
                        Letra <input type="color" name="letra4" id="letra4">
                    </p>

                    <? if (isset($mensaje)) { ?>
                        <p>
                            <label><?= $mensaje ?></label>
                        </p>
                    <? } ?>
                    <p>
                        <a onclick="estandar()">Colores por Defecto</a>
                    </p>
                    <p>
                        <input class="button" type="submit" value="Guardar">
                    </p>
                </form>
            </div>
        <? } ?>
    </body>

</html>