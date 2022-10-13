const folders = document.querySelectorAll('.js-folder');

folders.forEach(folder => {
    folder.addEventListener('dblclick', function() {
        this.style.display = 'none';
        this.nextElementSibling.style.display = 'block';
    });
});

// $.ajax({
//     url: 'folder/update',
//     type: 'POST',
//     dataType: 'json',
//     data: {
//         name: 
//     }
// }).done((res) => {

// }).fail((error) => {

// })
