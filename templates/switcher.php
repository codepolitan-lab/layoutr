<div class="switcher">
	<div class="switcher-container">
		<form action="index.php" id="try-layout">
		<div class="sub">
			<h4 class="nav-header">Style</h4>
			<select class="span2" name="s" id="input-style">
				{{ styles }}
					<option value="{$value}">{$value}</option>
				{{ / styles }}
			</select>
		</div>
		<div class="sub">
			<h4 class="nav-header">Boxed?</h4>
			<input type="checkbox" name="boxed" id="boxed" value="1" {if condition="$boxed=='boxed'"}checked="checked"{/if}>
		</div>
		<div class="sub">
			<h4 class="nav-header">Metadata</h4>
			<select class="span2" name="m" id="input-metadata">
				{loop="metadatas"}
					<option value="{$value}">{$value}</option>
				{/loop}
			</select>
		</div>
		<div class="sub">
			<h4 class="nav-header">Layout</h4>
			<select class="span2" name="l" id="input-layout">
				{loop="layouts"}
					<option value="{$value}">{$value}</option>
				{/loop}
			</select>
		</div>
		<div class="sub">
			<h4 class="nav-header">Header</h4>
			<select class="span2" name="h" id="input-header">
				{loop="headers"}
					<option value="{$value}">{$value}</option>
				{/loop}
			</select>
		</div>
		<div class="sub">
			<h4 class="nav-header">Content</h4>
			<select class="span2" name="c" id="input-content">
				{loop="contents"}
					<option value="{$value}">{$value}</option>
				{/loop}
			</select>
		</div>
		<div class="sub">
			<h4 class="nav-header">Footer</h4>
			<select class="span2" name="f" id="input-footer">
				{loop="footers"}
					<option value="{$value}">{$value}</option>
				{/loop}
			</select>
		</div><br>
		<input type="submit" id="try" class="btn" value="Try It Out" />
		</form>
	</div>
	<div class="toggle" id="opened" title="Close Switcher">&laquo;</div>
</div>

<style>
	.switcher {
		display: block;
		position: fixed;
		left: 0;
		top: 100px;
	}
	.switcher-container {
		background-color: #fff;
		border: 1px solid #ddd;
		border-radius: 0 8px 8px 0;
		padding: 5px 20px;
		min-width: 150px;
		-webkit-box-shadow: 4px 4px 3px 0px rgba(20,20,20,.5);
		box-shadow: 4px 4px 3px 0px rgba(20,20,20,.5);
	}
	h4.nav-header {
		padding: 0;
		margin-bottom: 0;
		color: #444;
		font-family: Verdana, Arial, sans-serif;
		font-size: 14px;
	}
	.sub {
		border-bottom: 1px solid #eee;
	}
	.sub select {
		width: 100%;
	}
	.toggle {
		position: absolute;
		right: -33px;
		top: 20px;
		background: #fff;
		padding: 6px 10px;
		border: 1px solid #ddd;
		border-left: 0;
		cursor: pointer;
		font-size: 24px;
		color: #555;
		-webkit-box-shadow: 4px 4px 3px 0px rgba(20,20,20,.5);
		box-shadow: 4px 4px 3px 0px rgba(20,20,20,.5);
	}
</style>
<script>
	// init
	if($.cookie('is_open') == 'opened') open_switcher(); else close_switcher();
	$('#input-style option[value={$style}]').prop('selected', true);
	$('#input-layout option[value={$layout}]').prop('selected', true);
	$('#input-header option[value={$header}]').prop('selected', true);
	$('#input-content option[value={$content}]').prop('selected', true);
	$('#input-footer option[value={$footer}]').prop('selected', true);
	// end init
	
	function close_switcher(){
		$('.switcher-container').hide();
		$('.toggle').attr('id', 'closed').html('&raquo;').attr('title', 'Open Switcher');
		$.cookie('is_open', 'closed');
	}
	function open_switcher(){
		$('.switcher-container').show();
		$('.toggle').attr('id', 'opened').html('&laquo;').attr('title', 'Close Switcher');
		$.cookie('is_open', 'opened');
	}

	$('.toggle').click(function(){
		$this = $(this);
		var id = $this.attr('id');
		if(id == 'opened'){
			close_switcher();
		} else {
			open_switcher();
		}
	});

</script>