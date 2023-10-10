// Obtén el área de arrastrar y soltar
var dropArea = document.getElementById('dropArea');

// Agrega eventos para prevenir el comportamiento predeterminado
dropArea.addEventListener('dragenter', preventDefault, false);
dropArea.addEventListener('dragleave', preventDefault, false);
dropArea.addEventListener('dragover', preventDefault, false);

// Configura el manejador de eventos para soltar
dropArea.addEventListener('drop', handleDrop, false);

function preventDefault(e) {
    e.preventDefault();
    e.stopPropagation();
}

function handleDrop(e) {
    e.preventDefault();
    e.stopPropagation();

    var fileList = e.dataTransfer.files;
    var ul = document.querySelector('ul');

    for (var i = 0; i < fileList.length; i++) {
        var li = document.createElement('li');
        li.textContent = fileList[i].name;
        ul.appendChild(li);
    }
}