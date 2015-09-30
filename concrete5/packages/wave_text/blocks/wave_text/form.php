<?php  defined('C5_EXECUTE') or die(_("Access Denied."));
$fh = Loader::helper('form/color');
$addSelected = true;
?>
<p>
<?php  print Loader::helper('concrete/ui')->tabs(array(
	array('form-add', t('Add'), $addSelected),
	array('form-design', t('Design')),
	array('form-help', t('Help'))
));?>
</p>

<!-- Begin Design Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-design">
	<div class="ccm-block-field-group">
		<h3><?php  echo t('Design')?></h3>
		<div style="float: left; width: 50%;">
			<p><?php   echo t('Text Color');?></p>
			<p><?php  echo $fh->output('wtColor', $wtColor); ?></p>
		</div>
		<p><?php   echo $form->label('wtFormat', t('Format:'));?>
		<select name="wtFormat" style="vertical-align: middle">
			<option value="h1"<?php   if ($wtFormat == 'h1') { ?> selected<?php   } ?>><?php  echo t('Heading 1 (H1)')?></option>
			<option value="h2"<?php   if ($wtFormat == 'h2') { ?> selected<?php   } ?>><?php  echo t('Heading 2 (H2)')?></option>
			<option selected="true" value="h3"<?php   if ($wtFormat == 'h3') { ?> selected<?php   } ?>><?php  echo t('Heading 3 (H3)')?></option>
			<option value="h4"<?php   if ($wtFormat == 'h4') { ?> selected<?php   } ?>><?php  echo t('Heading 4 (H4)')?></option>
			<option value="h5"<?php   if ($wtFormat == 'h5') { ?> selected<?php   } ?>><?php  echo t('Heading 5 (H5)')?></option>
			<option value="h6"<?php   if ($wtFormat == 'h6') { ?> selected<?php   } ?>><?php  echo t('Heading 6 (H6)')?></option>
			<option value="p"<?php   if ($wtFormat == 'p') { ?> selected<?php   } ?>><?php  echo t('Paragraph (P)')?></option>
		</select>
		</p><p>&nbsp;</p>
	<hr />
		<p style="margin: 0px 30px 0px 30px;"><span><strong><?php  echo t('Height: ')?></strong></span>
			<span class="wtheight_slider"><?php  if (isset($wtHeight)){ echo $wtHeight; } else { echo '50'; } ?></span>
			<?php  echo $form->text('wtHeight', $wtHeight, array('class'=>'wtheight_slider')); ?>
			<div class="wtheight_slider" style="margin: 0px 30px 0px 30px;"></div>
		</p>
	</div>
</div>

<!-- Begin General Settings Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-add">
	<div class="ccm-block-field-group">
		<h3><?php  echo t('General Settings')?></h3>
		<p><?php   echo $form->label('wtText', t('Text: '));?><?php   echo $form->text('wtText', $wtText, array('style' => 'width: 300px'));?></p>
	</div>
	<div class="ccm-block-field-group">
		<p style="margin: 0px 30px 0px 30px;"><span><strong><?php  echo t('Period (length): ')?></strong></span>
			<span class="wtperiod_slider"><?php  if (isset($wtPeriod)){ echo $wtPeriod; } else { echo '50'; } ?></span>
			<?php  echo $form->text('wtPeriod', $wtPeriod, array('class'=>'wtperiod_slider')); ?>
			<div class="wtperiod_slider" style="margin: 0px 30px 0px 30px;"></div>
		</p>
	</div>
	<div class="ccm-block-field-group">
		<p style="margin: 0px 30px 0px 30px;"><span><strong><?php  echo t('Amplitude: ')?></strong></span>
			<span class="wtamp_slider"><?php  if (isset($wtAmplitude)){ echo $wtAmplitude; } else { echo '20'; } ?></span>
			<?php  echo $form->text('wtAmplitude', $wtAmplitude, array('class'=>'wtamp_slider')); ?>
			<div class="wtamp_slider" style="margin: 0px 30px 0px 30px;"></div>
		</p>
	</div>
	<div class="ccm-block-field-group">
		<p style="margin: 0px 30px 0px 30px;"><span><strong><?php  echo t('Letter Spacing: ')?></strong></span>
			<span class="wtlets_slider"><?php  if (isset($wtLetterSpace)){ echo $wtLetterSpace; } else { echo '18'; } ?></span>
			<?php  echo $form->text('wtLetterSpace', $wtLetterSpace, array('class'=>'wtlets_slider')); ?>
			<div class="wtlets_slider" style="margin: 0px 30px 0px 30px;"></div>
		</p>
	</div>
</div>

<!-- Begin Help Tab -->
<div class="ccm-tab-content" id="ccm-tab-content-form-help">
		<h2><?php  echo t('Help & Documentation')?></h2>
		<hr />
		<div class="ccm-block-field-group">
		<h3><?php  echo t('About Wave Text')?></h3>
		<p><?php  echo t('<em>Wave Text</em> is a jquery plugin that allows you to add a text heading with wave effect.')?></p>
		<p><?php  echo t('Developer: ')?><a href="http://www.concrete5.org/profile/-/view/11911/" target="_blank"><?php  echo t('Growth Curve')?></a></p>
		<p><?php  echo t('Version: <strong>2.0</strong>')?></p>
		<p>&nbsp;</p>
		<h3><?php  echo t('Terminology of Settings')?></h3>
		<p><?php  echo t('<strong>Period</strong> - Sets frequency of occurence of wave crests.')?></p>
		<p><?php  echo t('<strong>Amplitude</strong> - Sets height of wave (in pixels).')?></p>
		<p><?php  echo t('<strong>Letter Spacing</strong> - Sets space between each letter (in pixels).')?></p>
		<p><?php  echo t('<strong>Format</strong> - Display text using a heading tag (H1 - H6).')?></p>
		<p><?php  echo t('<strong>Height</strong> - Height (in pixels) of wave text block.')?></p>
		</div>
		
</div>

<!-- Tab Setup -->
<script type="text/javascript">
$(document).ready(function(){
   $('#ccm-wt-tabs a').click(function(ev){
    var tab_to_show = $(this).attr('href');
    $('#ccm-wt-tabs li').
      removeClass('ccm-nav-active').
      find('a').
      each(function(ix, elem){
        var tab_to_hide = $(elem).attr('href');
        $(tab_to_hide).hide();
      });
    $(tab_to_show).show();
    $(this).parent('li').addClass('ccm-nav-active');
    return false;
  }).first().click();
});
</script>
<!-- Activate Each Slider Control -->
<script type="text/javascript">
$('input.wtheight_slider').hide();
$('div.wtheight_slider').
  slider(
    { min  : 20,
      step : 5,
      max  : 300,
      value: parseInt($('span.wtheight_slider').text(),10),
      slide: function(event, uiobj) {
               $('span.wtheight_slider').text(uiobj.value+'px');
               $('input.wtheight_slider').val(uiobj.value);
             }
    });
</script>
<script type="text/javascript">
$('input.wtperiod_slider').hide();
$('div.wtperiod_slider').
  slider(
    { min  : 0,
      step : 5,
      max  : 100,
      value: parseInt($('span.wtperiod_slider').text(),10),
      slide: function(event, uiobj) {
               $('span.wtperiod_slider').text(uiobj.value+' ');
               $('input.wtperiod_slider').val(uiobj.value);
             }
    });
</script>
<script type="text/javascript">
$('input.wtamp_slider').hide();
$('div.wtamp_slider').
  slider(
    { min  : 0,
      step : 1,
      max  : 100,
      value: parseInt($('span.wtamp_slider').text(),10),
      slide: function(event, uiobj) {
               $('span.wtamp_slider').text(uiobj.value+' ');
               $('input.wtamp_slider').val(uiobj.value);
             }
    });
</script>
<script type="text/javascript">
$('input.wtlets_slider').hide();
$('div.wtlets_slider').
  slider(
    { min  : 0,
      step : 1,
      max  : 50,
      value: parseInt($('span.wtlets_slider').text(),10),
      slide: function(event, uiobj) {
               $('span.wtlets_slider').text(uiobj.value+' ');
               $('input.wtlets_slider').val(uiobj.value);
             }
    });
</script>