const fileInput = document.getElementById('file');
        const selectedFile = document.getElementById('selectedFile');

        fileInput.addEventListener('change', function() {
            const file = fileInput.files[0];
            if (file) {
                selectedFile.textContent = `${file.name}`;
            } else {
                selectedFile.textContent = '';
            }
        });
