<form method="POST" action="?acao=visualizar" class="bg-white rounded-lg shadow-lg p-6">
    <?php $curr = $_SESSION['curriculo'] ?? []; ?>
    
    <!-- Dados Pessoais -->
    <div class="mb-6">
        <h2 class="text-xl font-bold text-blue-700 mb-4 border-b-2 border-blue-600 pb-2">Dados Pessoais</h2>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nome Completo *</label>
            <input type="text" name="nome" required value="<?= htmlspecialchars($curr['nome'] ?? '') ?>"
                   placeholder="Seu nome completo"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">E-mail *</label>
                <input type="email" name="email" required value="<?= htmlspecialchars($curr['email'] ?? '') ?>"
                       placeholder="seu@email.com"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Telefone *</label>
                <input type="tel" name="telefone" required value="<?= htmlspecialchars($curr['telefone'] ?? '') ?>"
                       placeholder="(00) 00000-0000"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
            <div class="md:col-span-2">
                <label class="block text-gray-700 font-semibold mb-2">Endereço</label>
                <input type="text" name="endereco" value="<?= htmlspecialchars($curr['endereco'] ?? '') ?>"
                       placeholder="Rua, número, bairro"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Cidade</label>
                <input type="text" name="cidade" value="<?= htmlspecialchars($curr['cidade'] ?? '') ?>"
                       placeholder="Sua cidade"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Estado</label>
                <input type="text" name="estado" value="<?= htmlspecialchars($curr['estado'] ?? '') ?>"
                       placeholder="UF"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">LinkedIn</label>
                <input type="text" name="linkedin" value="<?= htmlspecialchars($curr['linkedin'] ?? '') ?>"
                       placeholder="linkedin.com/in/seu-perfil"
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Portfólio/Website</label>
            <input type="text" name="portfolio" value="<?= htmlspecialchars($curr['portfolio'] ?? '') ?>"
                   placeholder="www.seuportfolio.com"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Objetivo Profissional</label>
            <textarea name="objetivo" rows="3" placeholder="Descreva brevemente seus objetivos profissionais..."
                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($curr['objetivo'] ?? '') ?></textarea>
        </div>
    </div>

    <!-- Experiência Profissional -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-blue-700 border-b-2 border-blue-600 pb-2">Experiência Profissional</h2>
            <button type="button" onclick="adicionarExperiencia()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                <span class="text-xl">+</span> Adicionar Experiência
            </button>
        </div>
        <p class="text-sm text-gray-600 mb-3 italic">Nenhuma experiência adicionada. Clique em "Adicionar Experiência" para começar.</p>
        <div id="experiencias-container">
            <?php if (isset($curr['experiencias'])): ?>
                <?php foreach ($curr['experiencias'] as $i => $exp): ?>
                    <div class="experiencia-item mb-3 p-4 border border-gray-200 rounded-lg bg-gray-50">
                        <textarea name="experiencias[]" rows="3" placeholder="Cargo - Empresa - Período&#10;Descreva suas responsabilidades e conquistas..."
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($exp) ?></textarea>
                        <button type="button" onclick="removerItem(this)" class="text-red-600 hover:text-red-800 text-sm mt-2">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Formação Acadêmica -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-blue-700 border-b-2 border-blue-600 pb-2">Formação Acadêmica</h2>
            <button type="button" onclick="adicionarFormacao()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                <span class="text-xl">+</span> Adicionar Formação
            </button>
        </div>
        <p class="text-sm text-gray-600 mb-3 italic">Nenhuma formação adicionada. Clique em "Adicionar Formação" para começar.</p>
        <div id="formacoes-container">
            <?php if (isset($curr['formacoes'])): ?>
                <?php foreach ($curr['formacoes'] as $i => $form): ?>
                    <div class="formacao-item mb-3 p-4 border border-gray-200 rounded-lg bg-gray-50">
                        <textarea name="formacoes[]" rows="2" placeholder="Curso - Instituição - Período"
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?= htmlspecialchars($form) ?></textarea>
                        <button type="button" onclick="removerItem(this)" class="text-red-600 hover:text-red-800 text-sm mt-2">Remover</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Habilidades -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-bold text-blue-700 border-b-2 border-blue-600 pb-2">Habilidades</h2>
            <button type="button" onclick="adicionarHabilidade()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm flex items-center gap-1">
                <span class="text-xl">+</span> Adicionar Habilidade
            </button>
        </div>
        <p class="text-sm text-gray-600 mb-3 italic">Nenhuma habilidade adicionada. Clique em "Adicionar Habilidade" para começar.</p>
        <div id="habilidades-container" class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <?php if (isset($curr['habilidades'])): ?>
                <?php foreach ($curr['habilidades'] as $i => $hab): ?>
                    <div class="habilidade-item flex gap-2">
                        <input type="text" name="habilidades[]" value="<?= htmlspecialchars($hab) ?>"
                               placeholder="Ex: JavaScript, Photoshop, Inglês..."
                               class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button type="button" onclick="removerItem(this)" class="text-red-600 hover:text-red-800 px-2">✕</button>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Botões -->
    <div class="flex gap-4 justify-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold flex items-center gap-2 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
            </svg>
            Visualizar Currículo
        </button>
    </div>
</form>
