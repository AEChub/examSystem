<link rel="stylesheet" type="text/css" href="css/mycss.css">
<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>Управление студентами</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Список студентов
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Пол</th>
                                <th>Дата рождения</th>
                                <th>Группа</th>
                                <th>Год обучения</th>
                                <th>Логин</th>
                                <th>Пароль</th>
                                <th>Статус</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExmne = $conn->query("SELECT * FROM examinee_tbl ORDER BY student_id DESC ");
                                if($selExmne->rowCount() > 0)
                                {
                                    while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                           <td><?php echo $selExmneRow['student_fullname']; ?></td>
                                           <td><?php echo $selExmneRow['student_sex']; ?></td>
                                           <td><?php echo $selExmneRow['student_birthdate']; ?></td>
                                           <td>
                                            <?php 
                                                $exmneCourse = $selExmneRow['student_course'];
                                                $selCourse = $conn->query("SELECT * FROM course_tbl WHERE course_id='$exmneCourse' ")->fetch(PDO::FETCH_ASSOC);
                                                echo $selCourse['course_name'];
                                             ?>
                                            </td>
                                           <td><?php echo $selExmneRow['student_year_level']; ?></td>
                                           <td><?php echo $selExmneRow['student_email']; ?></td>
                                           <td><?php echo $selExmneRow['student_password']; ?></td>
                                           <td><?php echo $selExmneRow['student_status']; ?></td>
                                           <td>
                                               <a rel="facebox" href="facebox_modal/updateExaminee.php?id=<?php echo $selExmneRow['student_id']; ?>" class="btn btn-sm btn-primary">Изменить</a>

                                           </td>
                                        </tr>
                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="2">
                                        <h3 class="p-3">Студенты найдены</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      
        
</div>
         
