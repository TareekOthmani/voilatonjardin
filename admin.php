<?php
$default_tab = 'tab-1';
 
if (isset($_REQUEST['tab'])) {
	$default_tab = $_REQUEST['tab'];
}
 
$settings =& $core->blog->settings;
 
$settings->setNameSpace('example');
 
if (!empty($_POST['saveconfig']))
{
	$settings->put('example_active',
		!empty($_POST['example_active']),
		'boolean','Enable Example');
 
	# redirect to the page, avoid conflicts with old settings
	http::redirect($p_url.'&tab=settings&saveconfig=1');
}
 
if (isset($_GET['saveconfig']))
{
	$msg = __('Configuration successfully updated.');
}
 
?><html>
<head>
	<title><?php echo(__('Example')); ?></title>
	<?php echo dcPage::jsPageTabs($default_tab); ?>
</head>
<body>
 
	<h2><?php echo html::escapeHTML($core->blog->name).' &rsaquo; '.
		__('Example'); ?></h2>
 
	<?php if (!empty($msg)) {echo '<p class="message">'.$msg.'</p>';} ?>
 
	<div class="multi-part" id="tab-1"
		title="<?php echo __('Tab 1'); ?>">
		<?php echo(__('Hello World!')); ?>
	</div>
 
	<div class="multi-part" id="settings"
		title="<?php echo __('Settings'); ?>">
		<form method="post" action="<?php echo($p_url); ?>">
			<p><label class="classic"><?php echo(
				form::checkbox('example_active','1',$settings->example_active).
				' '.__('Enable')); ?></label></p>
			<p><?php echo $core->formNonce(); ?></p>
			<p><input type="submit" name="saveconfig"
			value="<?php echo __('Save configuration'); ?>" /></p>
		</form>
	</div>
 
</body>
</html>