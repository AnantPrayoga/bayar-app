
<div class="row">
    <div class="col-md-6" >
        <!-- Form Elements -->
         <div class="box box-primary box-solid">
              <div class="box-header with-border">
                Backup Database 
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-md-12">
					<form method="POST" action="page/backup/backup.php" >
					    <div class="form-group row">
					     	<label for="server" class="col-sm-3 col-form-label">Server</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="server" name="server" value="localhost" readonly="">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="username" class="col-sm-3 col-form-label">Username</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="username" name="username" value="root" readonly="">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="password" class="col-sm-3 col-form-label">Password</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="password" name="password" value="">
					      	</div>
					    </div>
					    <div class="form-group row">
					      	<label for="dbname" class="col-sm-3 col-form-label">Database</label>
					      	<div class="col-sm-9">
					        	<input type="text" class="form-control" id="dbname" name="dbname" value="pembayaran_revisi" readonly="">
					      	</div>
					    </div>
					    <button type="submit" class="btn btn-primary" name="backup">Backup</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



