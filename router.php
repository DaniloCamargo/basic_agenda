<?php

require_once './src/controllers/ContactController.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = explode('.php', $requestUri);
$requestUri = end($requestUri);
$method = $_SERVER['REQUEST_METHOD'];
$response = '';

$controller = new ContactController();

if ($method === 'GET' && $requestUri === '/api/listar') {
  $contatos = $controller->getAllContacts();
  $response = json_encode($contatos);
} elseif ($method === 'GET' && preg_match('/^\/api\/listar\/(\d+)$/', $requestUri, $matches)) {
  $id = $matches[1]; // Extrai o valor do parâmetro id
  $contatos = $controller->getContactById($id);
  $response = json_encode($contatos);
} elseif ($method === 'POST' && preg_match('/^\/api\/excluir\/(\d+)$/', $requestUri, $matches)) {
  $id = $matches[1]; // Extrai o valor do parâmetro id
  $contatos = $controller->deleteContact($id);
  $response = json_encode($contatos);
} elseif ($method === 'POST' && $requestUri === '/api/criar') {
  // Extrair dados da requisição POST e criar um novo contato
  $data = json_decode(file_get_contents('php://input'), true);
  $novoContato = new Contact(
    $data['nome'],
    $data['email'],
    $data['data_nascimento'],
    $data['cpf'],
    $data['telefones']
  );
  $response = json_encode($controller->addContact($novoContato));
} elseif ($method === 'POST' && preg_match('/^\/api\/editar\/(\d+)$/', $requestUri, $matches)) {
  $id = $matches[1]; // Extrai o ID do contato da URL
  // Extrair dados da requisição POST e editar o contato
  $data = json_decode(file_get_contents('php://input'), true);
  $novoContato = new Contact(
    $data['nome'],
    $data['email'],
    $data['data_nascimento'],
    $data['cpf'],
    $data['telefones']
  );
  $response = json_encode($controller->editContact($id, $novoContato));
} elseif ($requestUri === '/dev/build') {
  require_once './src/config/Build.php';
  Build::run();
} else {
  $response = json_encode(['error' => 'Rota não encontrada']);
}

header('Content-Type: application/json');
echo $response;
