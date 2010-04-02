<!DOCTYPE html>
<?php 
$default_tags = 'agile ajax apache api apml applescript architecture auth autocomplete beautify bug bugs C canvas cheatsheet closure Cocoa code codedump comet compiler compression compressor Computer crossdomain csrf css3 D dashcode debug debugger debugging development dom ext firebug firefox flash flex framework functions greasemonkey hack hacks howto html html5 ie iframe iframes innerhtml input Java javascript jquery js js2 keycodes keypress LAMP language languages leak leaks livesearch memory memoryleak minify moo mootools namespace nu oauth obfuscate obfuscator objective-c onload oop opml optimisation optimised optimization pack packer performance perl php plugin plugins programming prototype prototyping rail rails regexp replacehtml reserved rest ruby scripting scroll scrolling sdk snippet';
$tags = split(' ', $default_tags);
?>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Add new campaign</title>
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset-fonts-grid.css">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/nicescreen.css">
        <style type="text/css" media="screen">
        <!--
        
        span.tagMatches {
        	position:absolute;
			right:0;
			margin: 10px;
        }
        
        span.tagMatches SPAN {
            padding: 2px;
            margin-right: 4px;
            background-color: #0000AB;
            color: #fff;
            cursor: pointer;
        }
        -->
        </style>
    </head>
    <body>
        <div id="description">
            <span>travelohic.com</span>
            <h1><a href=#>Add Campaign</a></h1>
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
