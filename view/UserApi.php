<?php 
	
	require_once("../repository/config.php");
    require_once("../repository/function.php");
    require_once("../repository/validate.php");

    // $data = json_decode(file_get_contents('php://input'), true);
 	$method = $_SERVER['REQUEST_METHOD'];
 	$action = $_POST['action'];
 	$validate = new Validate();
	$repo = new Users();

		// echo json_encode($action);
		// return;
	
	if(!empty($method))
	{
		// echo json_encode($method);
		// return;
		switch ($method) {

			case 'POST':

					if($action == "login")
					{
						$validateLoginCred = $validate->validateLoginCredentials($_POST);
						
						if($validateLoginCred)
						{
							$isLoginValid = $repo->userLogin($_POST);
							
							if($isLoginValid)
							{
								
								http_response_code(200);
								header('Content-Type: application/json');
								$msg = array(

									"status"=>true,
									"message"=>"login success, redirecting......",
									"info"=> $isLoginValid
								);
								echo json_encode($msg);  
							}
							else
							{
								
								http_response_code(400);
								header('Content-Type: application/json');
								$msg = array(

									"status"=>false,
									"message"=>"Incorrect username or password",
									"info"=> $isLoginValid
								);
								echo json_encode($msg);
							}

						}
						else
						{

							http_response_code(400);
								header('Content-Type: application/json');
								$msg = [

									"status"=>false,
									"message"=>"Provide valid credentials",
									"info"=> $isLoginValid
								];
								echo json_encode($msg);

						}
					}

					else if($action == "register")
					{
						$email = $_POST["email"];
						$isAlreadyRegistered = $repo->checkIfUserExists($email);
						$res = $validate->validateAddUser($_POST);

						if($isAlreadyRegistered)
						{

							header('Content-Type: application/json');

							$msg = [

								"success"=>false,
								"message"=> "User already exist"
							];

							echo json_encode($msg);

						}
						else
						{
							
							if($res)
							{
								$isAdded = $repo->addNewUser($_POST); 
								http_response_code(201);
								header('Content-Type: application/json');

								$msg = [

									"success"=>true,
									"message"=> "Registration Successful"
								];

								echo json_encode($msg);
							}
							else
							{
								http_response_code(500);
								header('Content-Type: application/json');

								$msg = [

									"success"=>false,
									"message"=> "Internal Error"
								];

								echo json_encode($msg);
							}
						}

						

					}

					else if($action == "upload")
					{
						header('Content-Type: application/json');

						$msg = [

							"success"=>true,
							"message"=> $_FILES
						];
						echo json_encode($msg);
					}
					else if($action == "createRecipe")
					{
						// echo json_encode($_POST);
						// return;
						// // $isGuideSaved = $repo->saveGuide($recipeId=1,$_POST);
						// echo json_encode($isGuideSaved);
						// return;7


						$calories =  $_POST["calories"];
						$nutritions = $_POST["nutrition_value"];
						$value = $_POST["value"];
						$percentage = $_POST["percentage"];
						$serving = $_POST["servings"];
						// echo json_encode($serving[0]);
						// return;

						// $numberofLoops = count($calories);
						
						// $array = [];
						
						// for ($i = 0; $i < $numberofLoops; $i++) {
						    
						//     $valuex =  $i; 

						//     $array[] = $valuex;
						// }


						// foreach ($array as $i) {
						    
						//     $nutrition = $nutritions[$i];
						//     $value = $value[$i];
						//     $calories = $calories[$i];
						//     $serving = $serving[$i];
						//     $percentage = $percentage[$i];

						    
						//    ; $response = $repo->saveNutrients($recipeid=1, $serving, $calories, $nutrition, $value, $percentage);
						    
						//     echo json_encode($response);
						    
						// }

						header('Content-Type: application/json');
						$email = $_POST["email"];
						$title = $_POST["recipetitle"];
						$description = $_POST["description"];
						$location = $_POST["location"];

						


						$isNewRecipeAdded = $repo->addNewRecipe($email, $title, $description, $location);
						$fileList = [];
						$inFiles = [];

						if($isNewRecipeAdded > 0)
						{

							$recipeId = $isNewRecipeAdded;
							$numberofLoops = count($calories);

							// echo json_encode($_FILES);
							// return;
							
							

							$isIngredientSaved = $repo->saveIngredient($recipeId,$_POST);

							$isStepsSaved = $repo->saveStep($recipeId, $_POST);

							$isNutrients = $repo->saveNutrients($recipeId, $serving, $calories, $nutritions, $value, $percentage, $numberofLoops);


							if($isIngredientSaved and $isStepsSaved and $isNutrients)
							{
								 if(!empty($_FILES))
								 {
									$targetDirectory = '../uploads/';

									$count = count($_FILES["images"]["name"]);
									if($count == 1)
									{
										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);
											$targetFile = $targetDirectory .$_FILES['images']['name'][0];
											$fileHandle = fopen($targetFile, 'w');
											fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][0]));
											fclose($fileHandle);
											echo json_encode(true);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
									}


									if($count == 2)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);
											$targetFile = $targetDirectory .$_FILES['images']['name'][0];
											$fileHandle = fopen($targetFile, 'w');
											fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][0]));
											fclose($fileHandle);

											// $isFileUploaded2 = $repo->uploadFiles($recipeId, $_FILES);
											$targetFile2 = $targetDirectory .$_FILES['images']['name'][1];
											$fileHandle2 = fopen($targetFile2, 'w');
											fwrite($fileHandle2, file_get_contents($_FILES['images']['tmp_name'][1]));
											fclose($fileHandle2);

											echo json_encode(array($isFileUploaded));

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}

									}

									if($count == 3)
									{
										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
									}


									if($count == 4)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}


									}


									if($count == 5)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}


									}



									if($count == 6)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
										

									}


									if($count == 7)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
										

									}


									if($count == 8)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
										

									}


									if($count == 9)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
										

									}


									if($count == 10)
									{

										try
										{
											$isFileUploaded = $repo->uploadFiles($recipeId, $_FILES);

											for($i=0; $i < $count; $i++)
											{
												$targetFile = $targetDirectory .$_FILES['images']['name'][$i];
												$fileHandle = fopen($targetFile, 'w');
												fwrite($fileHandle, file_get_contents($_FILES['images']['tmp_name'][$i]));
												fclose($fileHandle);
											}
											
											echo json_encode($isFileUploaded);

										}
										catch(Exception $e)
										{
											echo json_encode($e->message());
										}
										

									}




								}

							}
							else
							{
								echo json_encode("your record insertions");
							}


						}


						
					}
					else if($action == "getAll")
					{
						header('Content-Type: application/json');
			    		$allRecipe = $repo->GetRecipes();
			    		echo json_encode($allRecipe);
					}

					else if($action == "update")
					{
						$updateResult = $repo->UpdateProfile($_POST);

						if($updateResult)
						{
							$result = [
								"success"=>true,
								"message"=>"Record successfully updated"
							];
							echo json_encode($result);
						}
						else
						{
							$result = [
								"success"=>true,
								"message"=>"Record successfully updated"
							];
							echo json_encode($result);
						}
						
					}

					else if($action == "getAllRecipe")
					{
						$recipeList = $repo->fetchAllRecipe();
						echo json_encode($recipeList);
					}


					else if($action == "getRecipe")
					{
						$id = $_POST["id"];

						$directions = $repo->fetchRecipeDirectionsByRecipeId($id);
						$images = $repo->fetchImagesByRecipeId($id);
						$nutritions = $repo->fetchRecipeNutritionsByRecipeId($id);
						$ingredient = $repo->fetchRecipeIngredientByRecipeId($id);
						$recipe = $repo->fetchRecipeById($id);

						$singleRecipe = [

							"recipe"=>$recipe,
							"image"=> $images,
							"directions"=>$directions,
							"nutritions"=>$nutritions,
							"ingredient"=>$ingredient
						];
						echo json_encode($singleRecipe);
					}

				break;

			case 'GET':

			    if($_GET["email"])
			    {
			    	header('Content-Type: application/json');
					$email = $_GET["email"];
					$userdetails = $repo->getUserProfileDetails($email);
					echo json_encode($userdetails);
			    }

			    // if($_GET["action"])
			    // {
			    // 	header('Content-Type: application/json');
			    // 	$allRecipe = $repo->GetRecipes();
			    // 	echo json_encode($allRecipe);
			    // }
				
				break;

			
			default:
				# code...
				break;
		}

		
	}
	else
	{
		
	    http_response_code(400); // Bad request
	    echo json_encode(array('error' => 'Invalid or empty JSON payload'));

		   
	}































































































