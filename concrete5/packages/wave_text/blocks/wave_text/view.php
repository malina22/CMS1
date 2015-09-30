<?php     defined('C5_EXECUTE') or die(_("Access Denied."));
$html = Loader::helper('html');
Loader::model('attribute/categories/collection');
?>
<!-- BEGIN WAVE TEXT -->
<div class="wavetext-wrap">
	<!-- Activate the Wave Text. -->
	<script type="text/javascript">
	$(function() {
        $('#<?php  echo $bID ?>-wt').waveText({
            'period' : <?php  echo ($wtPeriod * 0.01) ?>,
            'amplitude' : <?php  echo $wtAmplitude ?>,
            'letterSpacing' : <?php  echo $wtLetterSpace ?>
        });
    });
	</script>
	<<?php  echo $wtFormat ?>  id="<?php  echo $bID ?>-wt" style="height: <?php  echo $wtHeight ?>px; margin-top: <?php  echo $wtAmplitude ?>px; color: <?php   if(!empty($wtColor)){ echo $wtColor;}else{echo "#000";}?>;">
	<?php  echo $wtText ?>
	</<?php  echo $wtFormat?>>
</div>
<!-- END WAVE TEXT -->