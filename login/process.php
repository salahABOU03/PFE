<?php
	$sig_string=$_POST['signature'];
	$nama_file="one.png";
	file_put_contents($nama_file, file_get_contents($sig_string));
	if(file_exists($nama_file)){
		echo "<p>File Signature berhasil disimpan - ".$nama_file."</p>";
		echo "<p style='border:solid 1px teal;width:355px;height:110px;'><img src='".$nama_file."'></p>";

		$host = "localhost";
        $user = "root";
        $password = "";
        $dbname = "gi";

      // Create connection
      $conn = new mysqli($host, $user, $password, $dbname);

      // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
	   
    //////////////////////////////////////    Create a table in the database to store the image
	
	  /* $sql = "CREATE TABLE images (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		name VARCHAR(30) NOT NULL,
		image LONGBLOB NOT NULL
		)";
		
		if ($conn->query($sql) === TRUE) {
			echo "Table created successfully";
		} else {
			echo "Error creating table: " . $conn->error;
		} */
		
    //////////////////////////////            covert to binari

	       $image = addslashes(file_get_contents($sig_string));
           $image_name = addslashes($_FILES['image']['name']);
    
	
    ///////////////////////////////              insertion 
	
	$sql = "INSERT INTO images (name, image)
            VALUES ('$image_name', '$image')";

       if ($conn->query($sql) === TRUE) {
         echo "Image uploaded successfully";
		 header('Location: login.php');
       } else {
         echo "Error uploading image: " . $conn->error;
     }
	 
	}

?>