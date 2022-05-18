<div class="container-fluid mt-5">
	<div class="row">
		<div class="offset-1 col-10">
			<h2 class="text-center">Gerenciar Notas Fiscais</h2>
			<div class="card">
  			<div class="card-body">
					<form id="form-nf" action="" method="post" enctype="multipart/form-data">
					  <div class="form-group">
					    <h3>Importar Nota Fiscal</h3>
					    <input type="file" class="form-control-file" id="fileUpload" name="fileUpload">
					  </div>
					  <button type="button" id="btn-enviar-nf" class="btn btn-primary">Enviar</button>
					</form>
				</div>
			</div>
			<table class="table mt-5">
			  <thead>
			    <tr>
			      <th scope="col">Número NF</th>
			      <th scope="col">Data de emissão</th>
			      <th scope="col">Destinatário</th>
			      <th scope="col">Valor Total</th>
			      <th scope="col"></th>
			    </tr>
			  </thead>
			  <tbody>
			      <?php
				      foreach($notas as $nota){
				      	echo "<tr>";
				        echo "<td>". $nota['ide_n_nf'] ."</td>";
				        echo "<td>". date_format(new DateTime($nota['ide_dh_emi']), 'd/m/Y H:i') ."</td>";
				        echo "<td>". $nota['dest_x_nome'] ."</td>";
				        echo "<td>". $nota['v_pag'] ."</td>";
				        echo "<td><a href='/ver-nf/". $nota['id'] ."' class='btn btn-default' role='button'>Ver Nota</a></td>";
				        echo "</tr>";
				      }
			      ?>
			  </tbody>
      </table>
		</div>
	</div>
</div>

{include="footer"}
<footer>
    <script>    	
    	$('#btn-enviar-nf').click(function() {
        var form = new FormData();           
				form.append('fileUpload', $('#fileUpload')[0].files[0]);

				if(document.getElementById("fileUpload").files.length == 0) {
					toastr['warning']("Selecione uma nota fiscal");
				} else {
					$.ajax({
            url: '/enviar-nf',
            type: 'POST',
            data: form,
            processData: false,
          	contentType: false,
            success: function(response) {
            	var resp = jQuery.parseJSON(response);
              if (resp.sucesso) {
                  toastr['success'](resp.msg);
                  setTimeout(function() {
										location.reload();
									}, 1000);
              } else {
                  toastr['error'](resp.msg);
              }
            },
            error: function(request, status, error) {
                //console.log(request.responseText);
                location.reload();
            }
        	});
        	return false;
				}
       
      }); 

    	$('#btn-ver-nf').click(function() {
    		var id = this.id;

    		jQuery.ajax({
          type: "POST",
          url: "/ver-nf",
          data: id,
          dataType: "JSON",
          success: function (response) {
          	alert("teste");

              var nf = response.nf;

              $('#ide_n_nf').val(nf['ide_n_nf']);

              $("#modal-nf").modal('show');
          },
          error: function (request, status, error) {
              //console.log(request.responseText);
          }
      });
      return false;
    	});
    </script>
</footer>