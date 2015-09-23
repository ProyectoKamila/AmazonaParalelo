<style>
     /* configurado por el usuario */
            .color-fondo, .footer-about{
                background-color: <?= $config->colorfondo ?>;
            }

/*            * {
                color: <?= $config->letrafondo ?>;
            }*/
            .color1{
                background-color: <?= $config->color1 ?> ;
                color: <?= $config->letra1 ?>;
            }
            .color2{
                background-color: <?= $config->color2 ?> ;
                color: <?= $config->letra2 ?>;
            }
            .color3, .button, input.button, a.button{
                background-color: <?= $config->color3 ?>;
                color: <?= $config->letra3 ?>;
            }
            #cart, .checkout-heading, .cart-info thead td{
                background-color: <?= $config->color4 ?>;
                color: <?= $config->letra4 ?>;
            }
            .heading a #cart-total{
                color: <?= $config->letra4 ?>;
            }
</style>
<div id="footer-container">
    <div class="footer-about">
        <div class="text"><h1><?= $appdata['nombre2'] ?></h1>
            <h3><?= $appdata['eslogan'] ?></h3>
            <!--Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit...-->	
        </div>
        <div class="social">
            <h1>Contacte</h1>
            <? if ($appdata['facebook'] != '') { ?>
                <a target="_blank" href="<?= $appdata['facebook'] ?>" class="soc-img facebook"></a>
            <? } ?>
            <? if ($appdata['twitter'] != '') { ?>
                <a target="_blank" href="<?= $appdata['twitter'] ?>" class="soc-img twitter"></a>
            <? } ?>
            <? if ($appdata['instagram'] != '') { ?>
                <a target="_blank" href="<?= $appdata['instagram'] ?>" class="soc-img instagram"></a>
            <? } ?>
            <!--<a href="skype://shopskype" class="soc-img skype"></a>-->    
            <div class="contact">
                <div class="phone"><b>Tel&eacute;fono: </b><?= $appdata['telefono'] ?></div>
                <!--<div class="fax"><b>Fax:</b> 8(800)234-5678</div>-->
                <div class="email"><a href="mailto:<?= $appdata['email'] ?>"><?= $appdata['email'] ?></a></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>




<!--    <div id="footer">
        <div class="column">
            <h3>Information</h3>
            <ul>
                <li><a href="index8816.html?route=information/information&amp;information_id=4">About Us</a></li>
                <li><a href="index1766.html?route=information/information&amp;information_id=6">Delivery Information</a></li>
                <li><a href="index1679.html?route=information/information&amp;information_id=3">Privacy Policy</a></li>
                <li><a href="index99e4.html?route=information/information&amp;information_id=5">Terms &amp; Conditions</a></li>
            </ul>
        </div>
        <div class="column">
            <h3>Customer Service</h3>
            <ul>
                <li><a href="index2724.html?route=information/contact">Contact Us</a></li>
                <li><a href="indexda9d.html?route=account/return/insert">Returns</a></li>
                <li><a href="index7cb2.html?route=information/sitemap">Site Map</a></li>
            </ul>
        </div>
        <div class="column">
            <h3>Extras</h3>
            <ul>
                <li><a href="indexd773.html?route=product/manufacturer">Brands</a></li>
                <li><a href="index4dd2.html?route=account/voucher">Gift Vouchers</a></li>
                <li><a href="index3d18.html?route=affiliate/account">Affiliates</a></li>
                <li><a href="indexf110.html?route=product/special">Specials</a></li>
            </ul>
        </div>
        <div class="column">
            <h3>Twitter</h3>
            <script type="text/javascript">
                jQuery(document).ready(function($) {

                    $('#twitter_update_list').tweet({
                        modpath: 'catalog/view/theme/metroshop/js/twitter/',
                        count: 2,
                        username: 'dedalx',
                        template: "<span>{text}</span>",
                        loading_text: '<img src="catalog/view/theme/metroshop/image/loading.gif">'

                    });


                });</script>


            <ul id="twitter_update_list"></ul>
        </div>
        <div class="column">
            <h3>FACEBOOK</h3>
             Facebook 
            <style type="text/css">
                .facebookOuter {
                    background-color:transparent; 

                    padding:0px;

                    border:none;
                }
                .facebookInner {

                    overflow:hidden;
                }

            </style>

            <div class="facebookOuter">
                <div class="facebookInner">
                    <div class="fb-like-box" data-href="http://www.facebook.com/pages/dx/115403961948855" data-width="200" data-height="100" data-show-faces="false" data-colorscheme="dark" data-stream="false" data-border-color="transparent" data-header="false"></div>       
                </div>
            </div>

            <div id="fb-root"></div>

            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id))
                        return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "./js/all.js#xfbml=1";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

             / Facebook 
        </div>
    </div>-->
    <!--
    OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
    Please donate via PayPal to donate@opencart.com
    //-->
    <div id="powered">Integrado por <a href="http://www.pkcut.net/l/36bzxr1" target="_blank" title="Proyecto Kamila">Proyecto Kamila</a>
    </div>
    <!--<div id="paymenticons"><img src="catalog/view/theme/metroshop/image/payment.png"></div>-->
    <!--
    OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
    Please donate via PayPal to donate@opencart.com
    //-->
    <div class="clear"></div>
</div>

</body>
<!-- Mirrored from www.metro-oc.any-themes.com/metroshop1/ by HTTrack Website Copier/3.x [XR&CO'2010], Tue, 21 Oct 2014 21:35:09 GMT -->
<!-- Added by HTTrack -->
<!--<meta http-equiv="content-type" content="text/html;charset=utf-8">-->
<!-- /Added by HTTrack -->
</html>