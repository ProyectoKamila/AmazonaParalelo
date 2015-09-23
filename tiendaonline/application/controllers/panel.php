<?php

class Panel extends CI_Controller {

    public $data = null;
    public $userdata = null;
//    public $tokkenapp = 'd93a236966e4ed4a3e157e3e260c6236'; //local

    public $tokkenapp = null; //online
    public $config = null; //online

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pkapi');
        if (isset($_COOKIE['tokkenapp']) && ($_COOKIE['tokkenapp'])) {
            $this->tokkenapp = $_COOKIE['tokkenapp'];
            if (isset($_COOKIE['cnf']) && ($_COOKIE['cnf'])) {
                $this->data['config'] = json_decode($_COOKIE['cnf']);
            }
        } else {
            $url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
            $url.= "://" . $_SERVER['HTTP_HOST'];
//            debug($url, false);
            $tokken = $this->pkapi->post('url', array('url' => $url));
//            debug($tokken);
            if ($tokken['success']) {
                setcookie("tokkenapp", $tokken['datos']['tokken']);
                setcookie("cnf", json_encode($tokken['datos']['config'][0]));
                redirect('./');
            } else {
                echo 'Configure su URL en <a href="https://www.pkclick.com">Pkclick.com</a>';
                exit();
            }
        }
        $this->data['tokken'] = $this->tokkenapp;
//        debug($this->data['config']);
        if ($this->tokkenapp) {
            $config['tokken'] = $this->tokkenapp;
            $config['tag'] = true;
            $this->load->library('user', $config);
            $app = $this->pkapi->post('datosapp', array('tokkenapp' => $this->tokkenapp));
            if ($app['success']) {
                $appdata = $this->data['appdata'] = $app['datos'];
                setcookie("empresa", base64_encode($app['datos']['idempresa']));
            } else {
                echo 'Estamos en Mantenimiento, Disculpe';
                exit();
            }
        } else {
//            $this->configapp();
        }

//        debug($appdata, false);
//        debug($this->user);
    }

    public function header() {
        $categorias = $this->pkapi->post('categorias', array('empresa' => $this->data['appdata']['idempresa']));
        if ($categorias['success']) {
            $this->data['categorias'] = $categorias['categorias'];
        }
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $carrito = $this->pkapi->post('carrito', array('empresa' => $this->data['appdata']['idempresa'], 'tokkenuser' => $tokkenuser));
            if ($carrito['success']) {
                $this->data['prodcar'] = $carrito['productos'];
                $this->data['totalcar'] = $carrito['total'];
            }
        }
        $this->load->view('header', $this->data);
    }

    public function index($mensaje = null) {
        if ($this->tokkenapp) {
            $productos = $this->pkapi->post('productosapp', array('empresa' => $this->data['appdata']['idempresa']));
            if ($productos['success']) {
                $this->data['productos'] = $productos['Productos'];
            } else {
                $this->data['mensaje'] = $productos['error'];
            }
            if ($this->data['appdata']['estatus_app'] > 0) {
                $banner = $this->pkapi->post('banner', array('empresa' => $this->data['appdata']['idempresa']));
                if ($banner['success']) {
                    $this->data['banners'] = $banner['banners'];
                }
//                debug($banner, false);
                $destacados = $this->pkapi->post('prod_dest', array('empresa' => $this->data['appdata']['idempresa']));
//                $destacados = $this->pkapi->post('prod_dest', array('empresa' => 33));
                if ($destacados['success']) {
                    $this->data['destacados'] = $destacados['destacados'];
                } else {
                    $this->data['destacados'] = NULL;
                }
            }
            $this->header();
            $this->load->view('index', $this->data);
            $this->load->view('footer', $this->data);
        } else {
            echo 'Configure su URL en <a href="https://www.pkclick.com">Pkclick.com</a>';
            exit();
//            $this->configapp();
        }
    }

    public function footer() {
        $this->load->view('footer', $this->data);
    }

    public function configapp() {

        if ($this->data['tokken']) {
            $this->header();
        }
        if ($this->input->post()) {
            if (($this->input->post('email')) && ($this->input->post('password')) && ($this->input->post('tokkenapp'))) {
                $config = $this->pkapi->post('configapp', array('email' => $this->input->post('email'), 'password' => $this->input->post('password'), 'tokkenapp' => $this->input->post('tokkenapp')));
//                debug($config);
                $datos = array('tokkenapp' => $this->input->post('tokkenapp'));
                if ($config['success']) {
                    $ar = file_exists('configapp.txt');
                    if ($ar) {
                        unlink('configapp.txt');
                        $ar = fopen("configapp.txt", "a") or
                                die("Problemas en la creacion");
                        fputs($ar, json_encode($datos));
                        fclose($ar);
                    } else {
                        $ar = fopen("configapp.txt", "a") or
                                die("Problemas en la creacion");
                        fputs($ar, json_encode($datos));
                        fclose($ar);
                    }
                    redirect('./configapp');
                } else {
                    $this->data['mensaje'] = $config['error'];
                    $this->load->view('configapp', $this->data);
                }
            } else {
//                unlink('configapp.txt');
                $_POST['tokken'] = $this->data['appdata']['url'];
                $datos = $_POST;
//                debug($datos);
                $config = $this->pkapi->post('urlcolor', $datos);
                setcookie("cnf", json_encode($datos));
//                debug($config);
//                $ar = fopen("configapp.txt", "a") or
//                        die("Problemas en la creacion");
//                fputs($ar, json_encode($datos));
//                fclose($ar);
                redirect('./');
                $this->load->view('configapp', $this->data);
            }
        } else {
//            $this->data['mensaje'] = 'No se han enviado los datos';
            $this->load->view('configapp', $this->data);
        }
        if ($this->data['tokken']) {
            $this->load->view('footer', $this->data);
        }

//        $this->header();
//        $this->load->view('login');
//        $this->load->view('footer', $this->data);
    }

    public function config() {
//        debug('aqui');
        $s = null;
        $n = 0;
        $ar = file_exists('configapp.txt');
        if ($ar) {
            $ar = fopen("configapp.txt", "r");
            while (!feof($ar)) {
                $s[$n] = fgets($ar);
                $n++;
            }
            $datos = json_decode($s[0]);
            $this->tokkenapp = $datos->tokkenapp;
            fclose($ar);
            return $datos;
        } else {
            return NULL;
        }
    }

    public function login($mensaje = null) {
        $this->header();
        $this->load->view('login');
        $this->load->view('footer', $this->data);
    }

    public function blog($id = null) {
        if ($id) {
            $deetail = $this->pkapi->post('timelinedetail', array('empresa' => $this->data['appdata']['idempresa'], 'publicacion' => $id));
            if ($deetail['success']) {
                $this->data['detail'] = $deetail['publicacion'];
            } else {
                $this->data['mensaje'] = $deetail['error'];
            }
        } else {
            $timeline = $this->pkapi->post('timeline', array('empresa' => $this->data['appdata']['idempresa'], 'coment' => 1, 'limite' => 2, 'desde' => 0));
//        debug($timeline['timeline'][32],FALSE);
            if ($timeline['success']) {
                $this->data['timeline'] = $timeline['timeline'];
            } else {
                $this->data['mensaje'] = $timeline['error'];
            }
        }
        $this->header();
        $this->load->view('blog', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function blogmore($desde = null) {
        $more = $this->pkapi->post('timeline', array('empresa' => $this->data['appdata']['idempresa'], 'coment' => 1, 'limite' => 2, 'desde' => $desde));
        $desde = $desde + 2;
//        debug($timeline['timeline'][32],FALSE);
        if ($more['success']) {
            $timeline = $more['timeline'];
            foreach ($timeline as $public) {
                if ($public['type'] == 1) {
                    echo '
            <div class="product-info">
                <div  <div class="left">
                        <div class="image"><a href="https://www.pkclick.com/imagenescarrito/' . $public['image'] . '" title="Proyecto Kamila" id="zoom01" class="cloud-zoom" rel="position:\'right\', zoomWidth:320, zoomHeight:320, adjustX:10, adjustY:0, tint:\'#FFFFFF\', showTitle:false, softFocus:1, smoothMove:5, tintOpacity:0.8"><img width="320" height="320" src="https://www.pkclick.com/imagenescarrito/' . $public['image'] . '" title="Proyecto Kamila" alt="Proyecto Kamila" id="image" /></a></div>

                    </div>
                    <div class="right">
                        <div class="breadcrumb">
                            <a href="./">Inicio</a> &raquo; <a href="./blog/' . $public['id'] . ' ">Ver</a>';

//                $d = "2014-12-02 10:38:45";
                    $d = explode(" ", $public['date']);
                    echo'
                            &raquo; <a>' . hace_tiempo($d[1] . " " . $d[0] . " [H:i:s Y-m-d]") . '</a>
                        </div>
                        <div class="product-info-buttons">
                            <p style="color: white;font-size: 17px;text-align: justify;margin: 0px;">' . add_href_url($public['coment']) . '</p>
                        </div>
                        <div class="product-info-buttons">
                            <div class="comentarios cm' . $public['id'] . '">';
                    foreach ($public['comentarios'] as $pos => $coment) {
                        echo '<div class="_coment d<?=' . $coment['idcomentario'] . '">
                                        <div class="img_user">
                                            <a target="_blank" href="http://www.pkclick.com/pknetmarketing.com/images/' . $coment['image'] . '">
                                                <img src="http://www.pkclick.com/pknetmarketing.com/images/' . $coment['image'] . '">
                                            </a>
                                        </div>
                                        <strong class="_usuario">
                                            ' . $coment['name'] . '
                                        </strong>
                                        <coment class="_comentario">
                                            ' . add_href_url($coment['comentario']) . '
                                        </coment>';
                        if ($this->user->conect) {
                            if ($this->user->information->id == $coment['user']) {
                                echo '<a onclick="deletecoment(' . $coment['idcomentario'] . ')" title="Eliminar Comentario"><i class="icon-trash"></i></a>';
                            }
                        }

                        echo' <tiempo class="_tiempo">
                                            <em>';

                        $h = explode(" ", $coment['fecha']);
                        echo hace_tiempo($h[1] . " " . $h[0] . " [H:i:s Y-m-d]") . '
                                                
                                            </em>
                                        </tiempo>
                                    </div>';
                    }
                    echo '<div class="dd' . $public['id'] . '"></div>
                            </div>
                            <div class="coment">';
                    if ($this->user->conect) {
                        echo '<textarea onsubmit="timecoment(' . $public['id'] . ')" id="newcoment' . $public['id'] . '" placeholder="Escriba Aquí" onkeypress="character(' . $public['id'] . ')"></textarea>
                                    <number id="number' . $public['id'] . '">255</number>
                                    <button class="button" id="btn' . $public['id'] . '" onclick="timecoment(' . $public['id'] . ')"><i class="icon-comment"></i>

                                    </button>';
                    } else {
                        echo '<a href="./login" class="button btn">
                                        Conectate para comentar
                                        
                                    </a>';
                    }
                    echo '</div>
                        </div>
                    </div>
                </div>';
                }
            }
            echo '<div class="moretimeline" onclick="showmore(' . $desde . ')"><a>Ver Mas</a></div>';
            echo "
            <script type=\"text/javascript\"><!--
                    $(document).ready(function() {
                        $('#zoom01, .cloud-zoom-gallery').CloudZoom();
                    });
                    //--></script>                
";
        } else {
            echo '<div class="warning">' . $more['error'] . '<img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>';
        }
    }

    public function blogcoment($id = null) {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $comentario = $this->pkapi->post('timelinecomentadd', array('tokkenuser' => $tokkenuser, 'idpublicacion' => $id, 'comentario' => $this->input->post('comentario')));
//            debug($comentario);
            if ($comentario['success']) {
                $ss = getdate();
                $hora = $ss['hours'] . ':' . $ss['minutes'] . ':' . $ss['seconds'] . ' ' . $ss['year'] . '-' . $ss['mon'] . '-' . $ss['mday'];
                $hora2 = $ss['year'] . '-' . $ss['mon'] . '-' . $ss['mday'] . ' ' . $ss['hours'] . ':' . $ss['minutes'] . ':' . $ss['seconds'];
                echo '<div class="_coment d' . $comentario['idcomentario'] . '"><div class="img_user"><a target="_blank" href="http://www.pkclick.com/pknetmarketing.com/images/' . $comentario['picture'] . '"><img src="http://www.pkclick.com/pknetmarketing.com/images/' . $comentario['picture'] . '"/></a></div><strong class="_usuario">' . $comentario['name'] . ':</strong><coment class="_comentario">' . add_href_url($comentario['comentario']) . '</coment>';
                if ($this->user->conect) {
                    if ($this->user->information->id == $comentario['user']) {
                        echo '<a onclick="deletecoment(' . $comentario['idcomentario'] . ')" title="Eliminar Comentario"><i class="icon-trash"></i></a>';
                    }
                }
                echo'<tiempo class="_tiempo"><em>' . hace_tiempo($hora . " [H:i:s Y-m-d]") . '</em></tiempo></div>';
            } else {
                echo '<div class="warning" style="width: calc(100% - 43px); margin: 0px;">' . $comentario['error'] . '<img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>';
            }
        }
    }

    public function blogcomentdel($id = null) {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $comentario = $this->pkapi->post('timelinecomentdelet', array('tokkenuser' => $tokkenuser, 'idcomentario' => $id));
//            debug($comentario);
            if ($comentario['success']) {
                
            } else {
                echo '<div class="warning" style="width: calc(100% - 43px); margin: 0px;">' . $comentario['error'] . '<img src="http://www.metro-oc.any-themes.com/metroshop1/catalog/view/theme/default/image/close.png" alt="" class="close"></div>';
            }
        }
    }

    public function producto($id = null) {
        $producto = $this->pkapi->post('producto', array('producto' => $id));
        if ($producto['success']) {
            $this->data['producto'] = $producto['producto'];
            $this->data['imagenes'] = $producto['imagenes'];
        } else {
            $this->data['mensaje'] = $producto['error'];
        }
        $this->header();
        $this->load->view('producto', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function categoria($id = null) {
        $this->header();
        $producto = $this->pkapi->post('prodcat', array('empresa' => $this->data['appdata']['idempresa'], 'categoria' => $id));

        if ($producto['success']) {
            $this->data['productos'] = $producto['productos'];
            $this->data['namecat'] = $producto['categoria'];
            $this->data['idcat'] = $id;
            $this->load->view('categoria', $this->data);
        } else {
            $this->data['mensaje'] = $producto['error'];
            $this->load->view('index', $this->data);
        }
        $this->load->view('footer', $this->data);
    }

    public function carrito() {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $this->header();
            $carrito = $this->pkapi->post('carrito', array('empresa' => $this->data['appdata']['nombre'], 'tokkenuser' => $tokkenuser));
            if ($carrito['success']) {
                $this->data['prodcar'] = $carrito['productos'];
                $this->data['idpedido'] = $carrito['pedido'];
                $this->data['total'] = $carrito['total'];
            }
            $formulario = $this->pkapi->post('formulario', array('tokkenuser' => $tokkenuser, 'empresa' => $this->data['appdata']['nombre']));
//            debug($formulario);
            if ($formulario['success']) {
                $this->data['formulario'] = $formulario['formulario'];
            } else {
                $this->data['mensaje'] = "Debe agregar productos a su carro de compra";
                $this->data['formulario'] = "";
            }
            $this->load->view('carrito', $this->data);
            $this->load->view('footer', $this->data);
        } else {
            redirect('./login');
        }
    }

    public function previewcar() {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $carrito = $this->pkapi->post('carrito', array('empresa' => $this->data['appdata']['nombre'], 'tokkenuser' => $tokkenuser));
            if ($carrito['success']) {
                $this->data['prodcar'] = $carrito['productos'];
                $this->data['idpedido'] = $carrito['pedido'];
                $this->data['totalcar'] = $carrito['total'];
            }
            $this->load->view('carrito_pre', $this->data);
        } else {
            redirect('./login');
        }
    }

    public function addcarrito($slug, $cantidad = null) {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $this->pkapi->post('addcarrito', array('tokkenuser' => $tokkenuser, 'producto' => $slug, 'cantidad' => $cantidad));
        } else {
            redirect('./login');
        }
    }

    public function delcarrito($slug) {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $this->pkapi->post('delcarrito', array('tokkenuser' => $tokkenuser, 'producto' => $slug));
        } else {
            redirect('./login');
        }
    }

    public function buscar() {
        $this->header();
        if ($this->input->post()) {
            $descripcion = $this->input->post('descripcion');
//            debug($descripcion);
            if ($descripcion) {
                $descripcion = 1;
            } else {
                $descripcion = 0;
            }
            $buscar = $this->input->post('search');
            $inicio = microtime(true);
            $producto = $this->pkapi->post('buscar', array('empresa' => $this->data['appdata']['nombre'], 'descripcion' => $descripcion, 'buscar' => $buscar));
            $fin = microtime(true);
            $tiempo = $fin - $inicio;
            if ($producto['success']) {
                $this->data['msj'] = 'Mostrando ' . count($producto['productos']) . ' resultados en ' . number_format($tiempo, 2) . ' segundos';
                $this->data['productos'] = $producto['productos'];
                $this->data['buscado'] = $producto['buscar'];
            } else {
                $this->data['buscado'] = ' ';
                $this->data['mensaje'] = $producto['error'];
                if (isset($producto['buscar'])) {
                    $this->data['buscado'] = $producto['buscar'];
                }
            }
        } else {
            $this->data['mensaje'] = 'No introducido que buscar';
            $this->data['buscado'] = ' ';
        }
        $this->load->view('buscar', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function contacto() {
        if ($this->input->post()) {
            $para = $this->data['appdata']['email'];
//            $para = 'toroalbert@gmail.com';
            $titulo = $this->input->post('asunto');
            $mensaje = $this->input->post('texto');
            $cabeceras = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $cabeceras .= 'From: ' . $this->input->post('nombre') . ' <' . $this->input->post('email') . '>' . "\r\n";
            $h = mail($para, $titulo, $mensaje, $cabeceras);
            if ($h) {
                $this->data['msj'] = "Mensaje Enviado Satisfactoriamente";
            } else {
                $this->data['mensaje'] = "Error al enviar mensaje";
            }
        }
        $this->header();
        $this->load->view('contacto', $this->data);
        $this->load->view('footer', $this->data);
    }

    public function mercadopago() {
        $config = NULL;
//        $config = array('CLIENT_ID' => '2559493792267909', 'CLIENT_SECRET' => 'v1HkHBPvQ9ELOUBLtxoOvauunrVmDxVt');
        $config = array('2559493792267909', 'v1HkHBPvQ9ELOUBLtxoOvauunrVmDxVt');
        $this->load->library('MP', $config);
        $preference_data = array(
            "items" => array(
                array(
                    "title" => "Barrilete multicolor",
                    "quantity" => 1,
                    "currency_id" => "ARS",
                    "unit_price" => 10.00
                )
            )
        );
        $preference = $this->MP->create_preference($preference_data);

        echo '<a href="' . $preference['response']['init_point'] . '">Pagar</a>
          <script type="text/javascript" src="https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js"></script>';
    }

    public function neopago() {
        if ($this->input->post()) {
//            debug($_POST, false);
            $pago = $this->pkapi->post('procesarpago', $_POST);
//            debug($pago);
            if ($pago['success']) {
                $datos = array('user' => $this->user->information->id, 'info' => json_encode($pago), 'estate' => 1);
                $this->pkapi->post('neoreg', $datos);
//                $this->data['mensaje'] = $pago['error'];
                $this->pedidos();
            } else {
                $datos = array('user' => $this->user->information->id, 'info' => json_encode($pago), 'estate' => 0);
                $this->pkapi->post('neoreg', $datos);
                if (isset($pago['error'])) {
                    $this->data['mensaje'] = $pago['error'];
                } else {
                    $this->data['mensaje'] = "Error de comunicación con Neopago, intente mas tarde";
                }
                $this->carrito();
            }
//            debug($pago);
        } else {
            $this->data['mensaje'] = 'No se han enviado los datos de pago';
            $this->carrito();
        }
//        $this->header();
//        $this->load->view('contacto', $this->data);
//        $this->load->view('footer', $this->data);
    }

    public function check($id) {

        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            if ($id) {
                $check = $this->pkapi->post('checkpedido', array('idpedido' => $id, 'tokkenuser' => $tokkenuser));
                if ($check['success']) {
//                    $this->header();
//                    debug($check, false);
                    $this->data['msj'] = "Pedido Enviado Satisfactoriamente";
                    $this->pedidos();
                } else {
                    $this->header();
                    $this->data['mensaje'] = $check['error'];

//                    debug($check, false);
                    $this->load->view('carrito', $this->data);
                    $this->load->view('footer', $this->data);
                }
            } else {
                $this->carrito();
            }
        } else {
            redirect('./login');
        }
    }

    public function pedido($id) {
        $pedido = $this->pkapi->post('pedido', array('idpedido' => $id));
//        $this->header();
//        debug($pedido, false);
        if ($pedido['success']) {
            $this->data['pedido'] = $pedido['pedidodetail'];
        } else {
            $this->data['mensaje'] = $pedido['error'];
        }
        $this->load->view('pedido', $this->data);
    }

    public function pedidos() {
        if ($this->user->conect) {
            if (isset($_GET['ip'])) {
                $tokkenuser = $_GET['ip'];
            } elseif (isset($_COOKIE['ip'])) {
                $tokkenuser = $_COOKIE['ip'];
            }
            $pedidos = $this->pkapi->post('mispedidosapp', array('tokkenuser' => $tokkenuser, 'empresa' => $this->data['appdata']['nombre']));
//            debug($pedidos,false);
            if ($pedidos['success']) {
                $this->data['pedidos'] = $pedidos['pedidos'];
                $this->header();
                $this->load->view('pedidos', $this->data);
                $this->load->view('footer', $this->data);
            } else {
                $this->data['mensaje'] = $pedidos['error'];
                $this->index();
            }
        } else {
            redirect('./login');
        }
    }

    private function url_exists($url) {
        $ch = @curl_init($url);
        @curl_setopt($ch, CURLOPT_HEADER, TRUE);
        @curl_setopt($ch, CURLOPT_NOBODY, TRUE);
        @curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        @curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
        @curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $status = array();
        preg_match('/HTTP\/.* ([0-9]+) .*/', @curl_exec($ch), $status);
        return ($status[1] == 200);
    }

    private function curl($direccion = null, $parametros = null) {
        if ($direccion) {
            $h = $this->url_exists($direccion);
//            if ($h) {
            $ch = curl_init($direccion);
//            } else {
//                $retr = array('success' => false, 'error' => 'La funcion indicada no existe');
//                return $retr;
//            }
            curl_setopt($ch, CURLOPT_POST, 1);
            if ($parametros) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $parametros);
            }
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $respuesta = curl_exec($ch);
//            echo '<div style="font-size: 12px;"><strong>' . $accion . ': </strong>' . $respuesta . '</div><br><br><br>';
//            debug($respuesta, false);
            $error = curl_error($ch);
//            debug($error, false);
            $decoded = json_decode($respuesta, true);
//            debug($decoded, false);
            if ($decoded) {
                return $decoded;
            } elseif ($respuesta) {
                return $respuesta;
            } elseif ($error) {
                return $error;
            }
            curl_close($ch);
        } else {
            return null;
        }
    }

    public function prueba() {
        $direccion = "https://api.mercadolibre.com/oauth/token";
//        $direccion = "http://pkclick.com/pkapi/";
        $parametros = array('grant_type' => 'client_credentials', 'client_id' => "2559493792267909", 'client_secret' => 'v1HkHBPvQ9ELOUBLtxoOvauunrVmDxVt');
        $tokken = $this->curl($direccion, $parametros);
        debug($tokken, false);
        $direccion = "https://api.mercadolibre.com/users/test_user?access_token=" . $tokken['access_token'];
//        $site_id = NULL;
        $site_id = array('site_id' => 'mlv');
        $prueba = $this->curl($direccion, $site_id);
        debug($prueba, false);
        if ($this->input->post()) {
            debug($this->input->post(), false);
            $direccion = "https://api.mercadolibre.com/checkout/custom/create_payment?access_token=" . $tokken['refresh_token'];
            $daatos = $this->input->post();
//            "amount": 10,
//            "reason": "Título de lo que están pagando",
//            "currency_id": "ARS",
//            "installments": 1,
//            "payment_method_id": "visa",
//            "card_token_id": "card_token",
//            "payer_email": "payer@email.com",
//            "external_reference": "1234"
            $pago = $this->curl($direccion, $daatos);
            debug($pago);
        }
        $this->data['access_token'] = $tokken['access_token'];
        $this->load->view('mp', $this->data);
    }

}

?>