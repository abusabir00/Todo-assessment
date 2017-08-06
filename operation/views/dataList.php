<?php 
if (!empty($_GET['msg'])){
  $msg = unserialize(urldecode($_GET['msg']));
}
?>

<div class="container">
  <h2>Task Table</h2>
  <p style="color: red;"><?php if(isset($msg)){ echo $msg; } ?></p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Task Title</th>
        <th>Status</th>
        <th>Priority</th>
        <th>Start Date</th>
        <th>Due Date</th>
        <th>Completion</th>
        <th>Comment</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
<?php
while($row = $data->fetchArray(SQLITE3_ASSOC) ){ ?>    
      <tr>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td><?php echo $row['priority']; ?></td>
        <td><?php echo $row['startDate']; ?></td>
        <td><?php echo $row['dueDate']; ?></td>
        <td><?php echo $row['completion'].' %'; ?></td>
        <td><?php echo $row['comment']; ?></td>
        <td><a href="<?php echo BASE_URL ?>/indexOperator/dataEdit/<?php echo $row['id']; ?>" type="button" class="btn">Edit</a></td>
        <td><a href="<?php echo BASE_URL ?>/indexOperator/dataDelete/<?php echo $row['id']; ?>" type="button" class="btn">Delete</a></td>
      </tr>
      
<?php } ?>      
    </tbody>
  </table>
</div>