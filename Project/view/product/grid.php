<?php $products=$this->getProducts();	 ?>

	<button name="Add"><a href="<?php echo $this->getUrl('add') ?>"><h3>Add</h3></a></button>

	<table border="1" width="100%" cellspacing="4">
		<tr>
			<th>product Id</th>
			<th>Name</th>
			<th>Base Image</th>
			<th>Thumb Image</th>
			<th>Image</th>
			<th>Price</th>
			<th>Cost Price</th>
			<th>MSP</th>
			<th>Quantity</th>
			<th>Discount</th>
			<th>Tax</th>
			<th>Status</th>
			<th>Created Date</th>
			<th>Updated Date</th>
			<th>Edit</th>
			<th>Delete</th>
			<th>Media</th>
		</tr>

		<?php if(!$products):  ?>
			<tr><td colspan="12">No Record available.</td></tr>
		<?php else:  ?>
			<?php foreach ($products as $product): ?>
			<tr>
				<td><?php echo $product->productId ?></td>
				<td><?php echo $product->name ?></td>

				<?php if($product->base): ?>
				<td><img src="<?php  echo $product->getBase()->getImgPath();?>" alt="No Image Found" width="50" height="50"></td>
				
				<?php else: ?>
				<td>No Base Image</td>
				
				<?php endif; ?>	
				<?php if($product->thumb): ?>
				<td><img src="<?php  echo $product->getThumb()->getImgPath();?>" alt="No Image Found" width="50" height="50"></td>
				
				<?php else: ?>
				<td>No Thumb Image</td>
				
				
				<?php endif; ?>	
				
				<?php if($product->small): ?>
				<td><img src="<?php  echo $product->getSmall()->getImgPath();?>" alt="No Image Found" width="50" height="50"></td>
				
				<?php else: ?>
				<td>No Small Image</td>
				
				<?php endif; ?>	
				

				<td><?php echo $product->price ?></td>
				<td><?php echo $product->costPrice ?></td>
				<td><?php echo $product->msp ?></td>
				<td><?php echo $product->quantity ?></td>
				<td><?php echo $product->discount ?></td>
				<td><?php echo $product->tax ?></td>
				<td><?php echo $product->getStatus($product->status)?></td>
				<td><?php echo $product->createdAt ?></td>
				<td><?php echo $product->updatedAt ?></td>
				<td><a href="<?php echo $this->getUrl('edit','product',['id'=>$product->productId],true) ?>">Edit</a></td>
				<td><a href="<?php echo $this->getUrl('delete','product',['id'=>$product->productId],true) ?>">Delete</a></td>
				<td><a href="<?php echo $this->getUrl('grid','product_media',['id'=>$product->productId],true) ?>">Edit Media</a></td>
			</tr>
			<?php endforeach;	?>
		<?php endif;  ?>	
	</table>
	
	
            <script type="text/javascript"> function ppr()
            {
                const pprValue = document.getElementById('ppr').selectedOptions[0].value;
                let language = window.location.href;
                if(!language.includes('ppr'))
                {
                    language+='&ppr=20';
                }
                const myArray = language.split("&");
                for (i = 0; i < myArray.length; i++)
                {
                    if(myArray[i].includes('p='))
                    {
                        myArray[i]='p=1';
                    }
                    if(myArray[i].includes('ppr='))
                    {
                        myArray[i]='ppr='+pprValue;
                    }
                }
                const str = myArray.join("&");  
                location.replace(str);
            }
            </script>

    <table>
        <tr>
            <select onchange="ppr()" id="ppr">
                
                <option selected>select</option>
                <?php foreach($this->getPager()->getPerPageCountOption() as $perPageCount) :?>  
                <option value="<?php echo $perPageCount ?>" ><?php echo $perPageCount ?></a></option>
                <?php endforeach;?>

            </select>
        </tr>

        
            <tr align="center"> 
                <button>
                    <a style="<?php echo ($this->getPager()->getStart() == NULL) ? "pointer-events: none" : "" ?>" href="<?php echo $this->getUrl(null,null,['p' => $this->getPager()->getStart()]) ?>">Start
                    </a>
                </button>
            </tr>

            <tr>
                <button>
                    <a style="<?php echo ($this->getPager()->getPrev() == NULL) ? "pointer-events: none" : "" ?>" href="<?php echo $this->getUrl(null,null,['p' => $this->getPager()->getPrev()]) ?>">Prev
                    </a>
                </button>

                &nbsp;&nbsp;&nbsp;&nbsp;
                <?php echo "<b>".$this->getPager()->getCurrent()."</b>"?>&nbsp;&nbsp;&nbsp;&nbsp;
            </tr>

            <tr>
                <button>
                    <a style="<?php echo ($this->getPager()->getNext() == NULL) ? "pointer-events: none" : "" ?>" href="<?php echo $this->getUrl(null,null,['p' => $this->getPager()->getNext()]) ?>">Next
                    </a>
                </button>
            </tr>

            <tr>
                <button>
                    <a style="<?php echo ($this->getPager()->getEnd() == NULL) ? "pointer-events: none" : "" ?>" href="<?php echo $this->getUrl(null,null,['p' => $this->getPager()->getEnd()]) ?>">End
                    </a>
                </button>
            </tr>
    </table>

	
