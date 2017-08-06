<?php
if (!empty($_GET['error'])){
  $error = unserialize(urldecode($_GET['error']));
}
?>
<div class="container">
  <div class="row">
      <div class="col-sm-8">
        <h2>Update Task</h2>
<?php
if(isset($error)){
echo '<span style="color:red;">';  
foreach ($error as $key => $value) {
  switch ($key) {
    case 'title':
      foreach ($value as $val){
       echo 'Title: '. $val . '</br>';
      }
      break;

    case 'startDate':
      foreach ($value as $val){
       echo 'Start Date: '. $val . '</br>';
      }
      break;

    case 'dueDate':
      foreach ($value as $val){
       echo 'Due Date: '. $val . '</br>';
      }
      break;
    }
  }
 echo '</span>'; 
}

 ?> 


        <?php while($row = $data->fetchArray(SQLITE3_ASSOC)){ $id = $row['id']; ?>
        <form id="taskFor" action="<?php echo BASE_URL ?>/indexOperator/updateData/<?php echo $id; ?>" method="POST">
          <div class="form-group">
            <label for="title">Title*</label>
            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row['title']; ?>" />
          </div>

          <div class="form-group">
            <label for="status">Status*</label>
            <select class="form-control" id="status" name="status">
              <option value="<?php echo $row['status']; ?>" ><?php echo $row['status']; ?></option>
              <option value='On Going'>On Going</option>
              <option value='Completed'>Completed</option>
              <option value="Rejected">Rejected</option>
              <option value="Canceled">Canceled</option>
            </select>
          </div>

          <div class="form-group">
            <label for="priority">Praiority</label>
            <select class="form-control" id="priority" name="priority">
              <option value="<?php echo $row['priority']; ?>"><?php echo $row['priority']; ?></option>
              <option value='High'>High</option>
              <option value='Mid'>Mid</option>
              <option value="Low">Low</option>
            </select>
          </div>

          <div class="form-group">
            <label for="startDate">Start Date*</label>
            <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $row['startDate']; ?>">
          </div>

          <div class="form-group">
            <label for="dueDate">Due Date*</label>
            <input type="date" class="form-control" id="dueDate" name="dueDate" value="<?php echo $row['dueDate']; ?>" >
          </div>

          <div class="form-group">
            <label for="completion">Completion</label>
            <input type="number" class="form-control" id="completion" name="completion" value="<?php echo $row['completion']; ?>"  >
          </div>

          <div class="form-group">
            <label for="comm">Comment:</label>
            <textarea class="form-control" id="comm" name="comm"><?php echo $row['comment']; ?></textarea> 
          </div>

          <button type="submit" class="btn btn-default">Update</button>
        </form>
        <?php } ?>

      </div>
    </div>
</div>