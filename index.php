<?php
session_start();

// Processar formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['curriculo'] = [
        'nome' => $_POST['nome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefone' => $_POST['telefone'] ?? '',
        'endereco' => $_POST['endereco'] ?? '',
        'cidade' => $_POST['cidade'] ?? '',
        'estado' => $_POST['estado'] ?? '',
        'linkedin' => $_POST['linkedin'] ?? '',
        'portfolio' => $_POST['portfolio'] ?? '',
        'objetivo' => $_POST['objetivo'] ?? '',
        'experiencias' => $_POST['experiencias'] ?? [],
        'formacoes' => $_POST['formacoes'] ?? [],
        'habilidades' => $_POST['habilidades'] ?? []
    ];
}

// Tenta pegar o parametro 'acao', se não existir, define como 'editar'
$acao = $_GET['acao'] ?? 'editar';

if ($acao === 'limpar'):
    session_destroy();
    header('Location: index.php');
    exit;
endif;
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
        <title>Gerador de Currículos</title>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen py-8">
        <div class="max-w-4xl mx-auto px-4">
            <!-- Header -->
            <div class="print:hidden text-center mb-8">
                <div class="flex items-center justify-center mb-2">
                    <svg class="w-8 h-8 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h1 class="text-3xl font-bold text-gray-800">Gerador de Currículos</h1>
                </div>
                <p class="text-gray-600">Crie seu currículo profissional de forma rápida e fácil</p>
            </div>

            <?php
                if ($acao === 'visualizar' && isset($_SESSION['curriculo'])):
                    include 'visualizar.php';
                else:
                    include 'editar.php';
                endif;
            ?>
        </div>
    </div>
</body>
</html>
