<?php
session_start();
$user=$_SESSION["user"];
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Add Question | StudyNotes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/add_question_style.css">
    </head>

    <body>
        <div class="nav-fixed">
            <div class="navbar">
                <a href="home.php"><img class="logo" src="src/logo.png" alt="logo"></a>
            </div>
        </div>

        <form name="createQuestionForm" method="POST" action="add_question-query.php" id="createQuestionForm" onsubmit="required()">
            <div class="question-content">
                <center>
                <br><br><br>

                <label>Title: </label>
                <input type="text" id="question_title" name="question_title" required placeholder="Give this question sheet a title...">

                <!--Question 1-->
                <div class="question">
                    <label>Question 1</label>
                    <textarea name="question1" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer1" value="A"></input>
                        <textarea name="answer_1A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer1" value="B"></input>
                        <textarea name="answer_1B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer1" value="C"></input>
                        <textarea name="answer_1C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer1" value="D"></input>
                        <textarea name="answer_1D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 2-->
                <div class="question">
                    <label>Question 2</label>
                    <textarea name="question2" id="question_text" value="" required placeholder="Write your question here..."></textarea>
        
                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer2" value="A"></input>
                        <textarea name="answer_2A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer2" value="B"></input>
                        <textarea name="answer_2B" id="answer" value="" required placeholder="B."></textarea>
                    </div>
        
                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer2" value="C"></input>
                        <textarea name="answer_2C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer2" value="D"></input>
                        <textarea name="answer_2D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 3-->
                <div class="question">
                    <label>Question 3</label>
                    <textarea name="question3" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer3" value="A"></input>
                        <textarea name="answer_3A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer3" value="B"></input>
                        <textarea name="answer_3B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer3" value="C"></input>
                        <textarea name="answer_3C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer3" value="D"></input>
                        <textarea name="answer_3D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 4-->
                <div class="question">
                    <label>Question 4</label>
                    <textarea name="question4" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer4" value="A"></input>
                        <textarea name="answer_4A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer4" value="B"></input>
                        <textarea name="answer_4B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer4" value="C"></input>
                        <textarea name="answer_4C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer4" value="D"></input>
                        <textarea name="answer_4D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 5-->
                <div class="question">
                    <label>Question 5</label>
                    <textarea name="question5" id="question_text" value="" required placeholder="Write your question here..."></textarea>
        
                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer5" value="A"></input>
                        <textarea name="answer_5A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer5" value="B"></input>
                        <textarea name="answer_5B" id="answer" value="" required placeholder="B."></textarea>
                    </div>
        
                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer5" value="C"></input>
                        <textarea name="answer_5C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer5" value="D"></input>
                        <textarea name="answer_5D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 6-->
                <div class="question">
                    <label>Question 6</label>
                    <textarea name="question6" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer6" value="A"></input>
                        <textarea name="answer_6A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer6" value="B"></input>
                        <textarea name="answer_6B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer6" value="C"></input>
                        <textarea name="answer_6C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer6" value="D"></input>
                        <textarea name="answer_6D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 7-->
                <div class="question">
                    <label>Question 7</label>
                    <textarea name="question7" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer7" value="A"></input>
                        <textarea name="answer_7A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer7" value="B"></input>
                        <textarea name="answer_7B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer7" value="C"></input>
                        <textarea name="answer_7C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer7" value="D"></input>
                        <textarea name="answer_7D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 8-->
                <div class="question">
                    <label>Question 8</label>
                    <textarea name="question8" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer8" value="A"></input>
                        <textarea name="answer_8A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer8" value="B"></input>
                        <textarea name="answer_8B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer8" value="C"></input>
                        <textarea name="answer_8C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer8" value="D"></input>
                        <textarea name="answer_8D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 9-->
                <div class="question">
                    <label>Question 9</label>
                    <textarea name="question9" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer9" value="A"></input>
                        <textarea name="answer_9A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer9" value="B"></input>
                        <textarea name="answer_9B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer9" value="C"></input>
                        <textarea name="answer_9C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer9" value="D"></input>
                        <textarea name="answer_9D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <!--Question 10-->
                <div class="question">
                    <label>Question 10</label>
                    <textarea name="question10" id="question_text" value="" required placeholder="Write your question here..."></textarea>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer10" value="A"></input>
                        <textarea name="answer_10A" id="answer" value="" required placeholder="A."></textarea>
                        <input type="radio" id="radio_btn" name="answer10" value="B"></input>
                        <textarea name="answer_10B" id="answer" value="" required placeholder="B."></textarea>
                    </div>

                    <div class="radio">
                        <input type="radio" id="radio_btn" name="answer10" value="C"></input>
                        <textarea name="answer_10C" id="answer" value="" required placeholder="C."></textarea>
                        <input type="radio" id="radio_btn" name="answer10" value="D"></input>
                        <textarea name="answer_10D" id="answer" value="" required placeholder="D."></textarea>
                    </div>
                </div>

                <input type="submit" class="save_btn" value="Save"/>

            </form>

            <br><br><br><br><br>
        </center>
        </div>
    </body>
</html>