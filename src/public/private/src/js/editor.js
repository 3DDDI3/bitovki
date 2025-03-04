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
            ['misc', ['fullscreen', 'codeview', 'undo', 'redo', 'help']],
            ['customGroup', ['customButton']]
        ],
        styleTags: [
            { title: 'Заголовок 1', tag: 'h1', className: 'progect__title', value: 'h1' },
            { title: 'Заголовок 2', tag: 'h2', className: 'progect__sub-title', value: 'h2' },
            { title: 'Заголовок 3', tag: 'h3', className: 'title-desc', value: 'h3' },
            { title: 'Заголовок 3_над списком', tag: 'h3', className: '  farm-service__title title-desc', value: 'h3' },
            { title: 'Текст', tag: 'p', className: 'item-text', value: 'p' },
            { title: 'Текст_альт', tag: 'p', className: 'supervision__desc', value: 'p' },
        ],
        buttons: {
            customButton: function (editor) {
                let blocks = [
                    'description',
                    'text_image',
                    'comment',
                ];
                let blocks_alt = [
                    'indications',
                    'instraction_short_descripion',
                ]

                let name = $(editor.$note[0]).attr("name").replace(/_\d+$/, "");

                if (blocks_alt.includes(name)) {
                    return $.summernote.ui.button({
                        contents: '<i class="note-icon-trash"></i>',
                        tooltip: 'Убрать внешние стили',
                        click: function (button) {

                            let clearText = $(button.currentTarget).parents(".input_block").find(".editor").summernote("code").replaceAll(/(\s?style="[^"]*")|(\s?class="[^"]*")/g, "");

                            clearText = clearText.replaceAll(/\<ul\>/g, "<ul class='farm-service_alt__items'>");
                            clearText = clearText.replaceAll(/\<li\>/g, "<li class='farm-service_alt__item item-text'>");

                            $(button.currentTarget).parents(".input_block").find(".editor").summernote('code', '');
                            $(button.currentTarget).parents(".input_block").find(".editor").summernote('pasteHTML', clearText);
                        }
                    }).render();
                }

                if (blocks.includes(name))
                    return $.summernote.ui.button({
                        contents: '<i class="note-icon-trash"></i>',
                        tooltip: 'Убрать внешние стили',
                        click: function (button) {

                            let clearText = $(button.currentTarget).parents(".input_block").find(".editor").summernote("code").replaceAll(/(\s?style="[^"]*")|(\s?class="[^"]*")/g, "");

                            clearText = clearText.replaceAll(/\<ul\>/g, "<ul class='farm-service__items'>");
                            clearText = clearText.replaceAll(/\<li\>/g, "<li class='farm-service__item item-text'>");

                            $(button.currentTarget).parents(".input_block").find(".editor").summernote('code', '');
                            $(button.currentTarget).parents(".input_block").find(".editor").summernote('pasteHTML', clearText);
                        }
                    }).render();
                else
                    return $.summernote.ui.button({
                        contents: '<i class="note-icon-trash"></i>',
                        tooltip: 'Убрать внешние стили',
                        click: function (button) {

                            let clearText = $(button.currentTarget).parents(".input_block").find(".editor").summernote("code").replaceAll(/(\s?style="[^"]*")|(\s?class="[^"]*")/g, "");

                            $(button.currentTarget).parents(".input_block").find(".editor").summernote('code', '');
                            $(button.currentTarget).parents(".input_block").find(".editor").summernote('pasteHTML', clearText);
                        }
                    }).render();
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