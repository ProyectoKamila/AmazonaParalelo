<table style="width: 100%;">
    <thead style="font-weight: bold;">
        <tr>
            <td class="image">Imagen</td>
            <td class="name">Nombre</td>
            <td class="quantity">Cantidad</td>
        </tr>
    </thead>
    <tbody>
        <? foreach ($pedido as $pp){ ?>
        <tr class="cupon-pktweet848">
            <td class="image">
                <a href="./producto/cupon-pktweet848">
                    <img style="max-height: 47px; max-width: 47px;" src="https://www.pkclick.com/imagenescarrito/small/<?= $pp['imagen'] ?>" alt="<?= $pp['nombre'] ?>" title="<?= $pp['nombre'] ?>">
                </a>
            </td>
            <td class="name">
                <a href="./producto/<?= $pp['slug'] ?>"><?= $pp['nombre'] ?></a>
                <div>
                </div>
                <!--<small>Reward Points: 600</small>-->
            </td>
            <td class="quantity"><?= $pp['pedido'] ?></td>
        </tr>
        <? } ?>
    </tbody>
</table>