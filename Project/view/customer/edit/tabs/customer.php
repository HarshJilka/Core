<?php $customer = $this->getCustomer(); ?>

<table>
	<tr>
		<td width="10%">FIRST NAME:
			<input type="text" name="customer[customerId]" value="<?php echo $customer->customerId ?>" hidden>
		</td>
		
		<td>
			<input type="text" name="customer[firstName]" value="<?php echo $customer->firstName ?>">
		</td>
	</tr>
	
	<tr>
		<td width="10%">LAST NAME:</td>
		<td>
			<input type="text" name="customer[lastName]" value="<?php echo $customer->lastName ?>">
		</td>
	</tr>

	<tr>
		<td width="10%">EMAIL DETAIL:</td>
		<td>
			<input type="text" name="customer[email]" value="<?php echo $customer->email ?>">
		</td>
	</tr>

	<tr>
		<td width="10%">CONTACT:</td>
		<td>
			<input type="text" name="customer[mobile]" value="<?php echo $customer->mobile ?>">
		</td>
	</tr>

	<tr>
		<td width="10%">STATUS:</td>
		<td>
		<select name="customer[status]">
			<option value="1" <?php echo ($customer->getStatus($customer->status)=='Active')?'selected':'' ?>>Active</option>
			<option value="2" <?php echo ($customer->getStatus($customer->status)=='Inactive')?'selected':'' ?>>Inactive</option>
		</select>
		</td>
	</tr>

	<tr>
		<td width="10%">&nbsp;</td>
		<td>
			<button type="button" id="customerSubmitBtn" >SAVE</button>
			<button type="button" id="cancel">CANCEL</button>
		</td>
	</tr>
</table>

<script>
    $("#customerSubmitBtn").click(function()
    {    
        admin.setForm($("#indexForm"));
        admin.setUrl("<?php echo $this->getEdit()->getSaveUrl(); ?>");
        //alert(admin.getUrl());
        admin.load();
    });

    $("#cancel").click(function()
    {
        admin.setUrl("<?php echo $this->getUrl('gridBlock','customer'); ?>");
        admin.load();
    });
</script>