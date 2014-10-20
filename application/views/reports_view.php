<?php $this->load->view('template/header_view.php'); ?>

<section id="page-header" class="clearfix">    
	<div class="wrapper">
		<h1><?php echo $this->lang->line('h1_report'); ?> <?php
			if (isset($generate)) {
				echo '<br>' . $generate['start'] . ' - ' . $generate['end'];
			}
			if (isset($user)) {
				echo ': ' . $user['login'];
			}
			?></h1>
    </div>

</section>


<!-- main content area -->   
<div class="wrapper" id="main"> 

	<!-- content area -->    
	<section id="content" class="wide-content">

		<form action="<?php echo base_url() . 'enc/genreports'; ?>" method="POST">
			<input type="hidden" name="sent" value="yes">
			<div class="label"><?php echo $this->lang->line('data_start'); ?></div>
			<input type="date" name="start" value="<?php echo date('Y-m-d'); ?>" required>
			<div class="label"><?php echo $this->lang->line('data_end'); ?></div>
			<input type="date" name="end" value="<?php echo date('Y-m-d'); ?>" required>
			<div class="label"><?php echo $this->lang->line('login'); ?></div>
			<select name="user">
				<option value=""><?php echo $this->lang->line('all'); ?></option>
					<?php foreach ($users as $user) { ?>
						<option value="<?php echo $user['id']; ?>">
							<?php echo $user['login']; ?>
						</option>
					<?php } ?>
				</select>
			<input type="submit" value="<?php echo $this->lang->line('generate'); ?>">
		</form>

<?php if (isset($generate)) { ?>		
			<table>
				<tr><th><?php echo $this->lang->line('data'); ?></th>
					<th><?php echo $this->lang->line('login'); ?></th>
					<th><?php echo $this->lang->line('actions'); ?></th>
					<th><?php echo $this->lang->line('product'); ?></th>
					<th><?php echo $this->lang->line('amount'); ?></th></tr>
	<?php foreach ($reports as $log) { ?>
					<tr>						
						<td><?php echo $log['date']; ?></td>					
						<td><?php echo $log['login']; ?></td>					
						<td><?php echo $log['action']; ?></td>
						<td><?php echo $log['pname']; ?></td>
						<td><?php echo $log['amount']; ?></td>
					</tr>
			<?php } ?>
			</table>
<?php } ?>


	</section><!-- #end content area -->

</div><!-- #end div #main .wrapper -->

<?php $this->load->view('template/footer_view.php'); ?>