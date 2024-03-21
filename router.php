<?php

require_once './src/controllers/ContactController.php';

$requestUri = $_SERVER['REQUEST_URI'];
$requestUri = explode('.php', $requestUri);
$requestUri = end($requestUri);
$method = $_SERVER['REQUEST_METHOD'];
$response = '';

$controller = new ContactController();

if ($method === 'GET' && $requestUri === '/api/listar') {
  $contatos = $controller->listContacts();
  $response = json_encode($contatos);
} elseif ($method === 'POST' && $requestUri === '/api/criar') {
  // Extrair dados da requisição POST e criar um novo contato
  $data = json_decode(file_get_contents('php://input'), true);
  $novoContato = new Contact(
    $data['nome'],
    $data['email'],
    $data['dataNascimento'],
    $data['cpf'],
    $data['telefones']
  );
  $response = json_encode($controller->adicionarContato($novoContato));
} elseif ($method === 'PUT' && $requestUri === '/api/editar') {
  // Extrair dados da requisição PUT e editar o contato
  $data = json_decode(file_get_contents('php://input'), true);
  $id = $data['id'];
  $novoContato = new Contact(
    $data['nome'],
    $data['email'],
    $data['dataNascimento'],
    $data['cpf'],
    $data['telefones']
  );
  $response = json_encode($controller->editarContato($id, $novoContato));
} else {
  $response = json_encode(['error' => 'Rota não encontrada']);
}

header('Content-Type: application/json');
echo $response;
