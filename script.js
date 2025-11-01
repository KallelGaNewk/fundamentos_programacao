function adicionarExperiencia() {
    const container = document.getElementById("experiencias-container");
    const div = document.createElement("div");
    div.className = "experiencia-item mb-3 p-4 border border-gray-200 rounded-lg bg-gray-50";
    div.innerHTML = `
                <textarea name="experiencias[]" rows="3" placeholder="Cargo - Empresa - Período&#10;Descreva suas responsabilidades e conquistas..."
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <button type="button" onclick="removerItem(this)" class="text-red-600 hover:text-red-800 text-sm mt-2">Remover</button>
            `;
    container.appendChild(div);
}

function adicionarFormacao() {
    const container = document.getElementById("formacoes-container");
    const div = document.createElement("div");
    div.className = "formacao-item mb-3 p-4 border border-gray-200 rounded-lg bg-gray-50";
    div.innerHTML = `
                <textarea name="formacoes[]" rows="2" placeholder="Curso - Instituição - Período"
                          class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                <button type="button" onclick="removerItem(this)" class="text-red-600 hover:text-red-800 text-sm mt-2">Remover</button>
            `;
    container.appendChild(div);
}

function adicionarHabilidade() {
    const container = document.getElementById("habilidades-container");
    const div = document.createElement("div");
    div.className = "habilidade-item flex gap-2";
    div.innerHTML = `
                <input type="text" name="habilidades[]" placeholder="Ex: JavaScript, Photoshop, Inglês..."
                       class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="button" onclick="removerItem(this)" class="text-red-600 hover:text-red-800 px-2">✕</button>
            `;
    container.appendChild(div);
}

function removerItem(button) {
    const item = button.closest(".experiencia-item, .formacao-item, .habilidade-item");
    if (item) item.remove();
}
