<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="container-fluid mt-5">
	<div class="row">
		<div class="offset-1 col-10">
			<h2 class="text-center">Nota Fiscal</h2>
			<div class="card">
  			<div class="card-body">
  				<div class="row">
						<div class="form-group col-6">
	            <label>Número nota fiscal</label>
	            <input type="text" class="form-control" value="<?php echo $nf["ide_n_nf"]; ?>" disabled>
	          </div>
	          <div class="form-group col-6">
	            <label>Data emissão</label>
	            <input type="text" class="form-control" value="<?php echo $nf["ide_dh_emi"]; ?>" disabled>
	          </div>
          </div>
          <div class="row">
						<div class="form-group col-6">
	            <label>Nome</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_x_nome"]; ?>" disabled>
	          </div>
	          <div class="form-group col-6">
	            <label>E-mail</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_email"]; ?>" disabled>
	          </div>
	          <div class="col-12"><hr></div>
	          <div class="col-12">
	          	<h3>Destinatário</h3>
	          </div>
	          <div class="form-group col-6">
	            <label>CEP</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_cep"]; ?>" disabled>
	          </div>
	          <div class="form-group col-9">
	            <label>Logradouro</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_xlgr"]; ?>" disabled>
	          </div>
	          <div class="form-group col-3">
	            <label>Número</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_nro"]; ?>" disabled>
	          </div>
	          <div class="form-group col-4">
	            <label>Bairro</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_x_bairro"]; ?>" disabled>
	          </div>
	          <div class="form-group col-4">
	            <label>Município</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_x_mun"]; ?>" disabled>
	          </div>
	          <div class="form-group col-1">
	            <label>UF</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_uf"]; ?>" disabled>
	          </div>
	          <div class="form-group col-3">
	            <label>País</label>
	            <input type="text" class="form-control" value="<?php echo $nf["dest_ender_dest_c_pais"]; ?>" disabled>
	          </div>
		        <div class="col-12"><hr></div>
	          <div class="form-group col-4 ml-auto">
		            <label>Valor</label>
		            <input type="text" class="form-control" value="<?php echo $nf["v_pag"]; ?>" disabled>
		          </div>
          </div>
				</div>
			</div>
		</div>
	</div>
</div>