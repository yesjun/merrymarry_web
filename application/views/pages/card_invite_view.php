<div id=session_data>
	<h2>This is in the session:</h2>
	<h3>You can always add more in the Controllers:</h3>
	<pre>
		<?php print_r($this->session->all_userdata()); ?>
	</pre>
</div>
<div id=examples>	<h2>MerryMerry API Refresh Session Response</h2>	<pre>		<?php print_r($mmares); ?>	</pre>	-=info=-	<pre>		<?php print_r($mmaresinfo); ?>	</pre></div><div id=examples>	<h2>MerryMerry API Refresh Session Data</h2>	<pre>		<?php print_r($mmasess); ?>	</pre></div><div id=examples>	<h2>MerryMerry API Response</h2>	<pre>		<?php print_r($invite_data); ?>	</pre>	-=info=-	<pre>		<?php print_r($invite_datainfo); ?>	</pre></div>

<div id=examples>	<h2>Examples</h2>	<?php echo anchor('secure/likes', 'My Likes'); ?> | <?php echo anchor('secure/friends', 'My Friends'); ?></div>