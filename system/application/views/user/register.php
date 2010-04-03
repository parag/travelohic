<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Register</title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/nicescreen.css">
    </head>
    <body>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#>Register</a></h1>
            <div>
                <h2>This step will create a new page in campaigns. Just categorise and tag properly. Make sure image is 1024x800px for best display. The tags, in addition should be seperated by spaces. </h2>
            </div>
        </div>
        <div id="form">
            <?php echo form_open_multipart('admin/campaigns/add'); ?>
            	<input type="hidden" name="savecampaign" value="1">
                <div class="box">
                    <label>
                        <span>name</span>
                        <input type="text" class="input_text" name="name" id="name">
                    </label>
                    <label>
                        <span>tag</span>
                        <input type="text" class="input_text" name="tags" id="tags">
                    </label>
                    <label>
                        <span>category</span>
                        <select id="category" name="category" class="input_text">
                            <?php $this->load->view('data/categories'); ?>
                        </select>
                    </label>
					<label>
                        <span>info page?</span>
                        <select id="isinfo" name="isinfo" class="input_text">
                            <option value="1">yes</option>
							<option value="0">no</option>
                        </select>
                    </label>
					<label>
                        <span>country</span>
                        <select id="country" name="country" class="input_text">
                            <?php $this->load->view('data/countries'); ?>
                        </select>
                    </label>
                    <label>
                        <span>photo</span>
                        <input type="file" name="userfile" size="12" />
                    </label>
                    <label>
                        <span>description</span>
                        <br/>
                        <br/>
                        <textarea class="message" name="comment" id="comment"></textarea>
                        <br/>
                        <br/>
                        <input type="submit" class="button" value="submit">
                    </label>
                </div>
            <?php echo form_close();?>
        </div>
    </body>
</html>
<script src="<?=base_url()?>js/jquery.min.js">
</script>
<script src="<?=base_url()?>js/tag.js">
</script>
<script type="text/javascript">
            <!--
            $(function () {
    			$('#tags').tagSuggest({
    				tags: <?=json_encode($tags)?>
    				});
            });
            //-->
            
</script>
