function handleFileUpload(input) {
    var label = document.getElementById('anexo-label-multiple');
    var nome = document.getElementById('anexo-size-multiple');

    if (input.files && input.files[0]) {
        // Arquivo(s) selecionado(s)
        var files = input.files;
        var totalSize = 0;

        // Calcular o tamanho total dos arquivos selecionados
        for (var i = 0; i < files.length; i++) {
            totalSize += files[i].size;
        }
        // Converter o tamanho total para megabytes
        var totalSizeMB = totalSize / (1024 * 1024);
        totalSizeMB = totalSizeMB.toFixed(2); // Arredondar para 2 casas decimais

        // Atualizar o texto com a quantidade de megabytes
        nome.innerText = "Total de " + totalSizeMB + " MB selecionados.";

        // Atualizar o rótulo para indicar sucesso
        label.innerHTML = '<i data-feather="check-circle" class="m-2"></i> Documentos anexados com sucesso!';
        label.classList.remove('border-container');
        label.classList.add('border-success', 'border', 'border-2', 'border-opacity-25');
    } else {
        // Nenhum arquivo selecionado
        nome.innerText = 'Nenhum arquivo selecionado.';
        // Atualizar o rótulo para indicar para anexar
        label.innerHTML = '<i data-feather="upload" class="m-2"></i> Clique para anexar';
        label.classList.remove('border-success', 'border', 'border-2');
        label.classList.add('border-container');
    }

    // Reativar os ícones Feather
    feather.replace();
}