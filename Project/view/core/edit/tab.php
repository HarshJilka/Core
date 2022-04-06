<?php $tabs = $this->getTabs(); ?>
<?php foreach($tabs as $key => $tab): ?>
    <button type="button" class="loadTab btn btn-light" value="<?php echo $tab['url'] ?>" <?php echo ($this->getCurrentTab() == $key) ? 'style ="color:blue";' : 'style ="color:green";' ; ?>><?php echo $tab['title'];?></button>
<?php endforeach;?>


<script>
    jQuery(".loadTab").click(function(){
        admin.setUrl($(this).val());
        admin.setType('GET');
        admin.load();
    });
</script>