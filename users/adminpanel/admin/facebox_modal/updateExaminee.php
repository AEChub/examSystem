
<?php 
  include("../../../conn.php");
  $id = $_GET['id'];
 
  $selExmne = $conn->query("SELECT * FROM examinee_tbl WHERE student_id='$id' ")->fetch(PDO::FETCH_ASSOC);

 ?>

<fieldset style="width:543px;" >
	<legend><i class="facebox-header"><i class="edit large icon"></i>&nbsp;Изменить <b>( <?php echo strtoupper($selExmne['student_fullname']); ?> )</b></i></legend>
  <div class="col-md-12 mt-4">
<form method="post" id="updateExamineeFrm">
     <div class="form-group">
        <legend>ФИО</legend>
        <input type="hidden" name="exmne_id" value="<?php echo $id; ?>">
        <input type="" name="exFullname" class="form-control" required="" value="<?php echo $selExmne['student_fullname']; ?>" >
     </div>

     <div class="form-group">
        <legend>Пол</legend>
        <select class="form-control" name="exGender">
          <option value="<?php echo $selExmne['student_sex']; ?>"><?php echo $selExmne['student_sex']; ?></option>
          <option value="male">Мужской</option>
          <option value="female">Женский</option>
        </select>
     </div>

     <div class="form-group">
        <legend>Дата рождения</legend>
        <input type="date" name="exBdate" class="form-control" required="" value="<?php echo date('Y-m-d',strtotime($selExmne["student_birthdate"])) ?>"/>
     </div>

     <div class="form-group">
        <legend>Группа</legend>
        <?php 
            $exmneCourse = $selExmne['student_course'];
            $selCourse = $conn->query("SELECT * FROM course_tbl WHERE course_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
         ?>
         <select class="form-control" name="exCourse">
           <option value="<?php echo $exmneCourse; ?>"><?php echo $selCourse['course_name']; ?></option>
           <?php 
             $selCourse = $conn->query("SELECT * FROM course_tbl WHERE course_id!='$exmneCourse' ");
             while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
              <option value="<?php echo $selCourseRow['course_id']; ?>"><?php echo $selCourseRow['course_name']; ?></option>
            <?php  }
            ?>
         </select>
     </div>

     <div class="form-group">
        <legend>Курс </legend>
        <input type="" name="exYrlvl" class="form-control" required="" value="<?php echo $selExmne['student_year_level']; ?>" >
     </div>

     <div class="form-group">
        <legend>Логин</legend>
        <input type="" name="exEmail" class="form-control" required="" value="<?php echo $selExmne['student_email']; ?>" >
     </div>

     <div class="form-group">
        <legend>Пароль</legend>
        <input type="" name="exPass" class="form-control" required="" value="<?php echo $selExmne['student_password']; ?>" >
     </div>

     <div class="form-group">
        <legend>Статус</legend>
        <input type="hidden" name="course_id" value="<?php echo $id; ?>">
        <input type="" name="newCourseName" class="form-control" required="" value="<?php echo $selExmne['student_status']; ?>" >
     </div>
  <div class="form-group" align="right">
    <button type="submit" class="btn btn-sm btn-primary">Обновить</button>
  </div>
</form>
  </div>
</fieldset>







