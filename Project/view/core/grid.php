
<?php
    $headers = $this->getCollection()->getHeaders();
    $columns = $this->getCollection()->getColumns();    
    $actions = $this->getCollection()->getActions();
?>
<button><a href="<?php echo $this->getActionUrl('add'); ?>">Add</a></button>
<table border = "1" width="100%">
    <tr>
        <?php foreach ($headers as $header) :?>
            <th><?php echo $header ?></th>
        <?php endforeach; ?>
        <?php foreach ($actions as $title => $action) :?>
            <th><?php echo $title ?></th>
        <?php endforeach; ?>
    </tr>
    <?php foreach ($columns as $columnData) :?>
    <tr>
        <?php foreach ($columnData as $column):?>
            <td><?php echo $column ?></td>
        <?php endforeach; ?>
        <?php foreach ($actions as $action) :?>
            <td><a href="<?php echo $this->getActionUrl($action['title'],$columnData[0]); ?>"><?php echo $action['title'] ?></td>
        <?php endforeach; ?>
    </tr>
    <?php endforeach; ?>

</table>