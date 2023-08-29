<?php
class Galley{

    private $conn;
    private $table_name = "imagegallery";
    private $videogallery = "videogallery";
    private $news_gallery = "news_gallery";

    public $id, $image_name, $galleryTitle, $galleryDescription, $newsTitle, $newsDescription,  $videoTitle, $videoDescription, $status, $created_on, $created_by;

    public function __construct($db){
        $this->conn = $db;
    }

    // code for image gallery

    function insert_galleryimg(){
  
        // query to insert record
    $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                         galleryTitle=:galleryTitle, 
                         galleryDescription=:galleryDescription, 
                         created_by=:created_by, 
                         created_on=:created_on
                    "; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->galleryTitle=htmlspecialchars(strip_tags($this->galleryTitle));
        $this->galleryDescription=htmlspecialchars(strip_tags($this->galleryDescription));
        $this->created_by=htmlspecialchars(strip_tags($this->created_by));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));
        
        //bind values
        $stmt->bindParam(":galleryTitle", $this->galleryTitle);
        $stmt->bindParam(":galleryDescription", $this->galleryDescription);
        $stmt->bindParam(":created_by", $this->created_by);
        $stmt->bindParam(":created_on", $this->created_on);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }

    function read_gallery_maxId(){
        $query="Select max(id) as id from " . $this->table_name;
        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

    function read_gallery(){
        $query="Select 
        id, galleryTitle, galleryDescription, created_on, created_by
        
        from " .$this->table_name;
        $stmt = $this->conn->prepare($query); 
        // $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }

  function deleteGallery(){
  
    //delete query
    $query = " DELETE FROM " . $this->table_name . " 
    WHERE id= ? ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}

// code for video gallery

function insert_gallery_video(){
  
        // query to insert record
    $query = "INSERT INTO
                    " . $this->videogallery . "
                SET
                         videoTitle=:videoTitle, 
                         videoDescription=:videoDescription, 
                         created_by=:created_by, 
                         created_on=:created_on
                    "; 
                          
        // prepare query
        $stmt = $this->conn->prepare($query);
        $this->videoTitle=htmlspecialchars(strip_tags($this->videoTitle));
        $this->videoDescription=htmlspecialchars(strip_tags($this->videoDescription));
        $this->created_by=htmlspecialchars(strip_tags($this->created_by));
        $this->created_on=htmlspecialchars(strip_tags($this->created_on));
        
        //bind values
        $stmt->bindParam(":videoTitle", $this->videoTitle);
        $stmt->bindParam(":videoDescription", $this->videoDescription);
        $stmt->bindParam(":created_by", $this->created_by);
        $stmt->bindParam(":created_on", $this->created_on);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
          
    }

    function read_video_maxId(){
        $query="Select max(id) as id from " . $this->videogallery;
        $stmt = $this->conn->prepare($query); 
        $stmt->execute();
        return $stmt;
    }

    function read_gallery_video(){
        $query="Select 
        id, videoTitle, videoDescription, created_on, created_by
        from " .$this->videogallery;
        $stmt = $this->conn->prepare($query); 
        // $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
  
    function deleteVideoGallery(){
  
        //delete query
        $query = " DELETE FROM " . $this->videogallery . " 
        WHERE id= ? ";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
      
        // execute query
        if($stmt->execute()){
            return true;
        }
      
        return false;
    }


    // code for news gallery

function insert_gallery_news(){
  
    // query to insert record
$query = "INSERT INTO
                " . $this->news_gallery . "
            SET
                     newsTitle=:newsTitle, 
                     newsDescription=:newsDescription, 
                     created_by=:created_by, 
                     created_on=:created_on
                "; 
                      
    // prepare query
    $stmt = $this->conn->prepare($query);
    $this->newsTitle=htmlspecialchars(strip_tags($this->newsTitle));
    $this->newsDescription=htmlspecialchars(strip_tags($this->newsDescription));
    $this->created_by=htmlspecialchars(strip_tags($this->created_by));
    $this->created_on=htmlspecialchars(strip_tags($this->created_on));
    
    //bind values
    $stmt->bindParam(":newsTitle", $this->newsTitle);
    $stmt->bindParam(":newsDescription", $this->newsDescription);
    $stmt->bindParam(":created_by", $this->created_by);
    $stmt->bindParam(":created_on", $this->created_on);

    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}

function read_news_maxId(){
    $query="Select max(id) as id from " . $this->news_gallery;
    $stmt = $this->conn->prepare($query); 
    $stmt->execute();
    return $stmt;
}

function read_gallery_news(){
    $query="Select 
    id, newsTitle, newsDescription, created_on, created_by
    from " .$this->news_gallery;
    $stmt = $this->conn->prepare($query); 
    // $stmt->bindParam(":id", $this->id);
    $stmt->execute();
    return $stmt;
}

function deleteNewsGallery(){

    //delete query
    $query = " DELETE FROM " . $this->news_gallery . " 
    WHERE id= ? ";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
  
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
}


}
?>