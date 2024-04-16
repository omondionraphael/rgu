<?php 

require_once("config.php");
require_once("function.php");

// $request_body = file_get_contents('php://input');
// $data = json_decode($request_body, true);

 $method = $_SERVER['REQUEST_METHOD'];
// $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
 $action = $_POST['action'];



// echo json_encode($action);
// return;








switch ($action) {

	case 'insert':

	        $lastname = mysqli_real_escape_string($con,$_POST["lastname"]);
			// $midname = mysqli_real_escape_string($con,$_POST["midname"]);
			$phone = mysqli_real_escape_string($con,$_POST["phone"]);
			$email = mysqli_real_escape_string($con,$_POST["email"]);
			$staffid = mysqli_real_escape_string($con,$_POST["fileNumber"]);
			$school = mysqli_real_escape_string($con,$_POST["school"]);
			$department = mysqli_real_escape_string($con,$_POST["department"]);
			// $matric = mysqli_real_escape_string($con,$_POST["matric"]);
			$firstname = mysqli_real_escape_string($con,$_POST["firstname"]);
			

		     // $file = $_FILES["uploaded"]["name"];

		    $file = $_FILES["uploaded"]["name"];
	 		$extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	 		$allowed = array("jpg","jpeg","png","gif");
	 		$in_array = in_array($extension, $allowed);

            $objStudent = new Student();


	 		if($in_array){
	 			$rndName = mt_rand().".".$extension;
	 			$move_file = move_uploaded_file($_FILES["uploaded"]["tmp_name"], "../uploads/".$rndName);
	 			
	 			if($move_file){
	 				$queryResult = $objStudent->addNewStaff($firstname, $lastname, $staffid, $school, $department , $email, $phone, $rndName);
	 				// $queryResult = $objStudent->connection();
	 				//echo json_encode("File Moved");
	 				//echo json_encode($queryResult);
	 				//return;
	 				if($queryResult > 0){
	 					echo json_encode(['id'=>$queryResult]);
	 				}else{

	 					echo json_encode("value not inserted".mysqli_error($con));
	 				}

	 			}else{

	 				echo json_encode("Error uploading file");
	 			}

		    }
		    else
		    {
		    	$msg = array("error"=>"File type is not allowed", "state"=>true);
		    	echo json_encode($msg);
		    }
		    
		break;

	case 'delete':
		# code...
		break;

	case 'update':

		   $firstname = $_POST["firstname"];
		   $lastname=$_POST["lastname"];
		   $phone=$_POST["phone"];
		   $school=$_POST["school"];
		   $department=$_POST["department"];
		   $fileNumber=$_POST["fileNumber"];
		   $id=$_POST["id"];

		   $update = new Student();
		   $updateResult = $update->updateEntry($firstname,$lastname,$phone,$school,$department, $fileNumber,$id);
		   
		   if($updateResult)
		   {
		   	echo json_encode(['status'=>true, 'msg'=>$updateResult]);
		   }
		   else
		   {
		   	echo json_encode(['status'=>false, 'msg'=>$updateResult]);
		   }

		break;

	case 'login':


		  $username = mysqli_real_escape_string($con,$_POST["username"]);
		  $password = mysqli_real_escape_string($con,$_POST["adminpassword"]);

		  $objAdmin = new Student();
		  $query = $objAdmin->adminLogin($username,$password);

		  // echo json_encode($query);
		 

		 if($objAdmin->adminLogin($username,$password)){

		 	$arrayReturned = array( "status"=>true);
		 	echo json_encode($arrayReturned);
		 }
		 else{

		 	$arrayReturned = array("status"=>false, "error"=>"Incorrect Username/Password");
		 	echo json_encode($arrayReturned);
		 }

		break;

	case 'validate':

		   $id = $_POST["id"];
		   // $action = $_POST["action"];
		   $objStudent = new Student();
		   $values = $objStudent->fetchAParticularStaff($id);
		   // echo json_encode($values);
		   if($values){
		   		$arrayReturned = array("status"=>true, "particulars"=>$values);
		 	    echo json_encode($arrayReturned);
		   }else{

		   		$arrayReturned = array("status"=>false);
		 	    echo json_encode($arrayReturned);
		   }
		   

		   // echo json_encode($id);
		
		break;

		case 'fetchforupdate':
		    $id = $_POST["id"];
		   // $action = $_POST["action"];
		   $objStudent = new Student();
		   $values = $objStudent->fetchAndUpdate($id);
		   // echo json_encode($values);
		   if($values){
		   		$arrayReturned = array("status"=>true, "particulars"=>$values);
		 	    echo json_encode($arrayReturned);
		   }else{

		   		$arrayReturned = array("status"=>false);
		 	    echo json_encode($arrayReturned);
		   }
			break;

		case 'validatebarcode':
			//echo json_encode($_POST["barcode"]);
		   $collectedbarcode = $_POST["barcode"];

		   $objStudent = new Student();
		   $values = $objStudent->fetchAParticularStaffByBarcode($collectedbarcode);
		   // echo json_encode($values);
		   if($values){
		   		$arrayReturned = array("status"=>true, "particulars"=>$values);
		 	    echo json_encode($arrayReturned);
		   }else{

		   		$arrayReturned = array("status"=>false);
		 	    echo json_encode($arrayReturned);
		   }

		break;


		case 'getallschools':
			try {
				     $objStudent = new Student();
                     $getSchools = $objStudent->GetSchools($_POST['id']);
                     echo json_encode(['status'=>true, "success"=>$getSchools]);
                 } catch (Exception $ex)
                 {
                     echo json_encode(['status'=>false, "error"=>true]);
                 }

			break;

	
	default:
		# code...
		break;
}