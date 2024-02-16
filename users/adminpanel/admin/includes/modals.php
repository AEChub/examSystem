<!-- Modal For Add Course -->
<div class="modal fade" id="modalForAddCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addCourseFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить группу</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Группы</label>
            <input type="" name="course_name" id="course_name" class="form-control" placeholder="Введите название группы" required="" autocomplete="off">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Update Course -->
<div class="modal fade myModal" id="updateCourse-<?php echo $selCourseRow['course_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
     <form class="refreshFrm" id="addCourseFrm" method="post" >
       <div class="modal-content myModal-content" >
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Изменить ( <?php echo $selCourseRow['course_name']; ?> )</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div class="form-group">
              <label>Группа</label>
              <input type="" name="course_name" id="course_name" class="form-control" value="<?php echo $selCourseRow['course_name']; ?>">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
          <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
      </div>
     </form>
    </div>
  </div>


<!-- Modal For Add Exam -->
<div class="modal fade" id="modalForExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить экзамен</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Выбрать группу</label>
            <select class="form-control" name="courseSelected">
              <option value="0">Не выбрана</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY course_id DESC");
                if($selCourse->rowCount() > 0)
                {
                  while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                     <option value="<?php echo $selCourseRow['course_id']; ?>"><?php echo $selCourseRow['course_name']; ?></option>
                  <?php }
                }
                else
                { ?>
                  <option value="0">Группа не найдена</option>
                <?php }
               ?>
            </select>
          </div>

          <div class="form-group">
            <label>Ограничение по времени</label>
            <select class="form-control" name="timeLimit" required="">
              <option value="0">Выбрать время</option>
              <option value="10">10 Минут</option> 
              <option value="20">20 Минут</option> 
              <option value="30">30 Минут</option> 
              <option value="40">40 Минут</option> 
              <option value="50">50 Минут</option> 
              <option value="60">60 Минут</option> 
            </select>
          </div>

          <div class="form-group">
            <label>Количество вопросов</label>
            <input type="number" name="examQuestDipLimit" id="" class="form-control" placeholder="Введите количество вопросов на экзамене">
          </div>

          <div class="form-group">
            <label>Название экзамена</label>
            <input type="" name="examTitle" class="form-control" placeholder="Введите название экзамена" required="">
          </div>

          <div class="form-group">
            <label>Описание экзамена</label>
            <textarea name="examDesc" class="form-control" rows="4" placeholder="Добавьте описание экзамена" required=""></textarea>
          </div>


        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </div>
   </form>
  </div>
</div>


<!-- Modal For Add Examinee -->
<div class="modal fade" id="modalForAddExaminee" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addExamineeFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавить студента</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>ФИО</label>
            <input type="" name="fullname" id="fullname" class="form-control" placeholder="Введите полное имя по удостоверению" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Дата рождения</label>
            <input type="date" name="bdate" id="bdate" class="form-control" placeholder="Input Birhdate" autocomplete="off" >
          </div>
          <div class="form-group">
            <label>Пол</label>
            <select class="form-control" name="gender" id="gender">
              <option value="0">Выберите пол</option>
              <option value="male">Мужской</option>
              <option value="female">Женский</option>
            </select>
          </div>
          <div class="form-group">
            <label>Группа</label>
            <select class="form-control" name="course" id="course">
              <option value="0">Выберите группу</option>
              <?php 
                $selCourse = $conn->query("SELECT * FROM course_tbl ORDER BY course_id asc");
                while ($selCourseRow = $selCourse->fetch(PDO::FETCH_ASSOC)) { ?>
                  <option value="<?php echo $selCourseRow['course_id']; ?>"><?php echo $selCourseRow['course_name']; ?></option>
                <?php }
               ?>
            </select>
          </div>
          <div class="form-group">
            <label>Курс обучения</label>
            <select class="form-control" name="year_level" id="year_level">
              <option value="0">Выберите курс</option>
              <option value="first year">1 курс</option>
              <option value="second year">2 курс</option>
              <option value="third year">3 курс</option>
              <option value="fourth year">4 курс</option>
            </select>
          </div>
          <div class="form-group">
            <label>Логин</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Введите логин" autocomplete="off" required="">
          </div>
          <div class="form-group">
            <label>Пароль</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Введите пароль" autocomplete="off" required="">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
    </div>
   </form>
  </div>
</div>



<!-- Modal For Add Question -->
<div class="modal fade" id="modalForAddQuestion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
   <form class="refreshFrm" id="addQuestionFrm" method="post">
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Добавьте вопрос для <br><?php echo $selExamRow['exam_title']; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="refreshFrm" method="post" id="addQuestionFrm">
      <div class="modal-body">
        <div class="col-md-12">
          <div class="form-group">
            <label>Вопрос</label>
            <input type="hidden" name="examId" value="<?php echo $exId; ?>">
            <input type="" name="question" id="course_name" class="form-control" placeholder="Введите вопрос корректно" autocomplete="off">
          </div>

          <fieldset>
            <legend>Варианты для выбора</legend>
            <div class="form-group">
                <label>Вариант A</label>
                <input type="" name="choice_A" id="choice_A" class="form-control" placeholder="Введите вариант A" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Вариант B</label>
                <input type="" name="choice_B" id="choice_B" class="form-control" placeholder="Введите вариант B" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Вариант C</label>
                <input type="" name="choice_C" id="choice_C" class="form-control" placeholder="Введите вариант C" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Вариант D</label>
                <input type="" name="choice_D" id="choice_D" class="form-control" placeholder="Введите вариант D" autocomplete="off">
            </div>

            <div class="form-group">
                <label>Правильный ответ</label>
                <input type="" name="correctAnswer" id="" class="form-control" placeholder="Введите правильный ответ" autocomplete="off">
            </div>
          </fieldset>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
        <button type="submit" class="btn btn-primary">Добавить</button>
      </div>
      </form>
    </div>
   </form>
  </div>
</div>