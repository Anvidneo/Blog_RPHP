<?php
class modific_model{
    private $db;
 
    public function __construct(){
        require_once("db/db.php");
        $this->db=Conect::connection();
        $this->db = $this->db['con'];
    }

    # FUNCTIONS TO USERS
    public function insert_user($param){
        # Generate query
        $sql = "INSERT INTO tbl_users (name, mail, password, phone, role, date_created, date_update) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Register user successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Register user error'
            );
        }
        
        # Return result
        return $data;
    }

    public function update_user($id, $name, $mail, $phone, $role, $date_update){
        # Generate query
        $sql = "UPDATE tbl_users SET name = '$name', mail = '$mail', phone = '$phone', role = $role, date_update = '$date_update' WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Update user successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Update user error'
            );
        }
        # Return result
        return $data;
    }

    public function delete_user($id){
        # Generate query
        $sql = "DELETE FROM tbl_users WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete user successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete user error'
            );
        }

        # Return result
        return $data;
    }

    # FUNCTIONS TO CATEGORIES
    public function insert_category($param){
        # Generate query
        $sql = "INSERT INTO tbl_categories (name, description) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Insert category successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Insert category error'
            );
        }
        
        # Return result
        return $data;
    }

    public function update_category($id, $name, $description){
        # Generate query
        $sql = "UPDATE tbl_categories SET name = '$name', description = '$description' WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Update category successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Update category error'
            );
        }
        # Return result
        return $data;
    }

    public function delete_category($id){
        # Generate query
        $sql = "DELETE FROM tbl_categories WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete user successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete user error'
            );
        }

        # Return result
        return $data;
    }

    # FUNCTIONS TO POSTS
    public function insert_post($param){
        # Generate query
        $sql = "INSERT INTO tbl_posts (id_autor, id_category, title, slug, text, text_large, image, date_update, date_created) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Insert post successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Insert post error'
            );
        }
        
        # Return result
        return $data;
    }

    public function update_post($id, $id_category, $title, $slug, $text, $text_large, $image, $date_update){
        # Generate query
        $sql = "UPDATE tbl_posts SET id_category = $id_category, title = '$title', slug = '$slug', text = '$text', text_large = '$text_large', image = '$image', date_update = '$date_update' WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Update post successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Update post error'
            );
        }
        # Return result
        return $data;
    }

    public function delete_post($id){
        # Generate query
        $sql = "DELETE FROM tbl_posts WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete user successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete user error'
            );
        }

        # Return result
        return $data;
    }

    # FUNCTIONS TO LIKES
    public function insert_like($param){
        # Generate query
        $sql = "INSERT INTO tbl_likes (id_autor, id_post, date_created) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Insert like successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Insert like error'
            );
        }
        
        # Return result
        return $data;
    }

    public function delete_like($id){
        # Generate query
        $sql = "DELETE FROM tbl_likes WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete like successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete like error'
            );
        }

        # Return result
        return $data;
    }
    
    # FUNCTIONS TO COMMENTS
    public function insert_comment($param){
        # Generate query
        $sql = "INSERT INTO tbl_comments (id_autor, id_post, text, date_created) VALUES ($param);";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Insert comment successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Insert comment error'
            );
        }
        
        # Return result
        return $data;
    }

    public function update_comment($id, $text){
        # Generate query
        $sql = "UPDATE tbl_comments SET text = '$text' WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Update comment successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Update comment error'
            );
        }
        # Return result
        return $data;
    }

    public function delete_comment($id){
        # Generate query
        $sql = "DELETE FROM tbl_comments WHERE id = $id;";
        if (mysqli_query($this->db, $sql)){
            $data = array(
                'state'     => 1,
                'message'   => 'Delete user successfully'
            );
        } else {
            $data = array(
                'state'     => 0,
                'message'   => 'Delete user error'
            );
        }

        # Return result
        return $data;
    }
}
?>
