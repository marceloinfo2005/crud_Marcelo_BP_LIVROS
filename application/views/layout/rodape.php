          </div>
       </div>
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/
    EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('dist/bootstrap/js/bootsrap.min.js') ?>"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
 
    <script type="text/javascript">
       $(document).ready( function () {
          $('#table_ismweb_listar').DataTable({
             language: {
               "sEmptyTable": "Nenhum registro encontrado",
               "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
               "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
               "sInfoFiltered": "(Filtrados de _MAX_ registros)",
               "sInfoPostFix": "",
               "sInfoThousands": ".",
               "sLengthMenu": "_MENU_ resultados por página",
               "sLoadingRecords": "Carregando...",
               "sProcessing": "Processando...",
               "sZeroRecords": "Nenhum registro encontrado",
               "sSearch": "Pesquisar",
               "oPaginate": {
               "sNext": "Próximo",
               "sPrevious": "Anterior",
               "sFirst": "Primeiro",
               "sLast": "Último"
            },
               "oAria": {
               "sSortAscending": ": Ordenar colunas de forma ascendente",
               "sSortDescending": ": Ordenar colunas de forma descendente"
                     }          
                 }            
             });
       } );
     </script>

   </body>
</hmtl>