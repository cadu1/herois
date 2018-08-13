function remove_reg(id) {
    bootbox.confirm({
        message: "Tem certeza que deseja excluir?",
        buttons: {
            confirm: {
                label: 'Sim',
                className: 'btn-danger'
            },
            cancel: {
                label: 'Não',
                className: 'btn-default'
            }
        },
        callback: function (result) {
            if( result == true ) {
                if(!id) {
                    id = $('input[name^="id"]').val();
                }
                var url = $('meta[name="url"]').attr('content'),
                ctrl = $('meta[name="ctrl"]').attr('content');
                $.post( url+'/'+ctrl+'/apaga/'+id, function(d) {
                    if( d.status ) {
                        window.location.href = url+'/'+ctrl;
                    } else {
                        $('.panel-body','.panel.msg').html(d.msg);
                        $('.panel.msg').fadeIn().delay(4000).fadeOut();
                    }
                }, 'json');
            }
        }
    });
}
