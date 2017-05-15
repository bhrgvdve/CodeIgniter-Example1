<center>
<h1>User example</h1>
<hr />
<p><a href="<?php echo site_url('users'); ?>">Home</a> | <a href="<?php echo site_url('users/create'); ?>">Add User</a></p>
<p>Found <?php echo $num_result; ?> Users</p>
<table border='1' cellpadding='4'>
    <thead>
    
        <?php foreach ($fields as $fi_name => $fi_display): ?>
        <th <?php if($sort_by == $fi_name) echo "class=\"sort_$sort_order\"" ?>><?php echo anchor("users/index/$fi_name/".(($sort_order == 'asc' && $sort_by == $fi_name) ? 'desc': 'asc') ,$fi_display); ?></th>
        <?php endforeach; ?>
    
    </thead>
    <tbody>
<?php foreach ($users as $user): ?>
        <tr>
             <?php foreach ($fields as $fi_name => $fi_display): ?>
            <td><?php echo $user->$fi_name; ?></td>
            <?php endforeach; ?>
           
        </tr>
<?php endforeach; ?>
    </tbody>
</table>
    <?ph if(strlen($pagination)): ?>
        <div>
            Pages: <?php echo $pagination; ?>
        </div>

    <?ph endif; ?>
</center>
 
