$(document).ready(function() {
    $('#tbalunos').DataTable({       
        "columnDefs": [
                    {
                        "targets": [4],
                        "visible": false,
                        "searchable": false
            },],
        'language':
            {
                "search": "Pesquisar",
                "paginate":
                {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
            },
            "bLengthChange": false,
            "bInfo": false, 
        
    });
});

$(document).ready(function() {
    $('#tbturmas').DataTable({
        'language':
            {
                "search": "Pesquisar",
                "paginate":
                {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
            },
            "bLengthChange": false,
            "bInfo": false, 
    });
    $('#tbMatricula').DataTable({});
    $('#tbretiradas').DataTable(
    {
        'language':
            {
                "search": "Pesquisar",
                "paginate":
                {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
            },
            "bLengthChange": false,
            "bInfo": false,
    });
    $('#tbAlunoTurma').DataTable(
        {
            'language':
            {
                "search": "Pesquisar",
                "paginate":
                {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
            },
            "bLengthChange": false,
            "bInfo": false,        
        });
    $('#tbhistorico_aluno').DataTable({});
    
    $('#modal-del-alunos').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var aluno_id = button.data('aluno_id') // Extract info from data-* attributes
        var nome = button.data('nome-aluno')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Deseja deletar esse aluno?' + nome)
    })    
    var valor = "0";
    $("#valor_pg").on('blur', function () {
        valor_anterior = valor;
        valor = $('#valor_pg').val();
        $('#n_parcelas').val(1);
               
    });
    $('#n_parcelas').on('keyup mouseup', function (event) {
        if (valor == 0)
        {
            valor = $('#valor_pg').val();  
        }
        var n_parcelas = $('#n_parcelas').val();
        var total = valor * n_parcelas;
        total = total;
        $('#valor_pg').val(total.toFixed(2));        
    });
});



$(document).ready(function () {
    {
        var table = $('#example').DataTable(
            {
                "dispalyLength": 5,
                "columnDefs": [
                    {
                        "targets": [1],
                        "visible": false,
                        "searchable": false
                    },

                ]
            }
        );
    }

    $('#example tbody').on('click', 'tr', function () {        
        var data = table.row(this).data();
        $('#nome_prof').val(data[0]);
        $('#user_id').val(data[1]);
        $('#professor').modal('hide');
        $('#example tbody').on('click', 'tr', function () {
        });
    });
});



$('#data_nascimento').mask('00/00/0000');
$('#celular').mask('(00)-00000-00000');
$('#horario').mask('00:00 - 00:00');
$('#valor').mask("#,##0.00", { reverse: true });
$('#cpf').mask('000.000.000-00');
$('#valor_pg').mask("#,##0.00", { reverse: true });
