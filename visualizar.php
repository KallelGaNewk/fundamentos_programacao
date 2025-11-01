<div class="bg-white rounded-lg shadow-lg p-8 mb-4">
    <div class="curriculo-content">
        <?php $curr = $_SESSION['curriculo']; ?>

        <!-- Cabeçalho -->
        <div class="text-center mb-6 pb-4 border-b-2 border-blue-600">
            <h2 class="text-3xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($curr['nome']) ?></h2>
            <div class="flex flex-wrap justify-center gap-4 text-sm text-gray-600">
                <?php if ($curr['email']): ?>
                    <span>✉ <?= htmlspecialchars($curr['email']) ?></span>
                <?php endif; ?>
                <?php if ($curr['telefone']): ?>
                    <span>📱 <?= htmlspecialchars($curr['telefone']) ?></span>
                <?php endif; ?>
                <?php if ($curr['endereco']): ?>
                    <span>📍 <?= htmlspecialchars($curr['endereco']) ?></span>
                <?php endif; ?>
                <?php if ($curr['cidade']): ?>
                    <span><?= htmlspecialchars($curr['cidade']) ?></span>
                <?php endif; ?>
                <?php if ($curr['estado']): ?>
                    <span><?= htmlspecialchars($curr['estado']) ?></span>
                <?php endif; ?>
            </div>
            <?php if ($curr['linkedin'] || $curr['portfolio']): ?>
                <div class="flex flex-wrap justify-center gap-4 text-sm text-blue-600 mt-2">
                    <?php if ($curr['linkedin']): ?>
                        <span>🔗 <?= htmlspecialchars($curr['linkedin']) ?></span>
                    <?php endif; ?>
                    <?php if ($curr['portfolio']): ?>
                        <span>🌐 <?= htmlspecialchars($curr['portfolio']) ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Objetivo Profissional -->
        <?php if ($curr['objetivo']): ?>
            <div class="mb-6">
                <h3 class="text-xl font-bold text-blue-700 mb-2 border-b border-gray-300 pb-1">Objetivo Profissional</h3>
                <p class="text-gray-700 text-justify"><?= nl2br(htmlspecialchars($curr['objetivo'])) ?></p>
            </div>
        <?php endif; ?>

        <!-- Experiência Profissional -->
        <?php if (!empty($curr['experiencias'])): ?>
            <div class="mb-6">
                <h3 class="text-xl font-bold text-blue-700 mb-2 border-b border-gray-300 pb-1">Experiência Profissional</h3>
                <?php foreach ($curr['experiencias'] as $exp): ?>
                    <?php if (!empty($exp)): ?>
                        <div class="mb-3">
                            <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($exp)) ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Formação Acadêmica -->
        <?php if (!empty($curr['formacoes'])): ?>
            <div class="mb-6">
                <h3 class="text-xl font-bold text-blue-700 mb-2 border-b border-gray-300 pb-1">Formação Acadêmica</h3>
                <?php foreach ($curr['formacoes'] as $form): ?>
                    <?php if (!empty($form)): ?>
                        <div class="mb-3">
                            <p class="text-gray-700 leading-relaxed"><?= nl2br(htmlspecialchars($form)) ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Habilidades -->
        <?php if (!empty($curr['habilidades'])): ?>
            <div class="mb-6">
                <h3 class="text-xl font-bold text-blue-700 mb-2 border-b border-gray-300 pb-1">Habilidades</h3>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($curr['habilidades'] as $hab): ?>
                        <?php if (!empty($hab)): ?>
                            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"><?= htmlspecialchars($hab) ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="print:hidden text-center text-xs text-gray-500 mt-8 pt-4 border-t border-gray-200">
            <p>Preencha todos os campos e clique em "Visualizar Currículo" para o resultado final.</p>
            <p>Use "Imprimir / Salvar PDF" para salvar seu currículo em formato PDF.</p>
        </div>
    </div>
</div>

<!-- Botões de Ação -->
<div class="flex gap-4 justify-center mb-8">
    <a href="?acao=editar" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
        </svg>
        Editar Dados
    </a>
    <button onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
        </svg>
        Imprimir / Salvar PDF
    </button>
    <a href="?acao=limpar" onclick="return confirm('Deseja limpar todos os dados?')" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
        </svg>
        Limpar Tudo
    </a>
</div>
