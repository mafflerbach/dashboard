$(document).ready(function () {
    $(function () {
        $("#sortable").sortable({
            placeholder: "ui-state-highlight",
            revert: true
        });
        $("#sortable").disableSelection();
    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    })

    $('#newList a').click(function (e) {
        e.preventDefault();

        var content = '<li class="list-group-item" id="addMeuItem">' +
            '<span class="badge closeInput" ><span class="glyphicon glyphicon-remove"></span></span>' +
            '<span class="badge addInput" ><span class="glyphicon glyphicon-plus"></span></span>' +
            '<div class="form-group">' +
            '<input type="text" class="form-control" id="listName" name="listname" placeholder="Title"/>' +
            '</div></li>';

        if ($('#listName').length == 0) {
            $('#mainmenu').append(content);

            $('.closeInput').on('click', function () {
                $('#addMeuItem').remove();
            })

            $('.addInput').on('click', function () {
                //ajax request do add list
            })
        }

    });


    $( "#sortable li" ).draggable({
        connectToSortable: "#mainmenu",
        helper: "clone",
        revert: "invalid",
        drop: function( event, ui ) {
            console.log($(this));
            console.log(ui);
            console.log(event);
        }
    });

    $( "#mainmenu li" ).droppable({
        drop: function( event, ui ) {
            console.log($(this));
            console.log(ui);
            console.log(event);
        }
    });

});