<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="orderForm.css">
        
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>  <!-- scripts used -->

        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">

    </head>
<body>

<div id="backdrop">
<?php

$firstNameErr = $lastNameErr = $emailErr = $mobileNumErr = $facebookErr = $orderTypeErr = $houseErr = $cityErr = $brgyErr = $delDateErr = $pickupLocErr = $alternatePersonErr = $pickupDateErr = $paymentMethodErr = $thankYou = "";
$pickupLocation = $pickupDate = $del = $firstName = $lastName = " ";
$flavor = $liner = $frosting = $topper = $box = " ";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["flavor"])) {
    $flavor = "none";
  } else {
    $flavor = $_POST["flavor"];
  }

  if (empty($_POST["liner"])) {
    $liner = "none";
  } else {
    $liner = $_POST["liner"];
  }

  if (empty($_POST["frosting"])) {
    $frosting = "none";
  } else {
    $frosting = $_POST["frosting"];
  }

  if (empty($_POST["topper"])) {
    $topper = "none";
  } else {
    $topper = $_POST["topper"];
  }

  if (empty($_POST["firstName"])) {
    $firstNameErr = "required";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["firstName"])) {
      $firstNameErr = "Invalid name";
    } else {
      $firstName = test_input($_POST["firstName"]);
      $firstNameErr = "";
    }

  if (empty($_POST["lastName"])) {
    $lastNameErr = "required";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["lastName"])) {
      $lastNameErr = "Invalid name";
    } else {
      $lastName = test_input($_POST["lastName"]);
      $lastNameErr = "";
  }

  if (empty($_POST["companyName"])) {
    $companyName = " ";
  } else {
    $companyName = test_input($_POST["companyName"]);
  }

  if (empty($_POST["mobileNumber"])) {
    $mobileErr = "required";
  } else {
    $mobile = test_input($_POST["mobileNumber"]);
    $mobileErr = "";
  }

  if (empty($_POST["alternateContact"])) {
    $alternateContact = " ";
  } else {
    $alternateContact = test_input($_POST["alternateContact"]);
  }
  
  if (empty($_POST["emailAddress"])) {
    $emailErr = "required";
  } elseif (!filter_var($_POST["emailAddress"], FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email";
    } else {
      $email = $_POST["emailAddress"];
      $emailErr = "";
    }
  


  if (empty($_POST["facebookName"])) {
    $facebookErr = "required";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["facebookName"])) {
      $alternatePersonErr = "Invalid name";
    } else {
    $facebook = test_input($_POST["facebookName"]);
    $facebookErr = "";
  }

  if (empty($_POST["orderType"])) {
    $orderTypeErr = "required";
  } else {
    $orderType = $_POST["orderType"];
    $orderTypeErr = "";
  }

  if (($orderType) == "Delivery") {

      if (empty($_POST["houseNo"])) {
        $houseErr = "required";
      } else {
        $house = test_input($_POST["houseNo"]);
        $houseErr = "";
      }

      if (empty($_POST["brgySubd"])) {
        $brgyErr = "required";
      } else {
        $brgy = test_input($_POST["brgySubd"]);
        $brgyErr = "";
      }

      if (empty($_POST["cityMunicipality"])) {
        $cityErr = "required";
      } else {
        $city = test_input($_POST["cityMunicipality"]);
        $cityErr = "";
      }

      if (empty($_POST["deliveryDate"])) {
        $delDateErr = "required";
      } else {
        $del = $_POST["deliveryDate"];
        $delDateErr = "";
      }


  } elseif (($orderType) == "Pick-up Point") {
      if (empty($_POST["pick-upLocation"])) {
        $pickupLocErr = "required";
      } else {
        $pickupLocation = $_POST["pick-upLocation"];
        $pickupLocErr = "";
      }

      if (empty($_POST["pick-upDate"])) {
        $pickupDateErr = "required";
      } else {
        $pickupDate = $_POST["pick-upDate"];
      }
  } 

  if (empty($_POST["alternatePerson"])) {
    $alternatePerson = " ";
  } elseif (!preg_match("/^[a-zA-Z ]*$/",$_POST["alternatePerson"])) {
      $alternatePersonErr = "Invalid name";
    } else {
      $alternatePerson = test_input($_POST["alternatePerson"]);
      $alternatePersonErr = "";
    }
  




  if (empty($_POST["paymentMethod"])) {
    $paymentMethodErr = "required";
  } else {
    $paymentMethod = $_POST["paymentMethod"];
  }



  if (($firstNameErr === "") && ($lastNameErr === "") && ($emailErr === "") && ($facebookErr === "")
  ($delDateErr === "") && ($alternatePersonErr === "") === ($pickupDateErr === "")) {


    $recipient="joshualloyd.doros@gmail.com";
    $subject="Joshan's Create Order Form";
    $sender =$firstName . $lastName;
    $senderEmail=$email;


    $mailBody=
      "Name: $sender\n
      Email: $senderEmail\n
      Facebook Name: $facebook\n
      Mobile No.: $mobile\n
      Alternate Contact No.: $alternateContact\n\n

      Order Type: $orderType\n\n

      House No.: $house\n
      Brgy/Subd.: $brgy\n
      City/Mun.: $city\n
      Delivery Date: $del\n\n

      Pick-up Location: $pickupLocation\n
      Pick-up Date: $pickupDate\n\n

      Alternate Recepient: $alternatePerson\n\n

      Payment Method: $paymentMethod\n\n\n

      Flavor: $flavor\n
      Liner: $liner\n
      Frosting: $frosting\n
      Topper: $topper\n
      ";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");


    echo ("<script type='text/javascript'> alert('Thank you for baking with us! We will contact you shortly for confirmation.'); window.location.href='https://joshans.azurewebsites.net/create';
    </script>") ;
  }
}




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<form method="POST">
<div class="masterOrderForm" id="masterForm">
    <div class="customerInfo-container">
        <h3>Customer Info</h3>
        <div class='firstName'>
            <label for="firstName">First name*</label><span class="errMsg"><?php echo $firstNameErr;?></span><br>
            <input type="text" name='firstName' style="width: 90%; border-radius: 8px;" required>
        </div>
        <div class='lastName'>
            <label for="lastName">Last name*</label><span class="errMsg"><?php echo $lastNameErr;?></span><br>
            <input type="text" name='lastName' style="width: 90%; border-radius: 8px;" required>
        </div>
        <div class='companyName'>
            <label for="companyName">Company name (if applicable)</label><br>
            <input type="text" name='companyName' style="width: 90%; border-radius: 8px;">
        </div>
        <div class='mobileNumber'>
            <label for="mobileNumber">Mobile no.*</label><span class="errMsg"> <?php echo $mobileNumErr;?></span><br>
            <input type="tel" name='mobileNumber' style="width: 90%; border-radius: 8px;" placeholder= "09*********" pattern="[0][9][0-9]{9}" required>
        </div>  
        <div class='alternateContact'>
            <label for="alternateContactNumber">Alternate Contact no.</label><br>
            <input type="tel" name='alternateContactNumber' style="width: 90%; border-radius: 8px;">
        </div>
        <div id="spacer1"></div>
        
        <div class='emailAddress'>
            <label for="emailAddress">Email Address*</label><span class="errMsg"><?php echo $emailErr;?></span><br>
            <input type="email" name='emailAddress' style="width: 90%; border-radius: 8px;" required>
        </div>
        <div class='facebookName'>
            <label for="facebookName">Facebook Name*</label><br><?php echo $facebookErr;?>
            <input type="text" name='facebookName' style="width: 90%; border-radius: 8px;" required>
        </div>
        <div id="spacer2"></div>
    </div>

    <div class='orderType-container'>
        <h3>Order Type*</h3><?php echo $orderTypeErr;?>
        <div class='delivery'>
            <input id="delivery" type="radio" name='orderType' value="Delivery" checked="checked" required>
            <label for="Delivery">&nbsp Delivery</label>

        </div>
        <div class='pickupPoint'>
            <input id="pickup" type="radio" name='orderType' value="Pick-up Point">
            <label for="Pick-up Point">&nbsp Pick-up Point</label>
        </div>
    </div>

    <div class='deliveryInformation-container'>
        <h3>Delivery Information</h3>
        <div class='houseNo'>
            <label for="houseNo">House/Bldg/Street no.*</label><?php echo $houseErr;?>
            <input id="houseNo" type="text" name='houseNo' style="width: 90%; border-radius: 8px;" required>
        </div><div class='brgy'>
            <label for="brgySubd">Brgy/Subdivision*</label><?php echo $brgyErr;?>
            <input id="brgySubd" type="text" name='brgySubd' style="width: 90%; border-radius: 8px;" required>
        </div>
        <div class='city'>
            <label for="cityMunicipality">City/Municipality*</label><br><?php echo $cityErr;?>
            <select id="cityMunicipality" name="cityMunicipality"  style="width: 90%; border-radius: 8px;" required>
                <option value="Carmona">Carmona</option>
                <option value="Biñan">Biñan</option>
                <option value="Sta.Rosa">Santa Rosa</option>
                <option value="Sn.Pedro">San Pedro</option>
              </select>
        </div>
        <div class='deliveryDate'>
            <label for="deliveryDate">Delivery Date* &nbsp</label><?php echo $delDateErr;?>
            <input type="date" id="deliveryDate" name="deliveryDate" style="border-radius: 8px;" required>
        </div><div class='alternatePerson'>
            <label for="alternatePerson">Alternate Recipient &nbsp</label>
            <input type="text" name='alternatePerson' style="border-radius: 8px;">
        </div>
    </div>

    <div class='pickupInformation-container'>
        <h3>Pick-up Information</h3>
        <div class='Pick-up Location'>
            <label for="pick-upLocation">Pick-up Location*</label><br><?php echo $pickupLocErr;?>
            <select id="pick-upLocation" name="pick-upLocation"  style="width: 60%; border-radius: 8px;">
                <option value="WaltermartCarmona">Waltermart, Carmona</option>
                <option value="SM-SantaRosa">SM City, Santa Rosa</option>
                <option value="PavillionMall">Pavillion Mall, Biñan</option>
                <option value="GalleriaSouth">Robinsons Galleria South, San Pedro</option>
              </select>
        </div>
        <div class='deliveryDate'>
            <label for="pickupDate">Pick-up Date* &nbsp</label><?php echo $pickupDateErr;?>
            <input type="date" id="pickupDate" name="pickupDate-" style="border-radius: 8px;">
        </div>
        <div class='alternatePerson'>
            <label for="alternatePerson">Alternate Recipient &nbsp</label> <?php echo $alternatePersonErr;?>
            <input type="text" name='alternatePerson' style="border-radius: 8px;">
        </div>


    </div>

    <div class='paymentMethod-container'>
        <h3>Payment Method</h3> <?php echo $paymentMethodErr;?>
        <div class='COD'>
            <input type="radio" name='paymentMethod' value="COD" required>
            <label for="COD">&nbsp Cash On Delivery</label>
        </div><div class='BDO'>
            <input type="radio" name='paymentMethod' value="BDO" >
            <label for="BDO">&nbsp BDO</label>
        </div>
    </div>

    <div class='submit-container'><input type="submit" name="Place Order" id="submit" value="Place Order" style="border-radius: 12px;"></div>
    
    <a href="javascript:" id="close"><img src="close.png"></a>


</div>
</form>

<script src="orderForm.js"></script>
</div>
</body>
</html>
