$(document).ready(function(){
    let file_name = document.getElementById('file_name');
    let file_input = document.getElementById('upload-file');

    file_input.addEventListener('change', function(e) {
        var fileList = event.target.files[0].name;
        file_name.textContent = fileList;
    });

});