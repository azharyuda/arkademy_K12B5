<?php
  $link=mysqli_connect("localhost","root","","dbarka_2") or die (mysqli_error($link));
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="author" content="Azhar Yuda Partama" />
    <title>Arkademy</title>
    <link href="6c/bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="6c/style.css" rel ="stylesheet" />
  </head>
  <body>
      <nav class="navbar fixed-top shadow p-2 mb-3 bg-white rounded">
        <a class="navbar-brand" href="#" style="color: #000;"><img src="6c/arkademy-logo.png" width="80" height="50"/>ARKADEMY BOOTCAMP</a>
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#add">Add Data</button>
      </nav>
      <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" name="Titel Modal">Add new data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body"> <!--Modal body -->
              <form action="" method="POST">
                <input type="text" class="form-control" name="_name" placeholder="Insert your name" />
                <br />
                <div class="form-group">
                  <select class="form-control" name="_id_work">
                    <option hidden>Select Work</option>
                    <option value="1">Front-End Dev.</option>
                    <option value="2">Back-End Dev.</option>
                  </select>
                  <br />
                  <select class="form-control" name="_id_salary">
                    <option hidden>Select Work</option>
                    <option value="1">10.000.000</option>
                    <option value="2">12.000.000</option>
                  </select>
                </div>
              </div>

              <div class="modal-footer">
                <button type="submit" class="btn btn-warning" name="_insert-data">Add Data</button>
              </div>
            </form> <!--end of form -->

          </div>
        </div>
      </div>
      <div class="starter-template">
      <main role="main" class="container">
        <table class="table table-bordered">
          <thead>
          <tr>
            <th>Name</th>
            <th>Work</th>
            <th>Salary</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php
          $ambil=$link->query("SELECT tblname.id AS id_name, tblname.name, tblwork.id, tblwork.name AS work_name, tblsalary.id, tblsalary.salary
             FROM tblname JOIN tblwork ON tblname.id_work=tblwork.id JOIN tblsalary ON tblname.id_salary=tblsalary.id") or die(mysqli_error($link));
          while ($tampil=$ambil->fetch_array()){
         ?>
        <tbody>
          <tr>
            <td><?php echo $tampil['name']; ?></td>
            <td><?php echo $tampil['work_name'] ?></td>
            <td><?php echo "Rp. "; echo number_format($tampil['salary'], 0, ".", "."); ?></td>
            <td><a class="btn btn-danger" href="hapus.php?id=<?php echo $tampil['id_name'];?>">Del</a>
              <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#edit<?php echo $tampil['id_name']?>">Edit
            </td>
          </tr>
        </tbody>

        <!--modal delete -->
        <div class="modal fade" id="del" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-body"> <!--Modal body -->
              <h5 align="center">Data berhasil didelete</h5>
            </div>
          </div>
          </form>
        </div>
      </div>
      <!--end of modal-->

        <!-- modal untuk edit -->
        <div class="modal fade" id="edit<?php echo $tampil['id_name'];?>" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" name="Titel Modal">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body"> <!--Modal body -->
                <form action="" method="POST">
                  <?php
                  $id = $tampil['id_name'];
                  $edit = $link->query("SELECT * FROM tblname WHERE id='$id'");
                  while($get=$edit->fetch_array()){
                   ?>
                  <input type="text" class="form-control"  name="_id" placeholder="Insert your name" value="<?php echo $id;?>"  style="visibility: hidden;"/>
                  <input type="text" class="form-control" name="_name" placeholder="Insert your name" value="<?php echo $get['name']; ?>"  />
                  <br />
                  <div class="form-group">
                    <select class="form-control" name="_id_work">
                      <?php
                        if($get['id_work']=='1'){
                          echo "<option hidden value='1'>Front-End Dev.</option>";
                        }else{
                          echo "<option hidden value='2'>Back-End Dev.</option>";
                        }
                      ?>
                      <option hidden></option>
                      <option value="1">Front-End Dev.</option>
                      <option value="2">Back-End Dev.</option>
                    </select>
                    <br />
                    <select class="form-control" name="_id_salary">
                      <?php
                        if($get['id_work']=='1'){
                          echo "<option hidden value='1'>10.000.000</option>";
                        }else{
                          echo "<option hidden value='2'>12.000.000</option>";
                        }
                      ?>
                      <option value="1">10.000.000</option>
                      <option value="2">12.000.000</option>
                    </select>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-warning" name="_edit-data">Edit Data</button>
                </div>
              </form> <!--end of form -->
            <?php } ?>
            </div>
          </div>
        </div>
        <!-- end of modal -->
      <?php } ?>
      </table>
      </main>
    </div>
    <!-- modal untuk delete -->
    </body>
      <script src="6c/jquery-3.4.1.min.js"></script>
      <script src="6c/bootstrap/js/bootstrap.js"></script>
      <script src="6c/bootstrap/js/bootstrap.bundle.js"></script>
</html>

<?php
  if(isset($_POST['_insert-data'])){
    $name=$_POST['_name'];
    $work=$_POST['_id_work'];
    $salary=$_POST['_id_salary'];

    $qry = $link->query("INSERT INTO tblname VALUES(
      '',
      '$name',
      '$work',
      '$salary'
    )")OR DIE(mysqli_Error($qry));
    if($qry){
      echo "<meta http-equiv='refresh' content='0'/>";
    }
  }
  elseif(isset($_POST['_edit-data'])){
    $id=$_POST['_id'];
    $name=$_POST['_name'];
    $work=$_POST['_id_work'];
    $salary=$_POST['_id_salary'];

    $qry=$link->query("UPDATE tblname SET
    name='$name',
    id_work='$work',
    id_salary='$salary'
    WHERE id='$id'
  ") or die (mysqli_error($qry));
  if($qry){
    echo "<meta http-equiv='refresh' content='0'/>";
  }
}
 ?>
