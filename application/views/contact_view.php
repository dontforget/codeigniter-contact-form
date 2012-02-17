<div>
<?php echo form_open('contact/emailsender'); ?>
	<h1>Send your message:</h1>
	<table>
		<tr>
			<td><?php echo form_input('sender_name', 'From');?><?php echo form_error('sender_name'); ?></td>				
		</tr>
		<tr>
			<td><?php echo form_input('sender_email', 'Email');?><?php echo form_error('sender_email'); ?></td>
		</tr>
		<tr>
			<td><?php echo form_input('subject', 'Subject');?><?php echo form_error('subject'); ?></td>
		</tr>
		<tr>
			<td><?php echo form_textarea('message', 'Message');?><?php echo form_error('message'); ?></td>
		</tr>
		<tr>
			<td><?php echo form_submit('submit', 'Send');?></td>
		</tr>
	</table>
	<?php echo form_close();?>
	<script type="text/javascript">
		$(function() {
		    $('input[type=text], textarea').focus(function() {
			    $(this).val('');
				});
			});
	</script>
</div>
