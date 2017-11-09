<?php
	include_once('./common.php');
	
	$status = checkStatus();
	$usertype = checkUserType();
	debug_to_console("user: " . $_SESSION['usertype']);
	
	$message = getMessage();
	// echo($_SESSION['userID']);

  /* User registers */
  if (isset($_POST['registerBtn']))
  {
		// Get user input
		$firstname  = isset($_POST['firstname']) ? $_POST['firstname'] : '';
		$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		/* Validate email address */
		$regexp = "/^[a-zA-Z0-9_\.]+@[a-zA-Z0-9\-]+([.][a-zA-Z0-9\-]+)*[.][a-zA-Z]{2,3}$/";
 
		if(!preg_match($regexp, $email))
		{
			echo("Invalid email entered");
		}
		else if($password == '')   
		{
			echo("No password entered");
		}
		else if($firstname == '')
		{
			echo("No first name entered");
		}
		else if($lastname == '')
		{
			echo("No last name entered");
		}
		else
		{
			// Register the user
			$result = registerUser($firstname, $lastname, $email, $password, $visits);
		}
  }
  
  /* User signs in */
  if (isset($_POST['signInBtn']))
  {
		// Get user input
		$email  = isset($_POST['email']) ? $_POST['email'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';

		// Sign in the user
		signInUser($email,$password);
  }
  
  /* User signs out */
  if(isset($_POST['signOutBtn']))
  {
    signOutUser();
  }
  
  /* Admin user promotes another user from normal to admin user */
  if(isset($_POST['promoteUserBtn']))
  {
    $userID = isset($_POST['promoteUserBtn']) ? $_POST['promoteUserBtn'] : '';
    promoteUser($userID);
  }
  
  if(isset($_POST['mobilePromoteUserBtn']))
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $userID = getUserID($email);
    echo $userID;
    //promoteUser($userID);
  }
  
  /* Admin user demotes another user from admin to normal user */
  if(isset($_POST['demoteUserBtn']))
  {
    $userID = isset($_POST['demoteUserBtn']) ? $_POST['demoteUserBtn'] : '';
    demoteUser($userID);
  }
  
  if(isset($_POST['mobileDemoteUserBtn']))
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $userID = getUserID($email);
    demoteUser($userID);
  }
  
  /* Admin user removes another user from Paw Companions */
  if(isset($_POST['confirmRemoveUserBtn']))
  {
    $userID = isset($_POST['confirmRemoveUserBtn']) ? $_POST['confirmRemoveUserBtn'] : '';
    deleteUser($userID);
    phpAlert("The user has been removed from Paw Companions.");
  }
  
  if(isset($_POST['mobileConfirmRemoveUserBtn']))
  {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $userID = getUserID($email);
    deleteUser($userID);
    phpAlert("The user has been removed from Paw Companions.");
  }
  
  /* Use removes self from Paw Companions */
  if (isset($_POST['confirmDeregisterBtn']))
  {
		$userID = $_SESSION['userID'];
    deleteUser($userID);
    phpAlert("You have deregisted yourself from Paw Companions.");
  }
  
  /* Add pet */
  if (isset($_POST['addPetBtn']))
  {
    if(getimagesize($_FILES['image']['tmp_name'])== FALSE)
		{
			echo "please select image.";
		}
		else
		{
		  $imageData = addslashes($_FILES['image']['tmp_name']);
		  $imageName = addslashes($_FILES['image']['name']);
			$imageData = file_get_contents($imageData);
			$imageData = base64_encode($imageData);
		
		  // Get pet input
      $rspcaID = $_POST['rspcaID'];
      $petName = $_POST['petName'];
      $breedID = $_POST['breedID'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $description = $_POST['description'];
    
      if($rspcaID == '')
      {
        phpAlert("Could not add pet to the database.");
      } 
      else 
      { 
        addPet($rspcaID, $petName, $breedID, $age, $gender, $imageName, $description, $imageData);
        phpAlert("The pet was added to the database.");
      }
  	}
  }
  
  /* Update pet */
  if (isset($_POST['updatePetBtn']))
  {
    $rspcaID = $_POST['rspcaID'];
    
    if ($_FILES['image']['name'])
    {
      $imageData = addslashes($_FILES['image']['tmp_name']);
	    $imageName = addslashes($_FILES['image']['name']);
		  $imageData = file_get_contents($imageData);
		  $imageData = base64_encode($imageData);
		  
      $petName = $_POST['petName'];
      $breedID = $_POST['breedID'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $description = $_POST['description'];

      updatePetWithImage($rspcaID, $petName, $breedID, $age, $gender, $imageName, $description, $imageData);
      phpAlert("The pet was updated in the database.");
    }
    else
    {
      $petName = $_POST['petName'];
      $breedID = $_POST['breedID'];
      $age = $_POST['age'];
      $gender = $_POST['gender'];
      $description = $_POST['description'];
  
      updatePetWithoutImage($rspcaID, $petName, $breedID, $age, $gender, $description);
      phpAlert("The pet was updated in the database.");
    }
  }
  
  /* Remove pet */
  if(isset($_POST['removePetBtn']))
  {
    $rspcaID = $_POST['removePetBtn'];
    removePet($rspcaID);
    phpAlert("The pet was removed from the database.");
  }
  
  /* Add breed */
  if (isset($_POST['addBreedBtn']))
  {
		// Get breed input
		$breedSpecies = isset($_POST['breedSpecies']) ? $_POST['breedSpecies'] : '';
    $breedName = isset($_POST['breedName']) ? $_POST['breedName'] : '';
    $breedSize = isset($_POST['breedSize']) ? $_POST['breedSize'] : '';
    $breedTemperament = isset($_POST['breedTemperament']) ? $_POST['breedTemperament'] : '';
    $breedActive = isset($_POST['breedActive']) ? $_POST['breedActive'] : '';
    $breedFee = isset($_POST['breedFee']) ? $_POST['breedFee'] : '';
    
    if($breedSpecies == '')
    {
      // 
    } 
    else 
    {
      addBreed($breedSpecies, $breedName, $breedSize, $breedTemperament, $breedActive, $breedFee);
      phpAlert("The breed was added to the database.");
    }
  }
  
  /* Update breed */
  if (isset($_POST['updateBreedBtn']))
  {
    $breedID = $_POST['breedID'];
    $breedType = $_POST['breedType'];
    $breedSize = $_POST['breedSize'];
    $breedTemperament = $_POST['breedTemperament'];
    $breedActive = $_POST['breedActive'];
    $breedName = $_POST['breedName'];
    $breedFee = $_POST['breedFee'];
  
    updateBreed($breedID, $breedType, $breedSize, $breedTemperament, $breedActive, $breedName, $breedFee);
    phpAlert("The breed was updated in the database.");
  }
  
  /* Remove breed */
  if (isset($_POST['removeBreedBtn']))
  {
    $breedID = $_POST['removeBreedBtn'];
    removeBreed($breedID);
    phpAlert("The breed was removed from the database.");
  }
  
  /* Collect values from sliders in questionnaire  */
  if (isset($_POST['submitQuestionnaireBtn']))
  {
		// Get pet input
    $adultsHome = $_POST['adultsHome'];
    $childrenHome = $_POST['childrenHome'];
    $howActive = $_POST['howActive'];
    $howOftenHome = $_POST['howOftenHome'];
    $petSelection = $_POST['petSelection'];
    $petSize = $_POST['petSize'];
    $petTemperament = $_POST['petTemperament'];
    $petGender = $_POST['petGender'];
    
    if ($childrenHome != 1)
    {
      $childrenHome = 0;
    }
    
    submitResponses($adultsHome, $childrenHome, $howActive, $howOftenHome, $petSelection, $petSize, $petTemperament, $petGender);
    phpAlert("Your responses have been submitted thank you.");
  }
  
?>

<!DOCTYPE html PUBLIC>
<html lang="en">
<head>
  <title>Paw Companions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Google services -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="979917733927-ucaoh1mmkqkmpp8oqfnonj45fjdcd7n4.apps.googleusercontent.com">
  
  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="js/upload-image.js"></script>

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Slackey" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  
  <!-- Pet Companions CSS -->
  <link rel="stylesheet" type="text/css" href="css/pcstyle.css">
  
</head>

<body>
<div><?php include 'header.php' ?></div>

<!-- control home page shown depending on user account type -->
<!-- this should be done in one php block -- JenCam TO DO -->
<?php
  if ($status == 'signed in' && $usertype == 'normal')
  {?>
    <div><?php include 'user/user.php' ?></div> 
  <?php }
  else if ($status == 'signed in' && $usertype == 'admin')
  {?>
    <div><?php include 'admin/admin.php' ?></div>
  <?php } 
  else
  {?>
    <div><?php include 'description.php' ?></div>
    <div><?php include 'carousel.php' ?></div>
  <?php } ?>
  
  <!-- Sign in -->
  <div id="signInModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textxxMedium">Sign In</div></div></div>
        </div>
        <div class="modal-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signInForm">
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br>
            <div class="checkbox">
              <label><input type="checkbox" name="remember">Remember me</label>
            </div>
            <button name="signInBtn" type="submit" class="btn btn-primary">Sign in</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Register Modal -->
  <div id="registerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textxxMedium">Register</div></div></div>
        </div>
        <div class="modal-body">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="registerForm">
            <div class="input-group">
              <span class="input-group-addon">First Name</span>
              <input id="firstname" type="text" class="form-control" name="firstname" placeholder="First name">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon">Last Name</span>
              <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Last name">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input id="email" type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <br>
            <div class="checkbox">
              <label><input type="checkbox" name="remember">Remember me</label>
            </div>
            <div class="opensans"><div class="textRegular">By registering, you agree to the <a href="#" data-toggle="modal" data-target="#termsModal">Terms and Conditions</a></div></div>
            <br>
            <button name="registerBtn" type="submit" class="btn btn-primary">Register</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Terms -->
  <div id="termsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textxxMedium">Terms and Conditions</div></div></div>
        </div>
        <div class="modal-body">
          <div class="opensans"><div class="textRegular">Use of this site and the information available on this site is subject to the following terms and conditions:</div></div>
          <br>
          <div class="opensans"><div class="textRegular"><div class="bold">1. Ownership</div></div></div>
          <div class="opensans"><div class="textRegular">This site (“Website”) is owned and operated by Paw Companions.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">2. Terminology</div></div></div>
          <div class="opensans"><div class="textRegular">In these terms and conditions, the expressions “we”, “us”, and “our” are references to Paw Companions.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">3. Use of Website from outside Australia</div></div></div>
          <div class="opensans"><div class="textRegular">The information on this Website (“the Information”) and the Terms and Conditions have been prepared in accordance with Australian law. If you are 
  residing in or accessing this Website from a country other than Australia (“the User Country”) the Information and the Terms and Conditions may not 
  satisfy the laws of the User Country. Should the Information and the Terms and Conditions satisfy the laws of the User Country, then you are entitled to use 
  the Website. In the event that the Information or the Terms and Conditions do not satisfy the laws of the User Country, this Website is not intended for your 
  use, and you are not entitled to rely on the Information. If you do so, you agree to indemnify us for any loss or damage which we may incur as a consequence.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">4. Acceptance of Terms and Conditions</div></div></div>
          <div class="opensans"><div class="textSmall">4.1</div></div><div class="opensans"><div class="textRegular">Your access and use of the Website is conditional upon your acceptance and compliance with the terms, conditions, notices and disclaimers 
  contained in this document and elsewhere on the Website (known collectively as the “Terms and Conditions”). Your use of and/or continued access to the Website 
  constitutes your agreement to the Terms and Conditions.</div></div>
          <div class="opensans"><div class="textSmall">4.2</div></div><div class="opensans"><div class="textRegular">We may amend the Terms and Conditions at any time by posting the amended terms and conditions on the Website. The amended terms and conditions 
  will be effective immediately and you will be bound by the amended terms and conditions from that time. This agreement may not be amended otherwise. You 
  should visit this page periodically to review the Terms and Conditions. If you violate any Terms and Conditions your right to use and access the Website 
  automatically terminates.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">5. Restrictions on Use</div></div></div>
          <div class="opensans"><div class="textRegular">The Website is available only for your personal and non-profit use. We have the right to change or discontinue any feature of the Website including the 
  Material defined in clause 6, hours of availability and equipment required for access. You may make a single hard copy of the Material. You may not otherwise 
  copy, reproduce, republish, frame, post, upload, distribute, transmit or modify in any way all or any part of the material contained on this Website, unless 
  expressly provided for on the Website or expressly authorised in writing by Paw Companions. You must not transmit or attempt to transmit any data, code or 
  other material of any kind to this Website which contains a virus or other harmful component.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">6. Trade marks</div></div></div>
          <div class="opensans"><div class="textRegular">All names, logos and trademarks are either our property or the property of third parties who have contributed to the Website. Nothing on the Website 
  should be interpreted as granting any rights to use or distribute any names, logos or trademarks, without our express written agreement or the relevant 
  contributor. Nothing displayed on the Website should be construed as granting any licence or right to use any name, logo or trademark without our express 
  permission, or the relevant third party contributor.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">7.Copyright</div></div></div>
          <div class="opensans"><div class="textRegular">The content of this Website, including all information such as text, graphics, images and other material (“Material”), is protected by Australian 
  and international copyright law. You may download a single copy of the Material and where necessary for reference purposes keep a temporary copy in your 
  computer’s cache and make a single hard copy of the Material. You may make such other use of the material as is otherwise expressly authorised on the 
  Website. Unauthorised use of the Material may violate these copyright laws.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">8. No Representations</div></div></div>
          <div class="opensans"><div class="textRegular">We make no representations about the accuracy, reliability, completeness or timeliness of the Material. The Material may contain inaccuracies or 
  typographical errors. The use of the Website and the Material is at your own risk. Changes are periodically made to the Website and may be made at any time.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">9. No Warranties</div></div></div>
          <div class="opensans"><div class="textSmall">9.1</div></div><div class="opensans"><div class="textRegular">The Website and Material are provided on an as is basis without any warranties of any kind. We disclaim all warranties to the fullest extent 
  permitted by law.</div></div>
          <div class="opensans"><div class="textSmall">9.2</div></div><div class="opensans"><div class="textRegular">The Trade Practices Act 1974 (Cth) and all corresponding state and territory legislation implies terms, conditions and warranties into some 
  contracts for the supply of goods and services and prohibits the exclusion, restriction and modification of such terms (“Prescribed Terms”). Except as
  provided by the Prescribed Terms, all warranties express or implied by law in any way relating to access to, or non access to, the Website or the use of or 
  reliance upon the Website or the Material are excluded.</div></div>
          <div class="opensans"><div class="textSmall">9.3</div></div><div class="opensans"><div class="textRegular">In addition, we do not warrant that the Website will operate error free or that this Website and its servers are free of computer viruses 
  and other harmful data, code, components or other material. Nor do we warrant that it will be able to prevent any illegal, harmful or inappropriate use, 
  modification or alteration of the Website, or will give notice of such use, modification or alteration. If your use of the Website or the Material results 
  in the need for servicing or replacing equipment or data, we are not responsible for those costs.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">10. Limitation of Liability</div></div></div>
          <div class="opensans"><div class="textRegular">Except as provided by the Prescribed Terms, neither we, our suppliers, or any third parties mentioned on the Website shall be liable for any loss or 
  damage whatsoever (including, without limitation, incidental and consequential damages, lost profits, or damages) resulting from the use or access to or 
  inability to use and access the Website and the Material.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">11. Specific Warnings</div></div></div>
          <div class="opensans"><div class="textRegular">You must ensure that your access to this Website is not illegal or prohibited by laws which apply to you. You must take your own precautions to ensure that 
  the process which you employ for accessing this Website does not expose you to the risk of viruses, malicious computer code or other forms of interference 
  which may damage your own computer system.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">12. Taxes</div></div></div>
          <div class="opensans"><div class="textRegular">Certain taxes and government charges may be payable in relation to the use of our services. We have no responsibility for such taxes and other government 
  charges on transactions on or in anyway connected with the Website. However should any charge be made by us for the supply of goods or services on the 
  Website, such charges are inclusive of any goods and services tax imposed under Australian law (“GST”).</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">13. Internet Service Providers</div></div></div>
          <div class="opensans"><div class="textRegular">If you are an internet service and/or access provider, which supplies the material to your subscriber, you must not use the Website in any manner or for 
  any purpose which is unlawful or in any manner which violates any of our rights or which is prohibited by the Terms and Conditions.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">14. Hyperlinks</div></div></div>
          <div class="opensans"><div class="textSmall">14.1</div></div><div class="opensans"><div class="textRegular">The Website contains hyperlinks and other pointers to internet websites operated by third parties (“Linked Sites”). The Linked Sites are not 
  under our control and we are not responsible for the content of any Linked Site or any hyperlink contained in a Linked Site.</div></div>
          <div class="opensans"><div class="textSmall">14.2</div></div><div class="opensans"><div class="textRegular">The inclusion of any link does not imply our endorsement of the Linked Site. You link to any such Linked Site entirely at your own risk. 
  We exercise no control over the quality, safety or legality of the items advertised or sold and statements made through any Linked Sites.</div></div>
          <div class="opensans"><div class="textSmall">14.3</div></div><div class="opensans"><div class="textRegular">The Material on any Linked Site, including product information and prices, are the responsibility of the operator of the Linked Site. Any 
  information contained on a Linked Site is subject to change without notice by the operator of that website. We are not liable for the prices or price changes, 
  including where price changes have not been reflected on the relevant site.</div></div>
          <div class="opensans"><div class="textSmall">14.4</div></div><div class="opensans"><div class="textRegular">Any purchases or dealings you have with a Linked Site are done at your own risk. We are not a party to any transaction between you and a Linked 
  Site. Your use of a Linked Site is subject to the terms and conditions of that 
  site in addition to the Terms and Conditions of this Website. If there is any inconsistency, to the extent of the inconsistency, the Terms and Conditions of 
  this Website prevail.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">15. Advertisements</div></div></div>
          <div class="opensans"><div class="textSmall">15.1</div></div><div class="opensans"><div class="textRegular">The Website display of the Price List is an advertisement made by the Vendor Paw Companions.</div></div>
          <div class="opensans"><div class="textSmall">15.2</div></div><div class="opensans"><div class="textRegular">The Website may contain embedded hyperlinks or referral buttons to websites operated by third parties or their licensees or 
  contractors (Advertisers). Clause 14 also applies to sites operated by Advertisers. Any claims by Advertisers are not recommendations or endorsements 
  by us.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">16. Disputes with Linked Sites and Advertisers</div></div></div>
          <div class="opensans"><div class="textRegular">As we do not and cannot be involved in your interaction with Linked Sites and Advertisers, in the event that you have a dispute with one or more Linked 
  Sites or Advertisers, to the extent permitted by law, you agree to release us 
  (and our agents and employees) from liability for any claims, demands and 
  damages (actual and consequential) arising out of or in any way connected with 
  such disputes.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">17. Termination</div></div></div>
          <div class="opensans"><div class="textRegular">The Terms and Conditions are effective until terminated by us. We may terminate this agreement and your access to the Website at any time without 
  notice. ln the event of termination, you are no longer authorised to access the Website. All restrictions imposed on you, disclaimers and limitations of 
  liability set out in the Terms and Conditions will survive termination.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">18. Security of Information</div></div></div>
          <div class="opensans"><div class="textRegular">Unfortunately, no data transmission over the Internet can be guaranteed as totally secure. Whilst we strive to protect such information, we do not warrant 
  and cannot ensure the security of any information which you transmit to us. Accordingly, any information which you transmit to us is transmitted at your 
  own risk. Nevertheless, once we receive your transmission, we will take reasonable steps to preserve the security of such information.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">19.Indemnity Clause</div></div></div>
          <div class="opensans"><div class="textRegular">You indemnify us, regardless of any negligence on our part, against all losses, liabilities, legal costs and other expenses incurred by us arising 
  directly or indirectly as a result of or in connections with the breach by you of any provision of these Terms and Conditions or any wilful, unlawful or 
  negligent act by you in connection with the supply by a Vendor RSPCA to you of, or use by you of, any Product.</div></div>
          <br>
          
          <div class="opensans"><div class="textRegular"><div class="bold">20. Miscellaneous</div></div></div>
          <div class="opensans"><div class="textRegular">If any provision of the Terms and Conditions is found to be invalid or unenforceable by a court of law, such invalidity or unenforceability will not 
  affect the remainder of the Terms and Conditions which will continue in full force and effect. All rights not expressly granted are reserved. This agreement 
  sets out the entire understanding and agreement between RSPCA and you with respect to the subject matter.</div></div>
          <div class="opensans"><div class="textRegular">Use of this website is conditional upon your acceptance and compliance with certain Terms and Conditions.</div></div>
          <br>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Contact Us -->
  <div id="contactModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><div class="slackey"><div class="textxxMedium">Contact Us</div></div></div>
        </div>
        <div class="modal-body">

            <!-- First Container -->
            <div class="container-fluid bg-2 text-center">
              <h2 class="margin">About Us</h2>
              
              <div class="opensans"><div class="textRegular">
              Paw Companion helps people and pets find each other and live happier 
              lives together. That's our mission. It's why we exist.
              How can we do this online?
              Paw Companions has developed algorithms that identify the most important 
              factors that determine compatibility between people and pets. 
              We believe that pets are unique individuals, just like us, and adopters 
              lack access to the guidance needed to identify pets will be a truly 
              great fit for their personality, lifestyle and household. </div></div>
              </div>
              

            <!-- Second Container (Grid) -->
            <div class="container-fluid bg-grey">
              <h2 class="text-center">Contact Us</h2>
              <div class="row">
              <div class="col-sm-5">
                <div class="opensans"><div class="textRegular">Contact us and we'll get back to you within 24 hours.</div></div>
                <div class="opensans"><div class="textRegular"><span class="glyphicon glyphicon-map-marker"></span> PO Box 457, Woof NSW 2145</div></div>
                <div class="opensans"><div class="textRegular"><span class="glyphicon glyphicon-phone"></span> 1300 144 542</div></div>
                <div class="opensans"><div class="textRegular"><span class="glyphicon glyphicon-envelope"></span> contact@pawcompanions.com.au</div></div>
              </div>
              <div class="col-sm-7">
                <div class="row">
                  <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                  </div>
                  <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                  </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
                <div class="row">
                  <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                  </div>
                </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
    </div>
<br>
<div><?php include 'footer.php' ?></div>
</body>
</html>

<?php 
  debug_to_console($_POST);
  unset($_POST);
  debug_to_console($_POST);
?>
