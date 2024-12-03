<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

ob_start();

$route = new Router(url(), ":");

$route->namespace("Source\App");
// Rotas amigáveis da área pública
$route->get("/", "Web:home");
$route->get("/sobre", "Web:about");
$route->get("/contato", "Web:contact");
$route->get("/localizacao", "Web:location");
$route->get("/carrinho-compras","Web:cart");
$route->get("/servicos","Web:services");
$route->get("/faqs","Web:faqs");
$route->get("/login","Web:login");
$route->get("/register","Web:register");
$route->get("/alteracao","Web:alteration");

// Rotas amigáveis da área restrita
$route->group("/app");

$route->get("/", "App:home");
$route->get("/perfil", "App:profile");
$route->get("/primeirosocorros", "App:EmergencyForm");
$route->get("/ocorrencias", "App:ocorrencia");
$route->get("/alteracaoperfil","App:alteration");


$route->group(null);

$route->group("/admin");

$route->get("/", "Admin:home");
$route->get("/listaocorrencia", "Admin:products");
$route->get("/Medico", "Admin:Medico");
$route->get("/listMedico", "Admin:listMedico");
$route->get("/updatefaq", "Admin:updatefaq");
$route->get("/viewfaq", "Admin:viewfaq");
$route->group(null);

$route->get("/ops/{errcode}", "Web:error");

$route->group(null);

$route->dispatch();

if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();