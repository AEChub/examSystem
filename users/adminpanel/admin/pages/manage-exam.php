<div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div>Управление экзаменами</div>
                    </div>
                </div>
            </div>        
            
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Список экзаменов
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                            <thead>
                            <tr>
                                <th class="text-left pl-4">Названия экзамена</th>
                                <th class="text-left">Группа</th>
                                <th class="text-left">Описание</th>
                                <th class="text-left">Временое ограничение</th>  
                                <th class="text-left">Кол-во вопросов</th>  
                                <th class="text-center" width="20%">Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                              <?php 
                                $selExam = $conn->query("SELECT * FROM exam_tbl ORDER BY exam_id DESC ");
                                if($selExam->rowCount() > 0)
                                {
                                    while ($selExamRow = $selExam->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td class="pl-4"><?php echo $selExamRow['exam_title']; ?></td>
                                            <td>
                                                <?php 
                                                    $courseId =  $selExamRow['course_id']; 
                                                    $selCourse = $conn->query("SELECT * FROM course_tbl WHERE course_id='$courseId' ");
                                                    while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) {
                                                        echo $selCourseRow['course_name'];
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $selExamRow['exam_description']; ?></td>
                                            <td><?php echo $selExamRow['exam_time_limit']; ?></td>
                                            <td><?php echo $selExamRow['exam_questionlimit_display']; ?></td>
                                            <td class="text-center">
                                             <a href="manage-exam.php?id=<?php echo $selExamRow['exam_id'];?>" type="button" class="btn btn-primary btn-sm">Изменить</a>
                                             <button type="button" id="deleteExam" data-id='<?php echo $selExamRow['exam_id'];?>' class="btn btn-danger btn-sm">Удалить</button>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">Не найдено ни одного экзамена</h3>
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
         
