		<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-md-4 col-xs-12">
                        <h4 class="page-title"><?=$title;?></h4> 
                    </div>
                    <div class="col-lg-9 col-md-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="<?=base_url();?>">Home</a></li>
                            <li class="active"><?=$title;?></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
					<div class="col-lg-12">
						<?=$output;?>
					</div>
				</div>
            </div>
<script type="text/javascript">
jQuery(document).on("gpsafterrequest",function(event,container){
    if(GPS.current_task == 'save')
    {
        var validate = jQuery(container).find('.validation-error').length;
        if(validate == 0)
        {
            jQuery.toast({
        		heading: 'Successfully Saved',
        		text: '',
        		position: 'top-right',
        		loaderBg: '#ff6849',
        		icon: 'success',
        		hideAfter: 3500,
        		stack: 6
        	})
        }
    }
	if(GPS.current_task == 'remove')
    {
		jQuery.toast({
			heading: 'Successfully Deleted',
			text: '',
			position: 'top-right',
			loaderBg: '#ff6849',
			icon: 'success',
			hideAfter: 3500,
			stack: 6
		})
    }
    if(jQuery(".url").length)
    {
        if(GPS.current_task == 'edit' || GPS.current_task == 'create')
        {
            jQuery(".url").keyup(function(){
                var value = jQuery(this).val();
                var fieldValue = value.replace(/(^\w+:|^)\/\//, '');
                jQuery(this).val(fieldValue);
            });
            alert("edit create");
            alert(fieldValue);
        }
        if(GPS.current_task == 'edit')
        {
            jQuery(".url").each(function() {
                var url = jQuery(this).val();
                var urlValue = url.replace('https://','');
                jQuery(this).val(urlValue);
            });
            alert("edit");
            alert(urlValue);
        }
    }
    <?php if(isset($scripts)){ echo $scripts; } ?>
    <?php if($this->uri->segment(3) == 'properties'){ ?>
    	if(GPS.current_task == 'edit' || GPS.current_task == 'create')
        {
            jQuery(document).on('change', '#property_type', function() {
                var value = jQuery(this).val();
                jQuery('.residential').removeClass('d-none');
                jQuery('.residential').closest('.form-group').removeClass('d-none');
                jQuery('.residential').removeClass('d-block');
                jQuery('.residential').closest('.form-group').removeClass('d-block');
                jQuery('.commercial').removeClass('d-none');
                jQuery('.commercial').closest('.form-group').removeClass('d-none');
                jQuery('.commercial').removeClass('d-block');
                jQuery('.commercial').closest('.form-group').removeClass('d-block');
                if(value == 'residential')
                {
                    jQuery('.commercial').addClass('d-none');
                    jQuery('.commercial').closest('.form-group').addClass('d-none');
                    jQuery('.residential').addClass('d-block');
                    jQuery('.residential').closest('.form-group').addClass('d-block');
                }
                else
                {
                    jQuery('.residential').addClass('d-none');
                    jQuery('.residential').closest('.form-group').addClass('d-none');
                    jQuery('.commercial').addClass('d-block');
                    jQuery('.commercial').closest('.form-group').addClass('d-block');
                }
            });
            jQuery(function () {
                jQuery('#property_type').change();
            });
        }
    <?php } ?>
});
jQuery(document).on("ready gpsafterrequest gpsafterdepend", function(event, container) {
    if(container){
      jQuery(container).find(".select2").select2();
    }else{
      jQuery(".gps").find(".select2").select2();
    }
});
</script>
<script src="<?=base_url();?>plugins/bower_components/toast-master/js/jquery.toast.js"></script>