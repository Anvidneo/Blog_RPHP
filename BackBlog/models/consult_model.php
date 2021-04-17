<?php
class consult_model{
    private $db;
 
    public function __construct(){
        require_once("db/db.php");
        $this->db=Conect::connection();
        $this->db = $this->db['con'];
    }

    public function get_user($mail, $pass){
        # Generate query
        $sql = "SELECT name, role FROM tbl_users as a WHERE a.mail = '$mail' AND a.password = '$pass'";
        $result = mysqli_query($this->db, $sql);
        while($row = mysqli_fetch_array($result)){
            $data = $row;
        }

        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }

    public function get_users($role = ''){
        # Validate the role
        if ($role == '') {
            $where = "WHERE role != ''";
        } else {
            $where = "WHERE role = '$role'";
        }

        # Generate query
        $sql = "SELECT id, name, mail, phone, role, date_created, date_update FROM tbl_users as a $where";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id'            =>$row['id'],
                'name'          =>$row['name'],
                'mail'          =>$row['mail'],
                'phone'         =>$row['phone'],
                'role'          =>$row['role'],
                'date_created'  =>$row['date_created'],
                'date_update'   =>$row['date_update']
            );
        }
        
        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }

    public function get_categories($id = ''){
        # Validate the role
        if ($id == '') {
            $where = "WHERE id != ''";
        } else {
            $where = "WHERE id = '$id'";
        }

        # Generate query
        $sql = "SELECT * FROM tbl_categories as a $where";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id'            =>$row['id'],
                'name'          =>$row['name'],
                'description'   =>$row['description']
            );
        }
        
        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }

    public function get_posts($id = '', $category = ''){
        # Validate the id and category
        $where  = ($id == '') ? "WHERE id != ''": "WHERE id = '$id'";
        $where2 = ($category == '') ? "": "AND id_category = '$category'";

        # Generate query
        $sql = "SELECT a.* FROM tbl_posts as a $where $where2";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){

            $likes      = $this->get_likes($row['id']);
            $comments   = $this->get_comments($row['id']);

            $data[] = array(
                'id'            =>$row['id'],
                'id_autor'      => $row['id_autor'],
                'id_category'   => $row['id_category'],
                'title'         => $row['title'],
                'slug'          => $row['slug'],
                'text'          => $row['text'],
                'text_large'    => $row['text_large'],
                'image'         => $row['image'],
                'date_update'   => $row['date_update'],
                'date_created'  => $row['date_created'],
                'likes'         => $likes,
                'comments'      => $comments
            );
        }
        
        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }
    
    public function get_likes($id){
        # Validate the id
        $where  = "WHERE id_post = '$id'";

        # Generate query
        $sql = "SELECT a.* FROM tbl_likes as a $where";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id'      => $row['id'],
                'id_autor'      => $row['id_autor'],
                'id_post'       => $row['id_post'],
                'date_created'  => $row['date_created']
            );
        }

        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }

    public function get_comments($id){
        # Validate the id
        $where  = "WHERE id_post = '$id'";

        # Generate query
        $sql = "SELECT a.* FROM tbl_comments as a $where";
        $result = mysqli_query($this->db, $sql);
        $data = [];
        while($row = mysqli_fetch_array($result)){
            $data[] = array(
                'id'      => $row['id'],
                'id_autor'      => $row['id_autor'],
                'id_post'       => $row['id_post'],
                'text'          => $row['text'],
                'date_created'  => $row['date_created']
            );
        }
    
        # Return result
        if (isset($data)) {
            return $data;
        } else { 
            return null; 
        }
    }
}
?>
