$(function () {

    let croppie;

    $(".uploader__items").sortable({
        update: function (event, ui) {
            let sortableArray = new Map()
            Array.from($(event.target).find(".uploader__item.ui-sortable-handle")).reverse().forEach((el, index) => {
                if (!$(el).hasClass("uploader__item_invisible"))
                    sortableArray.set($(el).find("svg.delete").attr("data-block-file-id"), ++index);
            });

            $.ajax({
                type: "PATCH",
                url: "/api/blocks/swap-files",
                data: Object.fromEntries(sortableArray),
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
        }
    });

    $(".chosen-choices").sortable({
    });

    $(".accordion").on("click", ".accordion__header svg", function (e) {
        if ($(this).parents(".accordion__wrapper").find(".accordion__block").css("display") != "none") {

            $(this).css("transform", "rotate(0deg)");
            $(this).parents(".accordion__wrapper").find(".accordion__block").hide("slow");
        }
        else {
            $(this).css("transform", "rotate(180deg)");
            $(this).parents(".accordion__wrapper").find(".accordion__block").show("slow");
        }
    })

    $(".text-image-block").on("click", ".text-image-block__swap", function () {
        if ($(this).parent().css("flex-direction") == "row") {
            $(this).parent().css("flex-direction", "row-reverse");
            $.ajax({
                type: "PATCH",
                url: "/api/images/change-sequence",
                data: {
                    block_id: $(this).attr("data-block-id"),
                    sequence: 1,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
        }
        else {
            $(this).parent().css("flex-direction", "row");
            $.ajax({
                type: "PATCH",
                url: "/api/images/change-sequence",
                data: {
                    block_id: $(this).attr("data-block-id"),
                    sequence: 0,
                },
                dataType: "json",
                success: function (response) {
                    console.log(response);
                }
            });
        }
    });

    $(".list-button__header").on("click", function () {
        if ($(this).parent().find(".list-button__list").hasClass("list_hidden")) {
            $(this).parent().find(".list-button__list").removeClass("list_hidden")
            $(this).parent().find(".list-button__list").css("display", "flex").hide().fadeIn(200);
        }
        else {
            $(this).parent().find(".list-button__list").addClass("list_hidden");
            $(this).parent().find(".list-button__list").hide();
        }
    });

    $(".list-button .list__item").on("click", function () {
        /**
         * @todo реализовать создание записи с создаваемым блоком и получение ее id для дальнейшей передеачи ее в имя (*_id) создаваемого блока
         */
        $(this).parent().addClass("list_hidden");
        $(this).parent().hide();

        let newBlock = null, data = null;

        Array.from($(".template .accordion__item")).forEach(el => {
            if ($(el).data("block-type-id") == $(this).data("id")) {
                newBlock = $(el).clone();
                data = {
                    "block_type_id": $(el).data("block-type-id"),
                    "page_id": $(el).data("page-id"),
                };
            }
        })

        $(newBlock).find(".chosen-container").remove();

        $(newBlock).find(".chosen").chosen({});
        $(newBlock).find(".chosen-choices").sortable({
        });

        if ($(newBlock).find("select.select").length > 0) {
            $(newBlock).find(".select2.select2-container").remove();
            $(newBlock).find("select.select").select2({
            });
            $(newBlock).find("select.select").on("select2:select", function (evt) {
                var element = evt.params.data.element;
                var $element = $(element);

                $element.detach();
                $(this).append($element);
                $(this).trigger("change");
            });
        }

        $(newBlock).find(".note-editor").remove();

        $.ajax({
            type: "POST",
            url: "/api/blocks",
            data: data,
            context: this,
            dataType: "json",
            success: function (response) {
                console.log(response);

                $(newBlock).find("textarea.editor").attr("name", `${$(newBlock).find("textarea.editor").attr("name")}_${response.blocks.id}`);
                $(newBlock).attr("data-block-id", response.blocks.id);
                $(newBlock).find(".uploader input[type='file']").attr("data-block-id", response.blocks.id);
                if ($(newBlock).find(".comment-wrapper div .input_block input[type='text']").length > 0)
                    $(newBlock).find(".comment-wrapper div .input_block input[type='text']").attr("name", `${$(newBlock).find(".comment-wrapper div .input_block input[type='text']").attr("name")}_${response.blocks.id}`);
                if ($(newBlock).find("select[name='personal_block']").length > 0) {
                    $(newBlock).find("select[name='personal_block']").attr("data-block-id", response.blocks.id);
                    $(newBlock).find("select[name='personal_block']").attr("name", `${$(newBlock).find("select[name='personal_block']").attr("name")}_${response.blocks.id}`);
                }

                if ($(newBlock).find(".uploader__header").length > 0) {
                    $(newBlock).find(".uploader__header").attr("for", `${$(newBlock).find(".uploader__header").attr("for")}_${response.blocks.id}`);
                    $(newBlock).find("input[type='file']").attr("id", `${$(newBlock).find("input[type='file']").attr("id")}_${response.blocks.id}`);
                }

                if ($(newBlock).find(".menu-block__create").length > 0) {
                    $(newBlock).find(".menu-block__create").attr("data-block-id", response.blocks.id);
                }
            }
        });

        $(newBlock).find("textarea.editor").summernote({
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
                ['customGroup', ['customButton']],
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
            },
            callbacks: {
                onImageUpload: function (files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i], $(this));
                    }
                },
                onMediaDelete: function (target, editor) {
                    let block_id = $(editor).parents(".input_block").find("textarea.editor").attr("name").match(/_(\d+)/)[1];
                    let id = "editor_image";
                    let src = $(target).attr("src");

                    $.ajax({
                        type: "DELETE",
                        url: "/api/blocks",
                        data: {
                            block_id: block_id,
                            id: id,
                            src: src,
                        },
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            },
        });

        $(".accordion").append(newBlock);
    });

    $(".sorting-button").on("click", function () {
        if ($(".accordion.ui-sortable").length == 0) {
            $(this).text("Запретить сортировку");
            $(".accordion").sortable({
                cursor: "grabbing",
                placeholder: "accordion__item_active",
                change: function (event, ui) {
                },
                start: function (event, ui) {
                    ui.placeholder.height(ui.item.innerHeight());
                    $(ui.item).css("border-bottom", "unset");
                },
                stop: function (event, ui) {
                    $(ui.item).css("border-bottom", "1px solid #E6E6E6");
                },
                update: function (event, ui) {
                    let soratbleArray = new Map();
                    let index = $(event.target).find(".accordion__item").length;

                    Array.from($(event.target).find(".accordion__item")).forEach(el => {
                        if ($(el).attr("data-block-id") != undefined) {
                            soratbleArray.set($(el).attr("data-block-id"), --index);
                        }
                    });

                    $.ajax({
                        type: "PATCH",
                        url: "/api/blocks/swap",
                        data: Object.fromEntries(soratbleArray),
                        dataType: "json",
                        success: function (response) {
                        }
                    });
                }
            });
        }
        else {
            $(this).text("Разрешить сортировку");
            $(".accordion").sortable("destroy");
        }
    });

    $.upload = function (file, editor) {

        let block_id = $(editor).parents(".input_block").find("textarea.editor").attr("name").match(/_(\d+)/)[1];

        let formData = new FormData();
        formData.append('block_id', block_id);
        formData.append('id', 'editor_image');
        formData.append('file', file);

        $.ajax({
            method: 'POST',
            url: '/api/blocks',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function (src) {
                editor.summernote('insertImage', `/public/${src.path}`);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error(textStatus + ' ' + errorThrown);
            }
        });
    };

    $("div.accordion").on("change", ".uploader input[type='file']", function (e) {

        let formData = new FormData();

        Array.from(this.files).forEach((file, index) => {
            formData.append(`file${parseInt(index) + 1}`, file);
        });

        if ($(this).data("page-id") != undefined)
            formData.append('page_id', $(this).data("page-id"));
        if ($(this).data("block-type-id") != undefined)
            formData.append('block_type_id', $(this).data("block-type-id"));

        if ($("input[name='object_id']").val() == '')
            formData.append('id', $(this).attr("id").replace(/_\d+$/, ""));
        else formData.append('id', $("input[name='object_id']").val());

        if ($(this).data("block-id") != undefined)
            formData.append("block_id", $(this).data("block-id"));

        let file = e.target.files[0];

        if (file && $(this).attr("data-width") > 0) {

            fileName = file.name;
            $(this).parents(".uploader").find(".uploader__header").css("display", "none");
            $(this).parents(".uploader").find(".uploader_demo").css("display", "block");
            $this = $(this);
            const reader = new FileReader();

            // Определяем, что делать, когда файл загружен
            reader.onload = function (e) {
                const imageUrl = e.target.result; // Получаем URL изображения
                $('#image-preview').attr('src', imageUrl); // Например, для отображения превью

                croppie = $($this).parents(".uploader").find(".uploader_demo").croppie({
                    url: imageUrl,
                    viewport: {
                        width: parseInt($($this).attr("data-width")),
                        height: parseInt($($this).attr("data-height")),
                        type: 'square'
                    },
                    enableExif: true,
                    boundary: {
                        width: parseInt($($this).attr("data-width")) + 150,
                        height: parseInt($($this).attr("data-height")) + 150,
                    },
                    quality: 1,
                });

            };
            reader.readAsDataURL(file); // Читаем файл как Data URL
            return;
        }

        $.ajax({
            type: "POST",
            url: "/api/images",
            cache: false,
            context: this,
            contentType: false,
            processData: false,
            data: formData,
            dataType: 'json',
            success: function (response) {

                let newBlock = null;

                switch ($(this).attr("data-block-id").replace(/_\d+$/, "")) {
                    case "item_images":
                        $("input[name='object_id']").val(response.images[0].object_id);
                        Array.from(response.images).forEach(el => {
                            newBlock = $($(this).parents(".uploader").find(".uploader__item")[0]).clone();
                            $(newBlock).find(".delete").attr("data-block-file-id", el.id);
                            $(newBlock).find(".delete").attr("data-block-type-id", el.object_id);
                            $(newBlock).find("p").text(el.name);
                            $(newBlock).removeClass("uploader__item_invisible");
                            $(this).parents(".uploader").find(".uploader__items").append(newBlock);
                        });
                        break;
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                /**
                 * @todo Сделать реализацию ошибки
                 */
            }
        });

        $(this).val(""); // для возможности загружать повторно этот же файл
    });

    $(".accordion").on("click", ".uploader svg.delete", function () {
        $.ajax({
            type: "DELETE",
            url: "/api/images",
            context: this,
            data: {
                image_id: $(this).data("block-file-id"),
                id: $(this).parents(".uploader").find(".uploader__file").attr("id"),
            },
            dataType: "json",
            success: function (response) {
                $(this).parents(".uploader__item").remove();
            }
        });
    });

    $(".accordion").on("click", ".uploader svg.icon-delete", function () {
        $.ajax({
            type: "DELETE",
            url: "/api/blocks",
            context: this,
            data: {
                block_file_id: $(this).data("block-file-id"),
                id: $(this).parents(".uploader").find("input[type='file']").attr("id").replace(/_\d+/, ""),
                block_type_id: $(this).data("block-type-id"),
            },
            dataType: "json",
            success: function (response) {
                $(this).parents(".uploader").removeClass("uploader_hidden");
                $(this).parents(".uploader").find(".uploader__header").css({
                    "background-repeat": "unset",
                    "background-image": "unset",
                    "background-posiiton": "unset",
                    "border-color": "royalblue",
                });
                $(this).parents(".uploader").find("input[type='file']").prop("disabled", false);
                $(this).parents(".uploader").find(".uploader__header").css("cursor", "pointer");
            }
        });
    });

    $(".accordion").on("click", ".accordion-item__delete", function () {
        $.ajax({
            type: "DELETE",
            context: this,
            url: "/api/blocks",
            data: { block_id: $(this).parents(".accordion__item").data("block-id") },
            dataType: "json",
            success: function (response) {
                $(this).parents(".accordion__item").remove();
            }
        });
    });

    $(".admin_edit_block").on("change", ".uploader-alt input[type='file']", function (e) {

        const file = e.target.files[0]; // Получаем первый файл из выбранного списка

        if (file && $(this).attr("data-width") > 0) {

            fileName = file.name;
            $(this).parents(".uploader-alt").find(".uploader-alt__header").css("display", "none");
            $(this).parents(".uploader-alt").find(".uploader-alt_demo").css("display", "block");
            $this = $(this);
            const reader = new FileReader();

            // Определяем, что делать, когда файл загружен
            reader.onload = function (e) {
                const imageUrl = e.target.result; // Получаем URL изображения
                $('#image-preview').attr('src', imageUrl); // Например, для отображения превью

                croppie = $($this).parents(".uploader-alt").find(".uploader-alt_demo").croppie({
                    url: imageUrl,
                    viewport: {
                        width: parseInt($($this).attr("data-width")),
                        height: parseInt($($this).attr("data-height")),
                        type: 'square'
                    },
                    enableExif: true,
                    boundary: {
                        width: parseInt($($this).attr("data-width")) + 150,
                        height: parseInt($($this).attr("data-height")) + 150,
                    },
                    quality: 1,
                });

            };
            reader.readAsDataURL(file); // Читаем файл как Data URL

        }
        else {
            let formData = new FormData();

            Array.from(this.files).forEach((file, index) => {
                formData.append(`file${parseInt(index) + 1}`, file);
            });

            formData.append('type', $(this).attr("id"));

            if ($(this).data("id") != undefined)
                formData.append('id', $("input[name='object_id']").val());

            $.ajax({
                type: "POST",
                url: "/api/images",
                data: formData,
                cache: false,
                context: this,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    $("input[name='object_id']").val(response.id);

                    $(this).parents(".uploader-alt").addClass("uploader-alt_hidden");
                    $(this).parents(".uploader-alt").find(".uploader-alt__header").css({
                        "border-color": "transparent",
                        "background-image": `url("/media/${response.path}")`,
                        "cursor": "default",
                        "background-position": "center center",
                        "background-size": "contain",
                        "background-repeat": "no-repeat"
                    });
                    $(this).attr("data-id", response.id);
                }
            });

            $(this).val(""); //очистка массива files
        }
    });

    $(".uploader-alt__save").on("click", function () {
        const $this = $(this);

        croppie.croppie('result', {
            type: 'blob',
            // size: 'origin',
            quality: 1,
            size: {
                width: parseInt($($this).parents(".uploader-alt").find(".uploader-alt__file").attr("data-width")),
                height: parseInt($($this).parents(".uploader-alt").find(".uploader-alt__file").attr("data-height")),
            }
        }).then(function (response) {
            console.log(response);

            let formData = new FormData();

            formData.append('file1', response, fileName);

            formData.append('type', $($this).parents(".uploader-alt").find(".uploader-alt__file").attr("id").replace(/_\d+$/, ""));

            if ($($this).parents(".uploader-alt").find(".uploader-alt__file").data("id") != undefined)
                formData.append('id', $($this).parents(".uploader-alt").find(".uploader-alt__file").attr("data-id").replace(/_\d+$/, ""));

            $.ajax({
                type: "POST",
                url: "/api/images",
                data: formData,
                cache: false,
                context: this,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    $($this).parents(".uploader-alt_demo").css("display", "none");
                    $($this).parents(".uploader-alt").find(".uploader-alt__header").css("display", "flex");

                    if ($($this).parents(".uploader-alt").find(".uploader-alt__items").length > 0) {
                        let newBlock = $($this).parents(".uploader-alt").find(".uploader-alt__item").clone();
                        $(newBlock).find("p").text(response.name);
                        $(newBlock).find(".delete").attr("data-id", response.id);
                        $(newBlock).removeClass("uploader-alt__item_invisible");
                        $($this).parents(".uploader-alt").find(".uploader-alt__items").append(newBlock);
                    } else {
                        $($this).parents(".uploader-alt").addClass("uploader-alt_hidden");
                        $($this).parents(".uploader-alt").find(".uploader-alt__header").css({
                            "border-color": "transparent",
                            "background-image": `url("/public/${response.path}")`,
                            "cursor": "default",
                            "background-position": "center center",
                            "background-size": "contain",
                            "background-repeat": "no-repeat"
                        });
                        $($this).attr("data-id", response.id);
                    }

                    switch ($($this).parents(".uploader-alt").find(".uploader-alt__file").attr("id")) {
                        case "medication":
                            Array.from($($this).parents(".accordion").find("input[type='text']")).forEach(el => {
                                if ($(el).attr("class") == "")
                                    $(el).attr("name", `${$(el).attr("name")}_${response.id}`);
                            });

                            Array.from($($this).parents(".accordion").find("textarea")).forEach(el => {
                                $(el).attr("name", `${$(el).attr("name")}_${response.id}`);
                            });

                            $("#medication-file").attr("data-id", response.id);
                            break;

                        case "medication-file":
                            Array.from($($this).parents(".accordion").find("input[type='text']")).forEach(el => {
                                if ($(el).attr("class") == "")
                                    $(el).attr("name", `${$(el).attr("name")}_${response.id}`);
                            });

                            Array.from($($this).parents(".accordion").find("textarea")).forEach(el => {
                                $(el).attr("name", `${$(el).attr("name")}_${response.id}`);
                            });

                            $("#medication").attr("data-id", response.id);

                            break;

                        case "map-image":
                            $($this).prop("disabled", true);
                            break;

                        case "map-schema":
                            $($this).prop("disabled", true);
                            $($this).parents(".uploader-alt").find(".uploader-alt__header").css("cursor", "default");
                            break;

                        case "medication-preview":
                            $("input[name='object_id']").val(response.object_id);
                            $($this).attr("data-id", response.id);
                            $("#medication-character").attr("data-id", response.object_id);
                            $("#medication-file").attr("data-block-id", response.object_id);
                            $("#description-file").attr("data-id", response.object_id);
                            break;

                        case "preview-news-image":
                            $("input[name='object_id']").val(response.object_id);
                            break;

                        case "person":
                            $("input[name='object_id']").val(response.id);
                            break;

                        case "medication-character":
                            $($this).prop("disabled", true);
                            $($this).attr("data-id", response.object_id);
                            $("input[name='object_id']").val(response.id);
                            $("#medication-file").attr("data-block-id", response.object_id);
                            $("#medication-preview").attr("data-id", response.id);
                            $("#description-file").attr("data-id", response.object_id);
                            break

                        case "description-file":
                            $($this).prop("disabled", true);
                            $("input[name='object_id']").val(response.id);
                            $($this).attr("data-id", response.object_id);
                            $("#medication-character").attr("data-id", response.object_id);
                            $("#medication-preview").attr("data-id", response.id);
                            $("#medication-file").attr("data-block-id", response.object_id);
                            break;
                    }
                }
            });

            $($this).parents(".uploader-alt").find(".uploader-alt__file").val("");

            croppie.croppie('destroy');
        }).catch(function (error) {
        });
    });

    $(".uploader-alt__exit").on("click", function () {
        croppie.croppie('destroy');
        $(this).parents(".uploader-alt_demo").css("display", "none");
        $(this).parents(".uploader-alt").find(".uploader-alt__header").css("display", "flex");
    });

    $(".uploader__save").on("click", function () {
        const $this = $(this);

        croppie.croppie('result', {
            type: 'blob',
            // size: 'origin',
            quality: 1,
            size: {
                width: parseInt($($this).parents(".uploader").find(".uploader__file").attr("data-width")),
                height: parseInt($($this).parents(".uploader").find(".uploader__file").attr("data-height")),
            }
        }).then(function (response) {
            let formData = new FormData();

            formData.append('file1', response, fileName);

            formData.append('type', $($this).parents(".uploader").find(".uploader__file").attr("id").replace(/_\d+$/, ""));

            if ($($this).parents(".uploader").find(".uploader__file").attr("data-block-id") != "")
                formData.append("block_id", $($this).parents(".uploader").find(".uploader__file").attr("data-block-id"));

            if ($($this).parents(".uploader").find(".uploader__file").data("id") != undefined)
                formData.append('id', $($this).parents(".uploader").find(".uploader__file").attr("data-id").replace(/_\d+$/, ""));

            $.ajax({
                type: "POST",
                url: "/api/blocks",
                data: formData,
                cache: false,
                context: this,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (response) {
                    switch ($($this).parents(".uploader").find(".uploader__file").attr("id").replace(/_\d+$/, "")) {
                        case "files":
                            if ($($this).data("block_id") == undefined) {
                                $($this).attr("data-block-id", response.blocks[0].block_id);
                                $($this).parents(".accorion__item").attr("data-block-id", response.blocks[0].block_id);
                            }

                            newBlock = $($($this).parents(".uploader").find(".uploader__item")[0]).clone();
                            Array.from(response.blocks).forEach(el => {
                                $(newBlock).find(".delete").attr("data-block-file-id", el.id);
                                $(newBlock).find(".delete").attr("data-block-type-id", el.block_type_id);
                                $(newBlock).find("p").text(el.name);
                                $(newBlock).removeClass("uploader__item_invisible");
                                $($this).parents(".uploader").find(".uploader__items").append(newBlock);

                            });
                            break;

                        case "medication-file":

                            newBlock = $($($this).parents(".uploader").find(".uploader__item")[0]).clone();
                            Array.from(response.blocks).forEach(el => {
                                $(newBlock).find(".delete").attr("data-block-file-id", el.id);
                                $(newBlock).find(".delete").attr("data-block-type-id", el.block_type_id);
                                $(newBlock).find("p").text(el.name);
                                $(newBlock).removeClass("uploader__item_invisible");
                                $($this).parents(".uploader").find(".uploader__items").append(newBlock);
                            });

                            $("input[name='object_id']").val(response.blocks[0].object_id);
                            $($this).attr("data-block-id", response.blocks[0].object_id);
                            $("#medication-preview").attr("data-id", response.blocks[0].object_id);
                            $("#medication-character").attr("data-id", response.blocks[0].object_id);
                            $("#medication-file").attr("data-block-id", response.blocks[0].object_id);
                            $("#description-file").attr("data-id", response.blocks[0].object_id);

                            break;

                        case "comment-upload":
                            $($this).parents(".uploader").addClass("uploader_hidden");
                            $($this).parents(".uploader").find("label").css({
                                "background-repeat": "no-repeat",
                                "background-image": `url(/public/${response.blocks[0].path})`,
                                "background-size": "contain",
                                "background-position": "center",
                                "border-color": "transparent"
                            });

                            $($this).parents(".uploader").find("svg.icon-delete").attr("data-block-file-id", response.blocks[0].id);
                            $($this).parents(".uploader").find("svg.icon-delete").attr("data-block-type-id", response.blocks[0].block_type_id);

                            $($this).parents(".uploader").parent().find(".input_block").find("textarea").attr("name", `${$($this).parents(".uploader").parent().find(".input_block").find("textarea").attr("name")}${response.blocks[0].block_id}`);

                            $($this).parents(".uploader").find("input[type='file']").prop("disabled", true);
                            $($this).parents(".uploader").find(".uploader__header").css("cursor", "default");
                            $($this).parents(".uploader").find(".uploader__header").css("display", "flex");
                            $($this).parents(".uploader").find(".uploader_demo").css("display", "none");

                            break;

                        case "preview-news-image":
                            $($this).parents(".uploader").addClass("uploader_hidden");
                            $($this).parents(".uploader").find("label").css({
                                "background-repeat": "no-repeat",
                                "background-image": `url(/public/${response.path})`,
                                "background-size": "contain",
                                "background-position": "center",
                                "border-color": "transparent"
                            });

                            $($this).parents(".uploader").find("svg.icon-delete").attr("data-block-file-id", response.id);

                            $($this).parents(".uploader").find("input[type='file']").prop("disabled", true);
                            $($this).parents(".uploader").find(".uploader__header").css("cursor", "default");
                            $($this).parents(".uploader").find(".uploader__header").css("display", "flex");
                            $($this).parents(".uploader").find(".uploader_demo").css("display", "none");

                            $("input[name='object_id']").val(response.object_id);

                            break;

                        case "text-image-uploader":
                            $($this).parents(".uploader").addClass("uploader_hidden");
                            $($this).parents(".uploader").find("label").css({
                                "background-repeat": "no-repeat",
                                "background-image": `url(/public/${response.blocks[0].path})`,
                                "background-size": "contain",
                                "background-position": "center",
                                "border-color": "transparent"
                            });

                            $($this).parents(".uploader").find("svg.icon-delete").attr("data-block-file-id", response.blocks[0].id);

                            $($this).parents(".uploader").find("input[type='file']").prop("disabled", true);
                            $($this).parents(".uploader").find(".uploader__header").css("cursor", "default");
                            $($this).parents(".uploader").find(".uploader__header").css("display", "flex");
                            $($this).parents(".uploader").find(".uploader_demo").css("display", "none");
                            break;

                        case "image-block-uploader":
                            $($this).parents(".uploader").addClass("uploader_hidden");
                            $($this).parents(".uploader").find("label").css({
                                "background-repeat": "no-repeat",
                                "background-image": `url(/public/${response.blocks[0].path})`,
                                "background-size": "contain",
                                "background-position": "center",
                                "border-color": "transparent"
                            });

                            $($this).parents(".uploader").find("svg.icon-delete").attr("data-block-file-id", response.blocks[0].id);

                            $($this).parents(".uploader").find("input[type='file']").prop("disabled", true);
                            $($this).parents(".uploader").find(".uploader__header").css("cursor", "default");
                            $($this).parents(".uploader").find(".uploader__header").css("display", "flex");
                            $($this).parents(".uploader").find(".uploader_demo").css("display", "none");

                            $("input[name='object_id']").val(response.blocks[0].object_id);
                            $($this).attr("data-block-id", response.blocks[0].object_id);
                            $("#medication-preview").attr("data-id", response.blocks[0].object_id);
                            $("input[name='object_id']").val(response.blocks[0].object_id);
                            $($this).parents(".uploader").find(".uploader__header").css("display", "flex");
                            $($this).parents(".uploader").find(".uploader_demo").css("display", "none");

                            break;

                        case "image-main-block-uploader":
                            $($this).parents(".uploader").addClass("uploader_hidden");
                            $($this).parents(".uploader").find("label").css({
                                "background-repeat": "no-repeat",
                                "background-image": `url(/public/${response.blocks[0].path})`,
                                "background-size": "contain",
                                "background-position": "center",
                                "border-color": "transparent"
                            });

                            $($this).parents(".uploader").find("svg.icon-delete").attr("data-block-file-id", response.blocks[0].id);

                            $($this).parents(".uploader").find("input[type='file']").prop("disabled", true);
                            $($this).parents(".uploader").find(".uploader__header").css("cursor", "default");
                            $($this).parents(".uploader").find(".uploader__header").css("display", "flex");
                            $($this).parents(".uploader").find(".uploader_demo").css("display", "none");

                            $("input[name='object_id']").val(response.object_id);
                            $("#medication-preview").attr("data-id", response.blocks[0].object_id);

                            break;
                    }
                }
            });

            $($this).parents(".uploader").find(".uploader__file").val("");

            croppie.croppie('destroy');
        }).catch(function (error) {
        });
    });

    $(".uploader__exit").on("click", function () {
        croppie.croppie('destroy');
        $(this).parents(".uploader_demo").css("display", "none");
        $(this).parents(".uploader").find(".uploader__header").css("display", "flex");
    })

    $(".uploader-alt").on("click", "svg.delete", function () {
        $.ajax({
            type: "DELETE",
            url: "/api/images",
            context: this,
            data: {
                id: $(this).data("id"),
                type: $(this).parents(".uploader-alt").find("input[type='file']").attr("id")
            },
            dataType: "json",
            success: function (response) {
                switch ($(this).parents(".uploader-alt").find("input[type='file']").attr("id")) {
                    case "map-schema":
                        $(this).parents(".uploader-alt").find("input[type='file']").prop("disabled", false);
                        $(this).parents(".uploader-alt").find(".uploader-alt__header").css("cursor", "pointer");
                        break;

                    case "medication-character":
                        $(this).parents(".uploader-alt").find("input[type='file']").prop("disabled", false);
                        $(this).parents(".uploader-alt").find(".uploader-alt__header").css("cursor", "pointer");
                        break;

                    case "requisites":
                        $(this).parents(".uploader-alt").find("input[type='file']").prop("disabled", false);
                        $(this).parents(".uploader-alt").find(".uploader-alt__header").css("cursor", "pointer");
                        break;
                }
                if ($(this).parents(".uploader-alt").find(".uploader-alt__items").length > 0) {
                    $(this).parents(".uploader-alt__item").remove();
                    $(this).parents(".uploader-alt").find("input[type='file']").prop("disabled", false);
                }
                else {
                    $(this).parents(".uploader-alt").removeClass("uploader-alt_hidden");
                    $(this).parents(".uploader-alt").find(".uploader-alt__header").css({
                        "background-repeat": "unset",
                        "background-image": "unset",
                        "background-posiiton": "unset",
                        "border-color": "royalblue",
                        "cursor": "cursor",
                    });
                    $(this).parents(".uploader-alt").find("input[type='file']").prop("disabled", false);
                    $(this).parents(".uploader-alt").find(".uploader-alt__header").css("cursor", "pointer");
                }

            }
        });
    });

    $(".admin_edit_block").on("click", ".uploader-alt svg.icon-delete", function () {
        $.ajax({
            type: "DELETE",
            url: "/api/images",
            context: this,
            data: {
                id: $("input[name='object_id']").val(),
                type: $(this).parents(".uploader-alt").find("input[type='file']").attr("id").replace(/_\d+$/, ""),
            },
            dataType: "json",
            success: function (response) {
                if ($(this).parents(".uploader-alt").find(".uploader-alt__items").length > 0) {
                    $(this).parents(".uploader-alt__item").remove();
                }
                else {
                    $(this).parents(".uploader-alt").removeClass("uploader-alt_hidden");
                    $(this).parents(".uploader-alt").find(".uploader-alt__header").css({
                        "background-repeat": "unset",
                        "background-image": "unset",
                        "background-posiiton": "unset",
                        "border-color": "royalblue",
                    });
                    $(this).parents(".uploader-alt").find("input[type='file']").prop("disabled", false);
                    $(this).parents(".uploader-alt").find(".uploader-alt__header").css("cursor", "pointer");
                }
            }
        });
    });


    $(function () {
        $(".accordion .select").select2({
        });

        $(".accordion .select").on("select2:select", function (evt) {
            var element = evt.params.data.element;
            var $element = $(element);

            $element.detach();
            $(this).append($element);
            $(this).trigger("change");
        });

        $(".accordion").on("select2:select", ".people-block .select", function (e) {
            $.ajax({
                type: "POST",
                url: "/api/personal",
                data: {
                    block_id: $(this).data("block-id"),
                    personal: e.params.data.text,
                },
                dataType: "json",
                success: function (response) {
                    console.log(1);
                }
            });
        });

        $(".accordion").on("select2:unselect", ".people-block .select", function (e) {
            $.ajax({
                type: "DELETE",
                url: "/api/personal",
                data: {
                    block_id: $(this).data("block-id"),
                    personal: e.params.data.text,
                },
                dataType: "json",
                success: function (response) {
                    console.log(1);
                }
            });
        });
    });

    $(".accordion").on("click", ".menu-block__delete", function (e) {
        e.preventDefault();

        $.ajax({
            type: "DELETE",
            url: "/api/blocks",
            data: {
                block_id: $(this).data("block-id"),
                block_type_id: $(this).data('block-type-id'),
            },
            dataType: "json",
            context: this,
            success: function (response) {
                $(this).parents(".menu-block__item").remove();
            }
        });

    });

    $(".accordion").on("click", ".menu-block__create", function (e) {
        e.preventDefault();

        let data = {
            block_type_id: $(this).data("block-type-id"),
            block_id: $(this).data("block-id"),
            page_id: $(this).data("page-id"),
        };

        $.ajax({
            type: "POST",
            url: "/api/blocks",
            data: data,
            dataType: "json",
            context: this,
            success: function (response) {
                let newBlock = $(this).parents(".menu-block").find(".menu-block__item_hidden").clone();
                $(newBlock).find("input[name='menu_title']").attr("name", `${$(newBlock).find("input[name='menu_title']").attr("name")}_${response.blocks.id}`);
                $(newBlock).find("input[name='menu_url']").attr("name", `${$(newBlock).find("input[name='menu_url']").attr("name")}_${response.blocks.id}`);
                $(newBlock).find(".menu-block__delete").attr("data-block-id", response.blocks.id);
                $(newBlock).removeClass("menu-block__item_hidden");
                $(this).parents(".menu-block").find(".block-wrapper").append(newBlock);
            }
        });
    });

    $(".phase__create").on("click", function (e) {
        e.preventDefault();
        let newBlock = $(this).parents(".accordion__block").find(".phase").eq(0).clone();

        $.ajax({
            type: "POST",
            url: "/api/researches/create",
            data: { medication_id: $("input[name='object_id']").val() },
            dataType: "json",
            context: this,
            success: function (response) {
                $(newBlock).find("textarea.editor").attr("name", `${$(newBlock).find("textarea.editor").attr("name")}_${response[0].id}`);
                Array.from($(newBlock).find("input[type='text']")).forEach(el => {
                    $(el).attr("name", `${$(el).attr("name")}_${response[0].id}`);
                });
                Array.from($(newBlock).find("textarea[type='text']")).forEach(el => {
                    $(el).attr("name", `${$(el).attr("name")}_${response[0].id}`);
                });
                $(newBlock).find(".phase__delete").attr("data-block-id", response[0].id);

                $("input[name='object_id']").val(response[0].object_id);
                $("#medication-preview").attr("data-id", response[0].object_id);
                $("#medication-character").attr("data-id", response[0].object_id);
                $("#medication-file").attr("data-block-id", response[0].object_id);
                $("#description-file").attr("data-id", response[0].object_id);
            }
        });

        $(newBlock).find(".note-editor").remove();

        $(newBlock).find("textarea.editor").summernote({
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
            },
            callbacks: {
                onImageUpload: function (files) {
                    for (let i = 0; i < files.length; i++) {
                        $.upload(files[i], $(this));
                    }
                },
                onMediaDelete: function (target, editor) {
                    let block_id = $(editor).parents(".input_block").find("textarea.editor").attr("name").match(/_(\d+)/)[1];
                    let id = "editor_image";
                    let src = $(target).attr("src");

                    $.ajax({
                        type: "DELETE",
                        url: "/api/blocks",
                        data: {
                            block_id: block_id,
                            id: id,
                            src: src,
                        },
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
            },
        });

        $(newBlock).css("display", "flex");

        $(this).parents(".accordion__block").find(".phases").append(newBlock);
    });

    $(".phases").on("click", "svg.phase__delete", function () {
        $.ajax({
            type: "DELETE",
            url: "/api/researches/delete",
            data: { medication_id: $(this).attr("data-block-id") },
            dataType: "json",
            context: this,
            success: function (response) {
                $(this).parents(".phase").remove();
            }
        });
    });

    $(".list__update").on("click", function (e) {
        e.preventDefault();

        let newBlock = $(this).parents(".list-block").find(".item").eq(0).clone();

        $.ajax({
            type: "POST",
            url: "/api/main-list/create",
            data: { id: $(this).attr("data-id") },
            dataType: "json",
            success: function (response) {
                $(newBlock).find("textarea[type='text']").attr("name", `${$(newBlock).find("textarea[type='text']").attr("name")}_${response.id}`);
            }
        });

        $(newBlock).css("display", "flex");

        $(this).parents(".block__row").find(".list").append(newBlock);
    });

    $(".list-block").on("click", ".list__delete", function (e) {
        e.preventDefault();

        $.ajax({
            type: "DELETE",
            url: "/api/main-list/delete",
            data: { id: $(this).attr("data-id") },
            dataType: "json",
            context: this,
            success: function (response) {
                $(this).parents(".item").remove();
            }
        });


    });
});

$(".video-uploader__file").on("change", function () {
    let formData = new FormData();

    formData.append(`video`, this.files[0]);

    let $this = $(this);

    $.ajax({
        type: "POST",
        url: "/api/video",
        data: formData,
        contentType: false,
        cache: false,
        context: this,
        processData: false,
        dataType: "json",
        xhr: function () {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener('progress', function (event) {
                if (event.lengthComputable) {
                    $($this).parents(".video-uploader").find(".progressbar").css("display", "flex");
                    var percentComplete = (event.loaded / event.total) * 100;
                    $($this).parents(".video-uploader").find('#video-uploader_prograssbar').val(percentComplete);
                    $($this).parents(".video-uploader").find('.progressbar__text').text(`${(parseInt(event.loaded) / 1024 / 1024).toFixed(2)}/${(parseInt(event.total) / 1024 / 1024).toFixed(2)} МБ`);
                }
            });
            return xhr;
        },
        success: function (response) {
            $($this).parents(".video-uploader").find(".progressbar").css("display", "none");
            $($this).parents(".video-uploader").find(".video-uploader__item.video-uploader__item_invisible p").text(response.video);
            $($this).parents(".video-uploader").find(".video-uploader__item.video-uploader__item_invisible").removeClass("video-uploader__item_invisible");
            $($this).parents(".video-uploader").find(".video-uploader__items").css("display", "flex")
            $($this).prop("disabled", true);
            $($this).css("cursor", "default");
        }
    });
});

$(".social-network__delete").on("click", function (e) {
    e.preventDefault();

    $.ajax({
        type: "DELETE",
        url: "/api/social-network",
        dataType: "json",
        data: {
            block_id: $(this).data("block-id"),
        },
        context: this,
        success: function (response) {
            $(this).parents(".social-network").remove();
        }
    });
})

$(".social-network__create").on("click", function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "/api/social-network",
        dataType: "json",
        context: this,
        success: function (response) {
            let newBlock = $(this).parents("div").find(".social-network").eq(0).clone();
            $(newBlock).css("display", "flex");
            $(newBlock).find(".uploader-alt__file").attr("data-id", response.id);
            $(newBlock).find("input[type='text']").attr("name", `${$(newBlock).find("input[type='text']").attr("name")}_${response.id}`);
            $(newBlock).find(".social-network__delete").attr("data-block-id", response.id);
            $(newBlock).find(".uploader-alt__file").attr("id", `${$(newBlock).find(".uploader-alt__file").attr("id")}_${response.id}`);
            $(newBlock).find(".uploader-alt__header").attr("for", `${$(newBlock).find(".uploader-alt__header").attr("for")}_${response.id}`);



            $(newBlock).find(".icon-delete").attr("data-id", response.id);
            console.log($(newBlock).find(".icon-delete").attr("data-id"));
            $(".social-networks").append(newBlock);
        }
    });
})

$(".video-uploader__item svg.delete").on("click", function () {
    $.ajax({
        type: "DELETE",
        url: "/api/video",
        dataType: "json",
        context: this,
        success: function (response) {
            $(this).parents(".video-uploader").find(".video-uploader__file").css("cursor", "pointer");
            $(this).parents(".video-uploader").find(".video-uploader__file").prop("disabled", false);
            $(this).parents(".video-uploader__item").remove();
        }
    });
});

$("button[name='exportPharmacovigilanceToExcel']").on("click", function () {
    location.href = `/api/feedbacks/export/pharmacovigilance`;
});

$("button[name='exportCompanyToExcel']").on("click", function () {
    location.href = `/api/feedbacks/export/company`;
});

$("button[name='exportContactToExcel']").on("click", function () {
    console.log(1);
    location.href = `/api/feedbacks/export/contact`;
});