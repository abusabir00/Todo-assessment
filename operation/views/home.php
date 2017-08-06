<div class="container">
  <div class="row">
      <div class="col-sm-8">
        <h2>Add New Task</h2>
<?php
if(isset($data)){
echo '<span style="color:red;">';  
foreach ($data as $key => $value) {
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

        <form id="taskFor" action="<?php echo BASE_URL ?>/indexOperator/insertData" method="POST">
          <div class="form-group">
            <label for="title">Title*</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Task Title"/>
          </div>

          <div class="form-group">
            <label for="status">Status*</label>
            <select class="form-control" id="status" name="status">
              <option value='On Going'>On Going</option>
              <option value='Completed'>Completed</option>
              <option value="Rejected">Rejected</option>
              <option value="Canceled">Canceled</option>
            </select>
          </div>

          <div class="form-group">
            <label for="priority">Praiority</label>
            <select class="form-control" id="priority" name="priority">
              <option value='High'>High</option>
              <option value='Mid'>Mid</option>
              <option value="Low">Low</option>
            </select>
          </div>

          <div class="form-group">
            <label for="startDate">Start Date*</label>
            <input type="date" class="form-control" id="startDate" name="startDate">
          </div>

          <div class="form-group">
            <label for="dueDate">Due Date*</label>
            <input type="date" class="form-control" id="dueDate" name="dueDate" >
          </div>

          <div class="form-group">
            <label for="completion">Completion</label>
            <input type="number" class="form-control" id="completion" name="completion" placeholder="%">
          </div>

          <div class="form-group">
            <label for="comm">Comment:</label>
            <textarea class="form-control" id="comm" name="comm"></textarea> 
          </div>

          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
</div>