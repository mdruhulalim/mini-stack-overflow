<?php
include('database.php');
class Question extends Database{
    // addQuestion SQL query
    public function addQuestion($title, $details, $user_id){
        $created_at=date('y-m-d H:i:s');
        $query = "INSERT INTO questions (title, details, user_id, created_at) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $title, $details, $user_id, $created_at);
        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }
    
    // getQuestion with users.username SQL query
    public function getQuestion($search = ''){
        if($search == ""){
            $query = "SELECT q.*, u.username FROM questions q JOIN users u ON q.user_id = u.ID";
            $result = mysqli_query($this->conn,$query);
            $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }else{
            $query = "SELECT q.*, u.username FROM questions q JOIN users u ON q.user_id = u.ID WHERE q.title LIKE '%$search%'";
            $result = mysqli_query($this->conn,$query);
            $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
        
        return $questions;
    }

    // getOneQuestion SQL query
    public function getOneQuestion($q_id){
        $query = "SELECT * FROM `questions` WHERE ID=$q_id";
        $result = mysqli_query($this->conn,$query);
        $question = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $question;
    }

    // addAnswer
    public function addAnswer($question_id, $user_id, $details){
        $query = "INSERT INTO answers (question_id, user_id, details) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $question_id, $user_id, $details);
        if ($stmt->execute()){
            return true;
        } else {
            return false;
        }
    }

    // getAnswer
    public function getAnswer($q_id){
        $query = "SELECT a.*, u.username FROM answers a JOIN users u ON a.user_id = u.ID WHERE a.question_id = $q_id";
        $result = mysqli_query($this->conn,$query);
        $answers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $answers;
    }

    // updateQuestion
    public function updateQuestion($title, $details, $question_id){
        $query = "UPDATE `questions` SET `title`='$title',`details`='$details' WHERE $question_id = ID";
        $stmt = mysqli_query($this->conn, $query);
        return $stmt;
    }

    // deleteQuestion
    public function deleteQuestion($q_id){
        $query="DELETE FROM `questions` WHERE ID=$q_id";
        $stmt=mysqli_query($this->conn,$query);
        return $stmt;
    }
    

}