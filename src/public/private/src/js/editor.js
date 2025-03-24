// import DOMPurify from 'dompurify';

$(document).ready(function () {
    $('.editor').summernote({
        height: 300, // Adjust height as needed
        lang: 'ru-RU', // Language setting
        fontNames: [
            'Geologica',
            'Arial',
            'Arial Black',
            'Comic Sans MS',
            'Courier New',
        ],
        fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24', '28', '32', '36', '40', '48'],
        toolbar: [
            ['style'],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture', 'link', 'video', 'table']],
            ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
        ],
        colors: [
            ['#FE8934', '#ffffff', '#000000'],
        ],
        colorsName: [
            ['Orange', 'White', 'Black'],
        ],
        // styleTags: [
        //     { title: 'Заголовок 1', tag: 'h1', className: 'progect__title', value: 'h1' },
        //     { title: 'Заголовок 2', tag: 'h2', className: 'progect__sub-title', value: 'h2' },
        //     { title: 'Заголовок 3', tag: 'h3', className: 'title-desc', value: 'h3' },
        //     { title: 'Заголовок 3_над списком', tag: 'h3', className: '  farm-service__title title-desc', value: 'h3' },
        //     { title: 'Текст', tag: 'p', className: 'item-text', value: 'p' },
        //     { title: 'Текст_альт', tag: 'p', className: 'supervision__desc', value: 'p' },
        // ],
        callbacks: {
            onImageUpload: function (files) {
                for (let i = 0; i < files.length; i++) {
                    $.upload(files[i], $(this));
                }
            },
            onPaste: function (e) {
                var bufferHTML = (e.originalEvent || e).clipboardData.getData('text/html');

                if (bufferHTML != "") {
                    var cleanHTML = DOMPurify.sanitize(bufferHTML, {
                        ALLOWED_TAGS: ['p', 'b', 'i', 'u', 'a', 'ul', 'ol', 'li'], // Разрешенные теги
                        ALLOWED_ATTR: ['href', 'target'] // Разрешенные атрибуты
                    });

                    // var tempDiv = document.createElement('div');
                    // tempDiv.innerHTML = cleanHTML;

                    // tempDiv.querySelectorAll('ul').forEach(function (ul) {
                    //     ul.classList.add('custom-ul');
                    // });
                    // tempDiv.querySelectorAll('li').forEach(function (li) {
                    //     li.classList.add('custom-li');
                    // });

                    // var updatedHTML = tempDiv.innerHTML;

                    // console.log(cleanHTML.replace(/^\<.\>&nbsp;|&nbsp;\<\/.\>$/g, ''));

                    updatedHTML = cleanHTML.trim();
                } else
                    updatedHTML = (e.originalEvent || e).clipboardData.getData('text/plain');

                e.preventDefault();
                document.execCommand('insertHTML', false, updatedHTML);
            },
            onChange: function (contents, $editable) {
                // $editable.find('ul').not('.custom-ul').each(function () {
                //     $(this).addClass('custom-ul'); // Добавляем класс для <ul>
                //     $(this).find('li').addClass('custom-li'); // Добавляем класс для <li>
                // });
            }
        }
    });


    $.upload = function (file, editor) {

        let formData = new FormData();
        formData.append('action', 'imgUpload');
        formData.append('file', file);

        $.ajax({
            method: 'POST',
            url: '/admin/ajax',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (src) {
                editor.summernote('insertImage', src);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + ' ' + errorThrown);
            }
        });
    };

    $('.variant_editor').summernote({
        height: 300, // Adjust height as needed
        lang: 'ru-RU', // Language setting
        fontNames: [
            'Geologica',
            'Arial',
            'Arial Black',
            'Comic Sans MS',
            'Courier New',
        ],
        fontSizes: ['8', '9', '10', '11', '12', '13', '14', '15', '16', '18', '20', '22', '24', '28', '32', '36', '40', '48'],
        toolbar: [
            ['style'],
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture', 'link', 'video', 'table']],
            ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
        ],
        colors: [
            ['#FE8934', '#ffffff', '#000000'],
        ],
        colorsName: [
            ['Orange', 'White', 'Black'],
        ],
        styleTags: [
            { title: 'Заголовок 3', tag: 'h3', className: 'seven_block_option_title', value: 'h3' },
            { title: 'Заголовок 4', tag: 'h4', className: 'seven_block_option_description', value: 'h4' },
            { title: 'Текст', tag: 'p', className: 'seven_block_option_text', value: 'p' },
        ],
        callbacks: {
            onImageUpload: function (files) {
                for (let i = 0; i < files.length; i++) {
                    $.upload(files[i], $(this));
                }
            },
            onPaste: function (e) {
                var bufferHTML = (e.originalEvent || e).clipboardData.getData('text/html');

                var cleanHTML = DOMPurify.sanitize(bufferHTML, {
                    ALLOWED_TAGS: ['p', 'b', 'i', 'u', 'a', 'ul', 'ol', 'li', 'div'], // Разрешенные теги
                    ALLOWED_ATTR: ['href', 'target'] // Разрешенные атрибуты
                });

                // var tempDiv = document.createElement('div');
                // tempDiv.innerHTML = cleanHTML;

                // tempDiv.querySelectorAll('ul').forEach(function (ul) {
                //     ul.classList.add('custom-ul');
                // });
                // tempDiv.querySelectorAll('li').forEach(function (li) {
                //     li.classList.add('custom-li');
                // });

                // var updatedHTML = tempDiv.innerHTML;

                let updatedHTML = cleanHTML;

                e.preventDefault();
                document.execCommand('insertHTML', false, updatedHTML);
            },
            onChange: function (contents, $editable) {
                // $editable.find('ul').not('.custom-ul').each(function () {
                //     $(this).addClass('custom-ul'); // Добавляем класс для <ul>
                //     $(this).find('li').addClass('custom-li'); // Добавляем класс для <li>
                // });
            }
        }
    });


    $.upload = function (file, editor) {

        let formData = new FormData();
        formData.append('action', 'imgUpload');
        formData.append('file', file);

        $.ajax({
            method: 'POST',
            url: '/admin/ajax',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (src) {
                editor.summernote('insertImage', src);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + ' ' + errorThrown);
            }
        });
    };

});