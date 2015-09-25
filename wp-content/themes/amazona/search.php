<?php get_header(); 
$varsearch = $_GET['s'];
?>
<div id="home-productos">
    <div class="container">
        <div class="row">
            <?php if($post != null){ ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-divisor" style="background: none;">
                
                <?php 
                echo 'Resultados de la b&uacute;squeda';
                
            
            ?>
            </div>
            <div class="clearfix"></div>
            <?php
            
//            query_posts(array('post_type' => 'product', 'exclude' => 'destacados'));
            ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 home-producto">
                <ul id="foo2">

                    <?php
                    while (have_posts()) {
                        the_post();
                        ?>
                        <li >
                            <?php $categoria = get_the_category_wc($post->ID); ?>
                                    <?php foreach ($categoria as $category) { ?>
                                    <?php } ?>
                            <a href="<?=  $category->slug;?>">
                                <div class="origami-categoria">
                                    
                                    <h1><?= $category->name; ?></h1>
                                </div>
                            </a>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 ">
                                <div class="producto">
                                    <a href="<?php the_permalink(); ?>">    <div class="producto-imagen">
                                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" alt="<?php the_title(); ?>"/>
                                        </div>
                                    </a>
                                    <p><?php the_title(); ?> - <strong><?php echo select_divisa('Bs.', $product->get_price()); ?></strong></p>
                                    <a href="<?php the_permalink(); ?>"><div class="producto-precio"></div></a>
                                    <div class="producto-wishlist"></div>
                                </div>
                            </div>
                        </li>
                    <?php } ?>

                </ul>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 title-marca">
                <h2><?= $ex->titulo; ?></h2>
            </div>
        </div>
    </div>
</div>
<?php
}else{
    ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-divisor" style="background: none;">
    <?php
                echo '¿No encuentras lo que buscas? Puedes pedirlo, te lo traemos!';
                ?>
</div>
<div class="clearfix"></div>
 <div class="col-xs-12">
     <?php
    if(isset($_POST["enviar-pedido"])){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $telefono = $_POST["telefono"];
        $cantidad = $_POST["cantidad"];
        $url = $_POST["url-enviar"];
          if (!empty($_POST['email']) && !empty($_POST['url-enviar'])) {
                            require_once ABSPATH . WPINC . '/class-phpmailer.php';
                            $mail = new PHPMailer();

                            $mail->AddAddress('ventas@proyectokamila.com');
                            $mail->From = 'ventas@proyectokamila.com';
                            $mail->FromName = 'Solicitud de Pedido de producto';
                            $asunto = 'Solicitud de Pedido de producto';
                            $contenido = '<div style="font-color: #000;">';
                            $contenido .= '<h2>Solicitud de Pedido de producto</h2>';
                            $contenido .= '<p>Enviado el ' . date("d/m/Y") . '</p>';
                            $contenido .= '<hr />';
                            $contenido .= '<p><strong>Nombre: </strong>' . $_POST['nombre'] . ' ' . $_POST['apellido'] .'</p>';
                            $contenido .= '<p><strong>Email: </strong>' . $_POST['email'] . '</p>';
                            $contenido .= '<p><strong>Telefono: </strong>' . $_POST['telefono'] . '</p>';
                            $contenido .= '<p><strong>Cantidad: </strong>' . $_POST['cantidad'] . '</p>';
                            $contenido .= '<p><strong>Url del producto: </strong>' . $_POST['url-enviar'] . '</p>';
                            $contenido .= '<hr />';
                            $contenido .= '</div>';

                            $mail->Subject = $asunto;
                            $mail->Body = $contenido;
                            $mail->IsHTML();

                //      add_filter('wp_mail_content_type', create_function('', 'return "text/html";'));
                //      $mail = wp_mail($correo, $asunto, $contenido, $headers);

                        if ($mail->send()) {
                         echo "<div class='alert alert-success'>";
                            echo "<p> ";
                              echo "Procesaremos tu solicitud si quieres ver el detalle del producto <a href='".$url. "'>Detalle producto </a>";
                            echo "</p> ";
                        echo "</div>";
                        } else {
                             echo "<div class='alert alert-danger'>";
                            echo "<p> ";
                              echo "Lo sentimos no hemos podido procesar tu solicitud, intentalo de nuevo.";
                            echo "</p> ";
                        echo "</div>";
                        }
                    }
        
        //debug("predio");
    }
    ?>
<form action="">
   
        

        <?php
   //     echo $varsearch;
/**
 * For a running Search Demo see: http://amazonecs.pixel-web.org
 

if ("cli" !== PHP_SAPI)
{
    echo "<pre>";
}
*/



defined('AWS_API_KEY') or define('AWS_API_KEY', 'AKIAI2RVP3ZFVGL32XUQ');
defined('AWS_API_SECRET_KEY') or define('AWS_API_SECRET_KEY', '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');
defined('AWS_ASSOCIATE_TAG') or define('AWS_ASSOCIATE_TAG', 'proyectokamil-20');
$base =  get_bloginfo("template_url");
require  "./lib/AmazonECS.class.php";
try
{
    // get a new object with your API Key and secret key. Lang is optional.
    // if you leave lang blank it will be US.
    $amazonEcs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'de', AWS_ASSOCIATE_TAG);

    // If you are at min version 1.3.3 you can enable the requestdelay.
    // This is usefull to get rid of the api requestlimit.
    // It depends on your current associate status and it is disabled by default.
    // $amazonEcs->requestDelay(true);

    // for the new version of the wsdl its required to provide a associate Tag
    // @see https://affiliate-program.amazon.com/gp/advertising/api/detail/api-changes.html?ie=UTF8&pf_rd_t=501&ref_=amb_link_83957571_2&pf_rd_m=ATVPDKIKX0DER&pf_rd_p=&pf_rd_s=assoc-center-1&pf_rd_r=&pf_rd_i=assoc-api-detail-2-v2
    // you can set it with the setter function or as the fourth paramameter of ther constructor above
    $amazonEcs->associateTag(AWS_ASSOCIATE_TAG);

    // changing the category to DVD and the response to only images and looking for some matrix stuff.
   /// $response = $amazonEcs->category('DVD')->responseGroup('Large')->search("Matrix Revolutions");
    //var_dump($response);

    // from now on you want to have pure arrays as response
    $amazonEcs->returnType(AmazonECS::RETURN_TYPE_ARRAY);

    // // searching again
    // $response = $amazonEcs->search('Bud Spencer');
    // //var_dump($response);

    // // and again... Changing the responsegroup and category before
    // $response = $amazonEcs->responseGroup('Small')->category('Books')->search('PHP 5');
    // //var_dump($response);

    // // category has been set so lets have a look for another book
    // $response = $amazonEcs->search('MySql');
    // //var_dump($response);

    // // want to look in the US Database? No Problem
    // $response = $amazonEcs->country('com')->search('MySql');
    // //var_dump($response);

    // // or Japan?
    // $response = $amazonEcs->country('co.jp')->search('MySql');
    //var_dump($response);

   // Back to DE and looking for some Music !! Warning "Large" produces a lot of Response
   $response = $amazonEcs->country('com')->category('All')->responseGroup('ItemAttributes,Images')->page(1)->search($varsearch);
      // var_dump($response['Items']['Item']);
 
   // Or doing searchs in a loop
   //for ($i = 1; $i < 4; $i++)
   //{
     //$response = $amazonEcs->search('Matrix ' . $i);
     //var_dump($response);
   //}

   // Want to have more Repsonsegroups?                         And Maybe you want to start with resultpage 2?
 //  $response = $amazonEcs->responseGroup('Small,Images')->optionalParameters(array('ItemPage' => 2))->search('Bruce Willis');
   //var_dump($response);

   // With version 1.2 you can use the page function to set up the page of the resultset
   //$response = $amazonEcs->responseGroup('Small,Images')->page(3)->search('Bruce Willis');
   //var_dump($response);
   ?>
   <div class="row">
       
       <?php
       if(empty($response['Items']['Item'])){
           echo "<p>No se encontraron resultados en amazon.com</p>";
       }else{
       ?>
       
       <?php $xs=0;?>
       <?php foreach($response['Items']['Item'] as $p){ ?>
       
      <div class="col-sm-6 col-md-3">
          <?php //debug($p['ItemAttributes']['ListPrice']['FormattedPrice'], false); ?>
    <div class="thumbnail">
      <img  id="thum<?php echo $xs;?>"src="<?php echo $p['MediumImage']['URL'];?>" alt="..." style="height:120px;">
      <div class="caption">
        <h3 style="font-size:12px;"><?php echo max_charlength($p['ItemAttributes']['Title'], 70) ; ?><?php echo max_charlength($p['ItemAttributes']['Price'], 80) ; ?></h3>
        <p><?php  $p['ItemAttributes']['ListPrice']['FormattedPrice']; ?></p>
        <p><?php search_precio($p['ItemAttributes']['ListPrice']['Amount']); ?></p>
        <p><a  id="<?php echo $xs;?>" class="btn btn-default " onclick="solicitar(id);" role="button">Solicitar Producto</a></p>
        <input type="hidden" id="url-producto-<?php echo $xs;?>" value="<?php echo $p['DetailPageURL'] ; ?>"/>
      </div>
    </div>
  </div>
  <?php $xs++;?>
  <?php } ?>
  <?php } ?>
    </div>
   
   </form>
</div>
<div class="solicitar-producto">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <form name="solicitud-pedido" method="POST">
                    <p>Por favor completa todos los campos.</p>
                   <div class="input-group input-group-lg">
                       <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user"></i></span>
                      <input name="nombre" type="text" class="form-control" placeholder="Nombre" aria-describedby="sizing-addon1" required>
                    </div>
                    </br>
                    <div class="input-group input-group-lg">
                    <!--<div class="g-recaptcha" data-sitekey="6LcSfQ0TAAAAAM54GerRQiYCYBPPMeAT1ZKUhf3M"></div>-->
                     <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope"></i></span>
                      <input name="email" type="email" class="form-control" placeholder="Email" aria-describedby="sizing-addon1" required>
                    </div>
                    </br>
                    <div class="input-group input-group-lg">
                    <!--<div class="g-recaptcha" data-sitekey="6LcSfQ0TAAAAAM54GerRQiYCYBPPMeAT1ZKUhf3M"></div>-->
                     <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone-square"></i></span>
                      <input name="telefono"type="text" class="form-control" placeholder="Telefono" aria-describedby="sizing-addon1" required>
                    </div>
                    </br>
                    <div class="input-group input-group-lg">
                    <!--<div class="g-recaptcha" data-sitekey="6LcSfQ0TAAAAAM54GerRQiYCYBPPMeAT1ZKUhf3M"></div>-->
                     <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-arrow-circle-up"></i></span>
                      <input name="cantidad" type="number" class="form-control" placeholder="Cantidad" aria-describedby="sizing-addon1" min="1" required>
                    </div>
                    <div class="input-group input-group-lg">
                    <!--<div class="g-recaptcha" data-sitekey="6LcSfQ0TAAAAAM54GerRQiYCYBPPMeAT1ZKUhf3M"></div>-->
                      <input name="url-enviar" id="url-enviar" type="hidden" class="form-control" placeholder="Cantidad" aria-describedby="sizing-addon1" min="1" required>
                    </div>
                    </br>
                    <input type="Submit" name="enviar-pedido" value="Solicitar Producto" class="btn btn-default btn-primary"/>
                    <input type="reset" name="" id="resetear" value="Cancelar" class="btn btn-default "/>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php 
}
catch(Exception $e)
{
  echo $e->getMessage();
}

// if ("cli" !== PHP_SAPI)
// {
//     echo "</pre>";
// }
// ?>


      <?php
      }
            
            
get_footer();

   
?>
