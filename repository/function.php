<?php 

class Users
{


	public function connection()
	{

		$dbname = "localhost";
		$user = "root";
		$password = "";
		$tablename = "recipe";

		$con = mysqli_connect($dbname,$user,$password,$tablename);
		return $con;
		
	}



	public function checkIfUserExists($email)
	{
		
		$fetchDetails = "SELECT * FROM users_table WHERE email = '$email' ";
		$query = mysqli_query($this->connection(), $fetchDetails);
		$num_row = mysqli_num_rows($query);

		if($num_row > 0)
		{

			return $row = mysqli_fetch_assoc($query);
			
		}
		else
		{
          return false;
		}
	}


	public function fetchAllRecipe()
	{
		$select = "SELECT recipe.id, recipe.title, image_table.image1 FROM recipe JOIN image_table ON recipe.id = image_table.recipeid";

		$rows = []; 
		$query = mysqli_query($this->connection(),$select);
		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

		// return $query;
		// $result = mysqli_query($connection, $query);
	}


	public function fetchRecipeById($id)
	{
		$select = "SELECT * FROM recipe WHERE id = '$id' ";

		$rows = []; 
		$query = mysqli_query($this->connection(),$select);
		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

	}

	public function fetchImagesByRecipeId($id)
	{
		$select = "SELECT * FROM image_table WHERE recipeid = '$id' ";

		$rows = []; 
		$query = mysqli_query($this->connection(),$select);
		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

	}


	public function fetchRecipeDirectionsByRecipeId($id)
	{
		$select = "SELECT * FROM direction_table WHERE recipeid = '$id' ";

		$rows = []; 
		$query = mysqli_query($this->connection(),$select);
		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

	}

	public function fetchRecipeNutritionsByRecipeId($id)
	{
		$select = "SELECT * FROM nutrition_table WHERE recipeid = '$id' ";

		$rows = []; 
		$query = mysqli_query($this->connection(),$select);
		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

	}

	public function fetchRecipeIngredientByRecipeId($id)
	{
		$select = "SELECT * FROM ingredient_table WHERE recipeid = '$id' ";

		$rows = []; 
		$query = mysqli_query($this->connection(),$select);
		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

	}



	public function addNewUser($POST)
	{
		$fullName = strtolower($POST["fullname"]);
		$email = strtolower($POST["email"]);
		$password = strtolower($POST["password"]);



	  	$insertValue = "INSERT INTO users_table(fullname, email, password, role) VALUES ('$fullName','$email','$password','regular')";

	 	$query = mysqli_query($this->connection(),$insertValue);
	 	// $lastInsertdedId = $this->Getlastinsertedid($query);

	 	if($query){
	 		return true;
	 	}else{

	 		return false;
	 	}
	}


	public function getUserIdUsingEmail($email)
	{
		$fetchDetails = "SELECT id FROM users_table WHERE email = '$email'  ";
		$query = mysqli_query($this->connection(), $fetchDetails);
		$num_row = mysqli_num_rows($query);

		if($num_row > 0)
		{

			return $row = mysqli_fetch_assoc($query);
			
		}
		else
		{
          return false;
		}
	}



	public function UpdateProfile($POST)
	{
		$email =  $POST["email"];
		$newemail = $POST["newemail"];
		$fullname = $POST["fullname"];

		$fetchDetails = "SELECT id FROM users_table WHERE email = '$email' ";
		$query = mysqli_query($this->connection(), $fetchDetails);
		$num_row = mysqli_num_rows($query);

		if($num_row > 0)
		{
			$row = mysqli_fetch_assoc($query);
			$return["id"];
			$sqlUpdate = "UPDATE users_table SET email='$newemail', fullname='$fullname'  WHERE  email ='$email' ";
			$query = mysqli_query($this->connection(), $sqlUpdate);
			return true;
		}
		else
		{
			return false;
		}

		
	}


	public function addNewRecipe($email, $title, $description, $location)
	{
		$id = $this->getUserIdUsingEmail($email);
		$uid = $id["id"];
		$fetchDetails = "INSERT INTO recipe(userid, title, description, location) VALUES ('$uid','$title','$description','$location'); ";
		$query = mysqli_query($this->connection(), $fetchDetails);
		

		if($query)
		{
			// return $id["id"];
			// $insertedId =  mysqli_insert_id($this->connection());
			// return $insertedId;

			// $result = mysqli_query($this->connection(), "SELECT LAST_INSERT_ID()");
   //  		$row = mysqli_fetch_assoc($result);
   //  		$insertedId = $row['LAST_INSERT_ID()'];
   //  		return $row;

			$query = "SELECT id FROM recipe ORDER BY id DESC LIMIT 1";
			$result = mysqli_query($this->connection(), $query);
			$row = mysqli_fetch_assoc($result);
    		return $lastInsertedId = $row['id'];
		}
		else
		{
          return false;
		}


	}



	public function saveIngredient($recipeId, $POST)
	{
	   	$arrayOfIngridents = $POST["ingredients"];
	   	$arrayOfSetups = $POST["setups"];
	   	$xplode = explode(",", $arrayOfIngridents);
	   	$count = count($xplode);
	   	// return $count;

	   	switch ($count) {
	   		case 1:
	   			 $savedIngredient =  $this->saveOneIngredients($recipeId,$POST["ingredients"]);
	   			 return $savedIngredient;
	   			break;

	   		case 2: 
	   			$savedIngredient = $this->saveTwoIngredients($recipeId, $xplode[0],$xplode[1]);
	   			return $savedIngredient;
	   			break;

	   		case 3: 
	   			$savedIngredient = $this->saveThreeIngredients($recipeId, $xplode[0],$xplode[1],$xplode[2]);
	   			return $savedIngredient;
	   			break;

	   		case 4: 
	   			$savedIngredient = $this->saveFourIngredients($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3]);
	   			return $savedIngredient;
	   			break;

	   		case 5: 
	   			$savedIngredient = $this->saveFiveIngredients($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3], $xplode[4]);
	   			return $savedIngredient;
	   			break;

	   		case 6: 
	   			$savedIngredient = $this->saveSixIngredients($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3], $xplode[4], $xplode[5]);
	   			return $savedIngredient;
	   			break;

	   		case 7: 
	   			$savedIngredient = $this->saveSevenIngredients($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3], $xplode[4], $xplode[5], $xplode[6]);
	   			return $savedIngredient;
	   			break;

	   		case 8: 
	   			$savedIngredient = $this->saveEightIngredients($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3],$xplode[4],$xplode[5],$xplode[6],$xplode[7]);
	   			return $savedIngredient;
	   			break;

	   		case 9: 
	   			$savedIngredient = $this->saveNineIngredients($recipeId,$xplode[0],$xplode[1],$xplode[2],$xplode[3],$xplode[4],$xplode[5],$xplode[6],$xplode[7],$xplode[8]);
	   			return $savedIngredient;
	   			break;

	   		case 10: 
	   			$savedIngredient = $this->saveTenIngredients($recipeId,$xplode[0],$xplode[1],$xplode[2],$xplode[3],$xplode[4],$xplode[5],$xplode[6],$xplode[7],$xplode[8],$xplode[9]);
	   			return $savedIngredient;
	   			break;

	   		
	   		default:
	   			return false;
	   			break;
	   	}

	}


	public function saveOneIngredients($recipeId, $ingredient)
	{

		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient','','','','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;

	}



	public function saveTwoIngredients($recipeId, $ingredient, $ingredient2)
	{
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient','$ingredient2','','','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveThreeIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}




	public function saveFourIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}



	public function saveFiveIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$ingredient5','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveSixIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5, $ingredient6)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$ingredient5','$ingredient6','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveSevenIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5, $ingredient6, $ingredient7)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$ingredient5','$ingredient6','$ingredient7','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}



	public function saveEightIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5, $ingredient6, $ingredient7, $ingredient8)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$ingredient5','$ingredient6','$ingredient7','$ingredient8','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveNineIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5, $ingredient6, $ingredient7, $ingredient8, $ingredient9)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$ingredient5','$ingredient6','$ingredient7','$ingredient8','$ingredient9','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveTenIngredients($recipeId, $ingredient1, $ingredient2, $ingredient3, $ingredient4, $ingredient5, $ingredient6, $ingredient7, $ingredient8, $ingredient9, $ingredient10)
	{ 
		$sql = "INSERT INTO ingredient_table(recipeid, ingredient1, ingredient2, ingredient3, ingredient4, ingredient5, ingredient6, ingredient7, ingredient8, ingredient9, ingredient10) VALUES ('$recipeId','$ingredient1','$ingredient2','$ingredient3','$ingredient4','$ingredient5','$ingredient6','$ingredient7','$ingredient8','$ingredient9','$ingredient10')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}













	public function saveStep($recipeId, $POST)
	{
	   	$arrayOfSetups = $POST["steps"];
	   	$xplode = explode(",", $arrayOfSetups);
	   	$count = count($xplode);

	   	switch ($count) {

	   		case 1:
	   			 $savedStep = $this->saveOneStep($recipeId,$POST["steps"]);
	   			 return $savedStep;
	   			break;

	   		case 2: 
	   			$savedStep = $this->saveTwoSteps($recipeId, $xplode[0],$xplode[1]);
	   			return $savedStep;
	   			break;

	   		case 3: 
	   			$savedStep = $this->saveThreeSteps($recipeId, $xplode[0],$xplode[1], $xplode[2]);
	   			return $savedStep;
	   			break;

	   		case 4: 
	   			$savedStep = $this->saveFourSteps($recipeId, $xplode[0],$xplode[1], $xplode[2], $xplode[3]);
	   			return $savedStep;
	   			break;

	   		case 5: 
	   			$savedStep = $this->saveFiveSteps($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3], $xplode[4]);
	   			return $savedStep;
	   			break;

	   		case 6: 
	   			$savedStep = $this->saveSixSteps($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3], $xplode[4], $xplode[5]);
	   			return $savedStep;
	   			break;

	   		case 7: 
	   			$savedStep = $this->saveSevenSteps($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3], $xplode[4], $xplode[5], $xplode[6]);
	   			return $savedStep;
	   			break;

	   		case 8: 
	   			$savedStep = $this->saveEightSteps($recipeId, $xplode[0],$xplode[1],$xplode[2],$xplode[3],$xplode[4],$xplode[5],$xplode[6],$xplode[7]);
	   			return $savedStep;
	   			break;

	   		case 9: 
	   			$savedStep = $this->saveNineSteps($recipeId,$xplode[0],$xplode[1],$xplode[2],$xplode[3],$xplode[4],$xplode[5],$xplode[6],$xplode[7],$xplode[8]);
	   			return $savedStep;
	   			break;

	   		case 10: 
	   			$savedStep = $this->saveTenSteps($recipeId,$xplode[0],$xplode[1],$xplode[2],$xplode[3],$xplode[4],$xplode[5],$xplode[6],$xplode[7],$xplode[8],$xplode[9]);
	   			return $savedStep;
	   			break;

	   		
	   		default:
	   			return false;
	   			break;
	   	}

	}




	public function saveOneStep($recipeId, $step)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','','','','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveTwoSteps($recipeId, $step, $step2)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','','','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveThreeSteps($recipeId, $step, $step2, $step3)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	// public function saveThreeSteps($recipeId, $step, $step2, $step3)
	// {
	// 	$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','step2','$step3','','','','','','','')";
	// 	$query = mysqli_query($this->connection(), $sql);
	// 	return $query;
	// }


	public function saveFourSteps($recipeId, $step, $step2, $step3, $step4)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveFiveSteps($recipeId, $step, $step2, $step3, $step4, $step5)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','$step5','','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}



	public function saveSixSteps($recipeId, $step, $step2, $step3, $step4, $step5, $step6)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','$step5','$step6','','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}



	public function saveSevenSteps($recipeId, $step, $step2, $step3, $step4, $step5, $step6,$step7)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','$step5','$step6','$step7','','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveEightSteps($recipeId, $step, $step2, $step3, $step4, $step5, $step6, $step7, $step8)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','$step5','$step6','$step7','$step8','','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveNineSteps($recipeId, $step, $step2, $step3, $step4, $step5, $step6, $step7, $step8, $step9)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','$step5','$step6','$step7','$step8','$step9','')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}


	public function saveTenSteps($recipeId, $step, $step2, $step3, $step4, $step5, $step6, $step7, $step8, $step9)
	{
		$sql = "INSERT INTO direction_table(recipeid, dir1, dir2, dir3, dir4, dir5, dir6, dir7, dir8, dir9, dir10) VALUES ('$recipeId','$step','$step2','$step3','$step4','$step5','$step6','$step7','$step8','$step9','$step10')";
		$query = mysqli_query($this->connection(), $sql);
		return $query;
	}









	public function uploadFiles($recipeId, $FILES)
	{

		$arrayOfImages = $FILES["images"];
	   	$imagesName = $arrayOfImages["name"];
	   	$count = count($imagesName);
	   	
	   	// return $FILES["images"];

		switch ($count) {

	   		case 1:
	   			 $savedPhoto = $this->saveOnePhoto($recipeId, $FILES["images"],$imagesName);
	   			 return $savedPhoto;
	   			break;

	   		case 2: 
	   			
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];
	   			
	   			$savedStep = $this->saveTwoPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2);
	   			return $savedStep;
	   			break;

	   		case 3: 

	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$savedStep = $this->saveThreePhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3);
	   			return $savedStep;
	   			break;

	   		case 4: 	

	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$savedStep = $this->saveFourPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4);
	   			return $savedStep;
	   			break;

	   		case 5: 
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$name5 = $FILES["images"]["name"][4]; 
	   			$type5 = $FILES["images"]["type"][4];
	   			$tmp_name5 = $FILES["images"]["tmp_name"][4];

	   			$savedStep = $this->saveFivePhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4,$name5, $type5, $tmp_name5);
	   			return $savedStep;
	   			break;

	   		case 6: 
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$name5 = $FILES["images"]["name"][4]; 
	   			$type5 = $FILES["images"]["type"][4];
	   			$tmp_name5 = $FILES["images"]["tmp_name"][4];

	   			$name6 = $FILES["images"]["name"][5]; 
	   			$type6 = $FILES["images"]["type"][5];
	   			$tmp_name6 = $FILES["images"]["tmp_name"][5];

	   			$savedStep = $this->saveSixPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4,$name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6);
	   			return $savedStep;
	   			break;

	   		case 7: 
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$name5 = $FILES["images"]["name"][4]; 
	   			$type5 = $FILES["images"]["type"][4];
	   			$tmp_name5 = $FILES["images"]["tmp_name"][4];

	   			$name6 = $FILES["images"]["name"][5]; 
	   			$type6 = $FILES["images"]["type"][5];
	   			$tmp_name6 = $FILES["images"]["tmp_name"][5];

	   			$name7 = $FILES["images"]["name"][6]; 
	   			$type7 = $FILES["images"]["type"][6];
	   			$tmp_name7 = $FILES["images"]["tmp_name"][6];

	   			$savedStep = $this->saveSevenPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4,$name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7);
	   			return $savedStep;
	   			break;

	   		case 8: 
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$name5 = $FILES["images"]["name"][4]; 
	   			$type5 = $FILES["images"]["type"][4];
	   			$tmp_name5 = $FILES["images"]["tmp_name"][4];

	   			$name6 = $FILES["images"]["name"][5]; 
	   			$type6 = $FILES["images"]["type"][5];
	   			$tmp_name6 = $FILES["images"]["tmp_name"][5];

	   			$name7 = $FILES["images"]["name"][6]; 
	   			$type7 = $FILES["images"]["type"][6];
	   			$tmp_name7 = $FILES["images"]["tmp_name"][6];

	   			$name8 = $FILES["images"]["name"][7]; 
	   			$type8 = $FILES["images"]["type"][7];
	   			$tmp_name8 = $FILES["images"]["tmp_name"][7];

	   			$savedStep = $this->saveEightPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4,$name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7, $name8, $type8, $tmp_name8);
	   			return $savedStep;
	   			break;

	   		case 9: 
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$name5 = $FILES["images"]["name"][4]; 
	   			$type5 = $FILES["images"]["type"][4];
	   			$tmp_name5 = $FILES["images"]["tmp_name"][4];

	   			$name6 = $FILES["images"]["name"][5]; 
	   			$type6 = $FILES["images"]["type"][5];
	   			$tmp_name6 = $FILES["images"]["tmp_name"][5];

	   			$name7 = $FILES["images"]["name"][6]; 
	   			$type7 = $FILES["images"]["type"][6];
	   			$tmp_name7 = $FILES["images"]["tmp_name"][6];

	   			$name8 = $FILES["images"]["name"][7]; 
	   			$type8 = $FILES["images"]["type"][7];
	   			$tmp_name8 = $FILES["images"]["tmp_name"][7];

	   			$name9 = $FILES["images"]["name"][8]; 
	   			$type9 = $FILES["images"]["type"][8];
	   			$tmp_name9 = $FILES["images"]["tmp_name"][8];

	   			$savedStep = $this->saveNinePhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4,$name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7, $name8, $type8, $tmp_name8, $name9, $type9, $tmp_name9);
	   			return $savedStep;
	   			break;

	   		case 10: 
	   			$name = $FILES["images"]["name"][0]; 
	   			$type = $FILES["images"]["type"][0];
	   			$tmp_name = $FILES["images"]["tmp_name"][0];

	   			$name2 = $FILES["images"]["name"][1]; 
	   			$type2 = $FILES["images"]["type"][1];
	   			$tmp_name2 = $FILES["images"]["tmp_name"][1];

	   			$name3 = $FILES["images"]["name"][2]; 
	   			$type3 = $FILES["images"]["type"][2];
	   			$tmp_name3 = $FILES["images"]["tmp_name"][2];

	   			$name4 = $FILES["images"]["name"][3]; 
	   			$type4 = $FILES["images"]["type"][3];
	   			$tmp_name4 = $FILES["images"]["tmp_name"][3];

	   			$name5 = $FILES["images"]["name"][4]; 
	   			$type5 = $FILES["images"]["type"][4];
	   			$tmp_name5 = $FILES["images"]["tmp_name"][4];

	   			$name6 = $FILES["images"]["name"][5]; 
	   			$type6 = $FILES["images"]["type"][5];
	   			$tmp_name6 = $FILES["images"]["tmp_name"][5];

	   			$name7 = $FILES["images"]["name"][6]; 
	   			$type7 = $FILES["images"]["type"][6];
	   			$tmp_name7 = $FILES["images"]["tmp_name"][6];

	   			$name8 = $FILES["images"]["name"][7]; 
	   			$type8 = $FILES["images"]["type"][7];
	   			$tmp_name8 = $FILES["images"]["tmp_name"][7];

	   			$name9 = $FILES["images"]["name"][8]; 
	   			$type9 = $FILES["images"]["type"][8];
	   			$tmp_name9 = $FILES["images"]["tmp_name"][8];

	   			$name10 = $FILES["images"]["name"][9]; 
	   			$type10 = $FILES["images"]["type"][9];
	   			$tmp_name10 = $FILES["images"]["tmp_name"][9];

	   			$savedStep = $this->saveTenPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, 
						$name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4,$name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7, $name8, $type8, $tmp_name8, $name9, $type9, $tmp_name9, $name10, $type10, $tmp_name10);
	   			return $savedStep;
	   			break;

	   		
	   		default:
	   			return false;
	   			break;
	   	}

		// $id = $this->getUserIdUsingEmail($email);
		// $uid = $id["id"];

		// // $fetchDetails = "INSERT INTO recipe(userid, title, description, location) VALUES ('$uid','$title','$description','$location'); ";

		// $sqlUpload = "INSERT INTO image_table(id, recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]','[value-12]')";

		// $query = mysqli_query($this->connection(), $sqlUpload);


		
		

		// if($query)
		// {
		// 	return $id["id"];
		// }
		// else
		// {
  //         return false;
		// }


	}




	public function saveOnePhoto($recipeId, $photo, $name)
	{

		// $name = $photo["name"];
		// $tmp_name = $photo["tmp_name"];
		// return $name[0];
		$type = $photo["type"];
		$ext = str_replace("image/", "", $type);
	 	$allowed = ["jpg","jpeg","png","gif"];
	 	$in_array = in_array($ext[0], $allowed);
	 	

	 	if($in_array){

			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name[0]','','','','','','','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}


	}



	public function saveTwoPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);
	 	

	 	if($in_array and $in_array2){

			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','','','','','','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}




	public function saveThreePhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','','','','','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}



	public function saveFourPhoto($recipeId, $name, $type, $tmp_name,$name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3,$name4, $type4, $tmp_name4)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','','','','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}



		public function saveFivePhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4, $name5, $type5, $tmp_name5)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;

		$name5 = $name5;
		$tmp_name5 = $tmp_name5;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','$name5','','','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}




	public function saveSixPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4, $name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;

		$name5 = $name5;
		$tmp_name5 = $tmp_name5;

		$name6 = $name6;
		$tmp_name6 = $tmp_name6;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','$name5','$name6','','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}




		public function saveSevenPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4, $name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;

		$name5 = $name5;
		$tmp_name5 = $tmp_name5;

		$name6 = $name6;
		$tmp_name6 = $tmp_name6;

		$name7 = $name7;
		$tmp_name7 = $tmp_name7;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','$name5','$name6','$name7','','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}


	public function saveEightPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4, $name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7, $name8, $type8, $tmp_name8)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;

		$name5 = $name5;
		$tmp_name5 = $tmp_name5;

		$name6 = $name6;
		$tmp_name6 = $tmp_name6;

		$name7 = $name7;
		$tmp_name7 = $tmp_name7;

		$name8 = $name8;
		$tmp_name8 = $tmp_name8;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','$name5','$name6','$name7','$name8','','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}



	public function saveNinePhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4, $name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7, $name8, $type8, $tmp_name8, $name9, $type9, $tmp_name9)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;

		$name5 = $name5;
		$tmp_name5 = $tmp_name5;

		$name6 = $name6;
		$tmp_name6 = $tmp_name6;

		$name7 = $name7;
		$tmp_name7 = $tmp_name7;

		$name8 = $name8;
		$tmp_name8 = $tmp_name8;

		$name9 = $name9;
		$tmp_name9 = $tmp_name9;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','$name5','$name6','$name7','$name8','$name9','')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}



	public function saveTenPhoto($recipeId, $name, $type, $tmp_name, $name2, $type2, $tmp_name2, $name3, $type3, $tmp_name3, $name4, $type4, $tmp_name4, $name5, $type5, $tmp_name5, $name6, $type6, $tmp_name6, $name7, $type7, $tmp_name7, $name8, $type8, $tmp_name8, $name9, $type9, $tmp_name9, $name10, $type10, $tmp_name10)
	{
		$allowed = ["jpg","jpeg","png","gif"];

		$name = $name;
		$tmp_name = $tmp_name;
		$type = $type;
		$ext = str_replace("image/", "", $type);
	 	$in_array = in_array($ext, $allowed);


	 	$name2 = $name2;
		$tmp_name2 = $tmp_name2;
		$type2 = $type2;
		$ext2 = str_replace("image/", "", $type2);
	 	$in_array2 = in_array($ext2, $allowed);


	 	$name3 = $name3;
		$tmp_name3 = $tmp_name3;
		$type3 = $type3;
		$ext3 = str_replace("image/", "", $type3);
	 	$in_array3 = in_array($ext3, $allowed);

	 	$name4 = $name4;
		$tmp_name4 = $tmp_name4;

		$name5 = $name5;
		$tmp_name5 = $tmp_name5;

		$name6 = $name6;
		$tmp_name6 = $tmp_name6;

		$name7 = $name7;
		$tmp_name7 = $tmp_name7;

		$name8 = $name8;
		$tmp_name8 = $tmp_name8;

		$name9 = $name9;
		$tmp_name9 = $tmp_name9;

		$name10 = $name10;
		$tmp_name10 = $tmp_name10;
	 	

	 	if($in_array and $in_array2 and $in_array3){


			$sql = "INSERT INTO image_table(recipeid, image1, image2, image3, image4, image5, image6, image7, image8, image9, image10) VALUES ('$recipeId','$name','$name2','$name3','$name4','$name5','$name6','$name7','$name8','$name9','$name10')";
			$query = mysqli_query($this->connection(), $sql);
			return $query;
				
	 	}
	 	else
	 	{
	 		return false;
	 	}

	}









	public function userLogin($POST)
	{
		$email = $POST["email"];
		$password = $POST["password"];

		$fetchDetails = "SELECT fullname, email, role FROM users_table WHERE email = '$email' and password = '$password' ";
		$query = mysqli_query($this->connection(), $fetchDetails);
		$num_row = mysqli_num_rows($query);

		if($num_row > 0)
		{

			return $row = mysqli_fetch_assoc($query);
			
		}
		else
		{
          return false;
		}

	}



	public function getUserProfileDetails($email)
	{
		$selectQuery = "SELECT fullname, email, role FROM users_table WHERE email = '$email' ";
	 	$query = mysqli_query($this->connection(),$selectQuery);

	 	if(mysqli_num_rows($query)){
	 		$row = mysqli_fetch_assoc($query);                                                                             
	 		return $row;
	 	}else{
	 		return false;
	 	}
	}



	public function saveNutrients($recipeid, $serving, $calories, $nutritions, $value, $percentage, $count) 
	{
        
        $query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving', '$calories', '$nutritions', '$value', '$percentage')";


        switch ($count) {

        	case 1:

        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

			        if ($result) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }


        		break;


        	case 2:
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

			        if ($result and $result2) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;


        	case 3:
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);


			        if ($result and $result2 and $result3) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;


        		case 4:

        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

			        if ($result and $result2 and $result3 and $result4) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;


        		case 5:
        		
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

        		 	$query5 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[4]', '$calories[4]', '$nutritions[4]', '$value[4]', '$percentage[4]')";
        		 	$result5 = mysqli_query($this->connection(), $query5);


			        if ($result and $result2 and $result3 and $result4 and $result5) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;



        		case 6:
        		
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

        		 	$query5 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[4]', '$calories[4]', '$nutritions[4]', '$value[4]', '$percentage[4]')";
        		 	$result5 = mysqli_query($this->connection(), $query5);

        		 	$query6 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[5]', '$calories[5]', '$nutritions[5]', '$value[5]', '$percentage[5]')";
        		 	$result6 = mysqli_query($this->connection(), $query6);




			        if ($result and $result2 and $result3 and $result4 and $result5 and $result6) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;


        		case 7:
        		
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

        		 	$query5 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[4]', '$calories[4]', '$nutritions[4]', '$value[4]', '$percentage[4]')";
        		 	$result5 = mysqli_query($this->connection(), $query5);

        		 	$query6 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[5]', '$calories[5]', '$nutritions[5]', '$value[5]', '$percentage[5]')";
        		 	$result6 = mysqli_query($this->connection(), $query6);

        		 	$query7 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[6]', '$calories[6]', '$nutritions[6]', '$value[6]', '$percentage[6]')";
        		 	$result7 = mysqli_query($this->connection(), $query7);




			        if ($result and $result2 and $result3 and $result4 and $result5 and $result6 and $result7) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;



        		case 8:
        		
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

        		 	$query5 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[4]', '$calories[4]', '$nutritions[4]', '$value[4]', '$percentage[4]')";
        		 	$result5 = mysqli_query($this->connection(), $query5);

        		 	$query6 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[5]', '$calories[5]', '$nutritions[5]', '$value[5]', '$percentage[5]')";
        		 	$result6 = mysqli_query($this->connection(), $query6);

        		 	$query7 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[6]', '$calories[6]', '$nutritions[6]', '$value[6]', '$percentage[6]')";
        		 	$result7 = mysqli_query($this->connection(), $query7);

        		 	$query8 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[7]', '$calories[7]', '$nutritions[7]', '$value[7]', '$percentage[7]')";
        		 	$result8 = mysqli_query($this->connection(), $query8);




			        if ($result and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;


        		case 9:
        		
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

        		 	$query5 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[4]', '$calories[4]', '$nutritions[4]', '$value[4]', '$percentage[4]')";
        		 	$result5 = mysqli_query($this->connection(), $query5);

        		 	$query6 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[5]', '$calories[5]', '$nutritions[5]', '$value[5]', '$percentage[5]')";
        		 	$result6 = mysqli_query($this->connection(), $query6);

        		 	$query7 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[6]', '$calories[6]', '$nutritions[6]', '$value[6]', '$percentage[6]')";
        		 	$result7 = mysqli_query($this->connection(), $query7);

        		 	$query8 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[7]', '$calories[7]', '$nutritions[7]', '$value[7]', '$percentage[7]')";
        		 	$result8 = mysqli_query($this->connection(), $query8);

        		 	$query9 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[8]', '$calories[8]', '$nutritions[8]', '$value[8]', '$percentage[8]')";
        		 	$result9 = mysqli_query($this->connection(), $query9);




			        if ($result and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8 and $result9) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;


        		case 10:
        		
        		$query = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[0]', '$calories[0]', '$nutritions[0]', '$value[0]', '$percentage[0]')";
        		 	$result = mysqli_query($this->connection(), $query);

        		 	$query2 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[1]', '$calories[1]', '$nutritions[1]', '$value[1]', '$percentage[1]')";
        		 	$result2 = mysqli_query($this->connection(), $query2);

        		 	$query3 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[2]', '$calories[2]', '$nutritions[2]', '$value[2]', '$percentage[2]')";
        		 	$result3 = mysqli_query($this->connection(), $query3);

        		 	$query4 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[3]', '$calories[3]', '$nutritions[3]', '$value[3]', '$percentage[3]')";
        		 	$result4 = mysqli_query($this->connection(), $query4);

        		 	$query5 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[4]', '$calories[4]', '$nutritions[4]', '$value[4]', '$percentage[4]')";
        		 	$result5 = mysqli_query($this->connection(), $query5);

        		 	$query6 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[5]', '$calories[5]', '$nutritions[5]', '$value[5]', '$percentage[5]')";
        		 	$result6 = mysqli_query($this->connection(), $query6);

        		 	$query7 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[6]', '$calories[6]', '$nutritions[6]', '$value[6]', '$percentage[6]')";
        		 	$result7 = mysqli_query($this->connection(), $query7);

        		 	$query8 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[7]', '$calories[7]', '$nutritions[7]', '$value[7]', '$percentage[7]')";
        		 	$result8 = mysqli_query($this->connection(), $query8);

        		 	$query9 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[8]', '$calories[8]', '$nutritions[8]', '$value[8]', '$percentage[8]')";
        		 	$result9 = mysqli_query($this->connection(), $query9);

        		 	$query10 = "INSERT INTO nutrition_table(recipeid, serving, calories, nutrition_value, value, percentage) VALUES ('$recipeid', '$serving[9]', '$calories[9]', '$nutritions[9]', '$value[9]', '$percentage[9]')";
        		 	$result10 = mysqli_query($this->connection(), $query10);



			        if ($result and $result2 and $result3 and $result4 and $result5 and $result6 and $result7 and $result8 and $result9 and $result10) {
			            
			            return "Nutrients saved successfully";
			        } else {
			            
			            return "Error: " . mysqli_error($this->connection());
			        }
        		break;

        	
        	default:
        		return false;
        		break;
        }
       
    }



	public function Getlastinsertedid($email)
	{
		$selectQuery = "SELECT id FROM users_table WHERE email = '$email' ";
	 	$query = mysqli_query($this->connection(),$selectQuery);

	 	if(mysqli_num_rows($query)){
	 		$row = mysqli_fetch_assoc($query);                                                                             
	 		return $row['id'];
	 	}else{
	 		return false;
	 	}
	}



	public function GetRecipes()
	{
		$selectQuery = "SELECT * FROM recipe";
		$query = mysqli_query($this->connection(), $selectQuery);

		$rows = []; 

		
		while ($row = mysqli_fetch_assoc($query)) {
		    
		    $rows[] = $row;
		}

		return $rows; 

	 	
	}

	


}


// $c = new Users();
// $c->connection();