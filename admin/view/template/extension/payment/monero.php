<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <button type="submit" form="form-monero" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
                <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
            <h1>Monero Payment Gateway</h1>
            <ul class="breadcrumb">
                <?php foreach ($breadcrumbs as $breadcrumb) { ?>
                <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="container-fluid">
        <?php if ($error_warning) { ?>
        <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
        <?php } ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
            </div>
            <div class="panel-body">
                <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-monero" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-status">Status</label>
                        <div class="col-sm-10">
                            <select name="monero_status" id="input-status" class="form-control">
                                <?php if ($monero_status) { ?>
                                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                                <option value="0"><?php echo $text_disabled; ?></option>
                                <?php } else { ?>
                                <option value="1"><?php echo $text_enabled; ?></option>
                                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    

                                        
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-monero-address"><span data-toggle="tooltip" title="Monero Address"><?php echo $monero_address_text; ?></span></label>
                        <div class="col-sm-10">
                            <input type="text" name="monero_address" value="<?php echo $monero_address; ?>" placeholder="<?php echo $monero_address; ?>" id="input-total" class="form-control" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-monero-wallet-rpc-host"><span data-toggle="tooltip" title="Monero Wallet RPC">Monero Wallet RPC Host</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="monero_wallet_rpc_host" value="<?php echo $monero_wallet_rpc_host ?>" placeholder="<?php echo $monero_wallet_rpc_host ?>" id="input-total" class="form-control" />
                        </div>
                    </div>

<div class="form-group">
                        <label class="col-sm-2 control-label" for="input-monero-wallet-port"><span data-toggle="tooltip" title="Monero Wallet RPC port">Monero Wallet RPC Port</span></label>
                        <div class="col-sm-10">
                            <input type="text" name="monero_wallet_rpc_port" value="<?php echo $monero_wallet_rpc_port ?>" placeholder="18082" id="input-total" class="form-control" />
                        </div>
                    </div>
                    

                    
                    

                    


             
                </form>
            </div>
        </div>
    </div>
</div>
<?php echo $footer; ?>
