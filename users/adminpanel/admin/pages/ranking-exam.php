<div class="app-main__outer">
        <div class="app-main__inner">
             


            <?php 
                @$exam_id = $_GET['exam_id'];


                if($exam_id != "")
                {
                   $selEx = $conn->query("SELECT * FROM exam_tbl WHERE exam_id='$exam_id' ")->fetch(PDO::FETCH_ASSOC);
                   $exam_course = $selEx['course_id'];

                   

                   $selExmne = $conn->query("SELECT * FROM examinee_tbl et  WHERE student_course='$exam_course'  ");


                   ?>
                   <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div><b class="text-primary">РЕЙТИНГ ПО РЕЗУЛЬТАТАМ ЭКЗАМЕНА</b><br>
                                Название экзамена : <?php echo $selEx['exam_title']; ?><br><br>
                                <span class="border" style="padding:10px;color:white;background-color: green;">Очень хорошо</span>
                                <span class="border" style="padding:10px;color:white;background-color: blue;">Хорошо</span>
                                <span class="border" style="padding:10px;color:black;background-color: yellow;">Удовлетворительно</span>
                                <span class="border" style="padding:10px;color:white;background-color: red;">Провалено</span>
                                <span class="border" style="padding:10px;color:black;background-color: #E9ECEE;">Пока нет ответа</span>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover" id="tableList">
                          <tbody>
                            <thead>
                                <tr>
                                    <th width="25%">ФИО </th>
                                    <th>Ответы</th>
                                    <th>В процентах</th>
                                </tr>
                            </thead>
                            <?php 
                                while ($selExmneRow = $selExmne->fetch(PDO::FETCH_ASSOC)) { ?>
                                    <?php 
                                            $exmneId = $selExmneRow['student_id'];
                                            $selScore = $conn->query("SELECT * FROM exam_question_tbl eqt INNER JOIN exam_answers ea ON eqt.question_id = ea.question_id AND eqt.exam_answer = ea.exam_answer  WHERE ea.student_id='$exmneId' AND ea.exam_id='$exam_id' AND ea.answer_status='new' ORDER BY ea.answer_id DESC");

                                              $selAttempt = $conn->query("SELECT * FROM exam_attempt WHERE student_id='$exmneId' AND exam_id='$exam_id' ");

                                             $over = $selEx['exam_questionlimit_display']  ;    


                                              @$score = $selScore->rowCount();
                                                @$ans = $score / $over * 100;

                                         ?>
                                       <tr style="<?php 
                                             if($selAttempt->rowCount() == 0)
                                             {
                                                echo "background-color: #E9ECEE;color:black";
                                             }
                                             else if($ans >= 90)
                                             {
                                                echo "background-color: yellow;";
                                             } 
                                             else if($ans >= 75){
                                                echo "background-color: green;color:white";
                                             }
                                             else if($ans >= 50){
                                                echo "background-color: blue;color:white";
                                             }
                                             else
                                             {
                                                echo "background-color: red;color:white";
                                             }
                                           
                                            
                                             ?>"
                                        >
                                        <td>

                                          <?php echo $selExmneRow['student_fullname']; ?></td>
                                        
                                        <td >
                                        <?php 
                                          if($selAttempt->rowCount() == 0)
                                          {
                                            echo "Пока нет ответа";
                                          }
                                          else if($selScore->rowCount() > 0)
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }
                                          else
                                          {
                                            echo $totScore =  $selScore->rowCount();
                                            echo " / ";
                                            echo $over;
                                          }

                                            
                                            

                                         ?>
                                        </td>
                                        <td>
                                          <?php 
                                                if($selAttempt->rowCount() == 0)
                                                {
                                                  echo "Пока нет данных";
                                                }
                                                else
                                                {
                                                    echo number_format($ans,2); ?>%<?php
                                                }
                                           
                                          ?>
                                        </td>
                                    </tr>
                                <?php }
                             ?>                              
                          </tbody>
                        </table>
                    </div>



                   <?php
                }
                else
                { ?>
                <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b>РЕЙТИНГ ПО РЕЗУЛЬТАТАМ ЭКЗАМЕНОВ (ПО ГРУППАМ)</b></div>
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
                                <th class="text-left pl-4">Название экзамена </th>
                                <th class="text-left ">Группа</th>
                                <th class="text-left ">Описание</th>
                                <th class="text-center" width="8%">Действие</th>
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
                                            <td class="text-center">
                                             <a href="?page=ranking-exam&exam_id=<?php echo $selExamRow['exam_id']; ?>"  class="btn btn-success btn-sm">Просмотр</a>
                                            </td>
                                        </tr>

                                    <?php }
                                }
                                else
                                { ?>
                                    <tr>
                                      <td colspan="5">
                                        <h3 class="p-3">Не найдено ни одного экзамена.</h3>
                                      </td>
                                    </tr>
                                <?php }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>   
                    
                <?php }

             ?>      
            
            
      
        
</div>
         


















