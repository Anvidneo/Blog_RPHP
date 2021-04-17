<?php
class delete_controller {
    private $db;

    public function delete_user($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->delete_user($id);
        
        # Return response
        return $data;
    }

    public function delete_category($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->delete_category($id);
        
        # Return response
        return $data;
    }

    public function delete_post($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->delete_post($id);
        
        # Return response
        return $data;
    }

    public function delete_like($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->delete_like($id);
        
        # Return response
        return $data;
    }

    public function delete_comment($post){
        # Define the variable
        $id = $post['id'];

        # Call the model
        require_once("models/modific_model.php");
        $con = new modific_model();
        $data = $con->delete_comment($id);
        
        # Return response
        return $data;
    }
}
?>
