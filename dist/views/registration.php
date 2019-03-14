<!-- 
    ----
        NEW VERSION 
    ----
-->

<?php


if ($_POST['send']){
    //Wylapywanie SPAMU
    include("stopforumspam.php");

    //Sprawdzanie czy w polu sprwadz jest slowo EuroSymposium - BOTY BOTY...
    if (strip_tags(trim($_POST['sprawdz'])) != 'EuroSymposium') {
        echo '<h3 style="color:green">SPAMBOT Check: Please fill the required field with given word</h3>';
        echo '<a href="javascript:history.back();"><--Back</a>';
        die();
        }

    if(!$_POST['fee'] || !$_POST['gname'] || !$_POST['fname'] || !$_POST['organization'] || !$_POST['address'] || !$_POST['country'] || !$_POST['mail']) { 
        echo "<h2 style='color:red'>Please fill required fields marked with *</h2>";
        } 
    else {
        $fee = strip_tags(trim($_POST['fee']));
        $title = strip_tags(trim($_POST['title']));
        $gname = strip_tags(trim($_POST['gname']));
        $fname = strip_tags(trim($_POST['fname']));
        $organization = strip_tags(trim($_POST['organization']));
        $address = strip_tags(trim($_POST['address']));
        $city = strip_tags(trim($_POST['city']));
        $zip = strip_tags(trim($_POST['zip']));
        $country = strip_tags(trim($_POST['country']));
        $phone = strip_tags(trim($_POST['phone']));
        $mail = strip_tags(trim($_POST['mail']));
        $www = strip_tags(trim($_POST['www']));
        $comm = strip_tags(trim($_POST['comm']));
        $vat_org = strip_tags(trim($_POST['vat_org']));
        $vat_add = strip_tags(trim($_POST['vat_add']));
        $vat = strip_tags(trim($_POST['vat']));
        $ip = $_SERVER["REMOTE_ADDR"];
	
        //DO PLIKU
        $file = "registrations.txt";      
        $current =  $fee . ";" . $title . ";" . $gname . ";" .  $fname . ";" .  $organization . ";" .  $address . ";" .  $city . ";" .  $zip . ";" .  $country . ";" .  $phone . ";" .  $mail . ";" .  $www . ";" .  $comm . ";" .  $vat_org . ";" .  $vat_add . ";" .  $vat . ";" .  $ip . "\r\n";
        file_put_contents($file, $current,FILE_APPEND|LOCK_EX);
        
        $polaczenie = @mysql_connect ('localhost', 'kie', 'lukaszKIEUG') or die ("ERROR Connecting do MySQL");
        mysql_select_db('kieDB') or die ("Can't connect to DB");
        mysql_query("SET NAMES 'utf8'");
        $query = "INSERT INTO es2015 (fee, title, gname, fname, organization, address, city, zip, country, phone, mail, www, comm, vat_org, vat_add, vat, ip) VALUES ('$fee', '$title', '$gname', '$fname', '$organization', '$address', '$city', '$zip', '$country', '$phone', '$mail', '$www', '$comm', '$vat_org', '$vat_add', '$vat', '$ip')";
        $date = date("m.d H:i");
        //Do mnie query
        $polishFee = 385;
        if($fee == 40)
            $polishFee = 180;
        
        mail("ekomk@ug.edu.pl", "ES2018_reg_".$date, $query);
        $wykonaj = mysql_query ($query) or die(mysql_error());
        
        $subject = "EuroSymposium 2018 Conference registration confirmation";
        $headers = "From: info@eurosymposium.eu";
        $headers .= "\r\nCc: m.kuciapski@ug.gda.pl";
        $headers .= "\r\nBcc: swrycza@ug.edu.pl\r\n\r\n";
        
        // $body = "
        // Thank you ".$gname." for your registration to EuroSymposium 2018 conference

        // The payment  ( ".$fee." EUR or " . $polishFee . "PLN ) ought to be transferred to the following account:
        // 59 1240 1271 1111 0010 4368 2415
        // Bank PEKAO S.A. IV o/Gdansk
        // Kolobrzeska 43

        // SWIFT: PKOPPLPW
        // Bank Sort Code: 12 40 12 71
        // IBAN: PL 59 1240 1271 1111 0010 4368 2415

        // Please include a 'K205-15 - ES_2018 ".$gname." ".$fname."' phrase in the content of the bank transfer.

        // If you have any questions, please write to e-mail: swrycza@ug.edu.pl.
        // ";

        $body = '
            <div
            class="container"
            style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;display: flex;flex-direction: column;background: #E5E5E5;position: relative; max-width: 1024px;"
        >
            <div
            class="container__header"
            style="margin: 0;padding: 30px 40px;font-family: Arial, Helvetica, sans-serif;text-align: center;font-size: 3em;border-bottom: 1px solid #000;"
            >
            Thank you
            <span
                class="header__name"
                style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold;"
                >'.$gname.'</span
            >
            for your registration to EuroSymposium 2019 conference
            </div>
            <div
            class="container__body"
            style="margin: 0;padding: 40px 20px;font-family: Arial, Helvetica, sans-serif;background: #fff;"
            >
            <div
                class="body__box"
                style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;display: flex;flex-direction: column;font-size: 2em;"
            >
                <div
                class="box__header"
                style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;text-align: center;padding-bottom: 40px;"
                >
                The payment ( '.$fee.' EUR or '. $polishFee .'PLN ) ought to be transferred to the
                following account:
                </div>
                <div
                class="box__row"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;background: azure;"
                >
                <div
                    class="row--content"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold;"
                >
                    59 1240 1271 1111 0010 4368 2415
                </div>
                </div>
                <div
                class="box__row"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;"
                >
                <div
                    class="row--content"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold;"
                >
                    Bank PEKAO S.A. IV
                </div>
                </div>
                <div
                class="box__row"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;"
                >
                <div
                    class="row--content"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold; background: azure;"
                >
                    Gdansk, Kolobrzeska 43
                </div>
                </div>
            </div>
        
            <div
                class="body__box"
                style="margin: 40px 0;padding: 0;font-family: Arial, Helvetica, sans-serif;display: flex;flex-direction: column;font-size: 2em;"
            >
                <div
                class="box__row"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;"
                >
                <span
                    class="row--title"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;text-align: center;"
                    >SWIFT:</span
                >
                <span
                    class="row--content"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold;"
                    >PKOPPLPW</span
                >
                </div>
        
                <div
                class="box__row"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;background: azure;"
                >
                <span
                    class="row--title"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;text-align: center;"
                    >Bank Sort Code:</span
                >
                <span
                    class="row--content"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold;"
                    >12 40 12 71</span
                >
                </div>
        
                <div
                class="box__row"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;"
                >
                <span
                    class="row--title"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;text-align: center;"
                    >IBAN:</span
                >
                <span
                    class="row--content"
                    style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;font-weight: bold;"
                    >PL 59 1240 1271 1111 0010 4368 2415</span
                >
                </div>
            </div>
        
            <div
                class="body__box"
                style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;display: flex;flex-direction: column;font-size: 2em;"
            >
                <div
                style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;"
                >
                Please include a <b>K205-15 - ES_2019 '.$gname.' '.$fname.'</b> phrase in the
                content of the bank transfer.
                </div>
            </div>
            </div>
        
            <div
            class="container__footer"
            style="margin: 0;padding: 30px 40px;font-family: Arial, Helvetica, sans-serif;display: flex;justify-content: center;align-items: center;flex-direction: column;border-top: 1px solid #000;font-size: 2.5em;"
            >
            <span
                class="footer__content"
                style="margin: 0;padding: 0;font-family: Arial, Helvetica, sans-serif;width: 100%;text-align: center;"
                >If you have any questions, please write to e-mail:</span
            >
            <a
                href="mailto:swrycza@ug.edu.pl"
                class="footer__email"
                style="margin: 0;padding: 10px 15px;font-family: Arial, Helvetica, sans-serif;text-decoration: none;border: 4px solid #000;color: #000;cursor: pointer;font-weight: bold;margin-top: 15px;"
                >swrycza@ug.edu.pl</a
            >
            </div>
        </div>
    
        ';

        if (mail($mail, $subject, $body, $headers)) {
            echo("<p>Message delivery with below informations successfully sent to your e-mail: ".$mail."</p>");
            //mail("lukasz.malon@ug.edu.pl", $subject, $body);
        } 
        else {
            echo("<p>Message delivery to ".$mail." failed...</p>");
        }
            
        //Komunikat - Mnozenie przez 4,25 aby uzyskac 340 i 170zl dla 80 i 40EUR
        echo"<h1>Thank you ".$gname." for your registration to EuroSymposium 2018 conference </h1>";
        echo"<h1>The payment ( ".$fee." EUR or " . $polishFee . " PLN ) ought to be transferred to the following account: <br />
            59 1240 1271 1111 0010 4368 2415<br />
            Bank PEKAO S.A. IV o/Gdansk<br />
            Kolobrzeska 43<br /><br />

            SWIFT: PKOPPLPW<br />
            Bank Sort Code: 12 40 12 71<br />
            IBAN: PL 59 1240 1271 1111 0010 4368 2415<br /><br />

            Please include a 'K205-15 - ES_2018 ".$gname." ".$fname."' phrase in the content of the bank transfer.</h1>";
        die();
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EuroSymposium | Registration</title>
    <link rel="stylesheet" href="css/materialize.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
        crossorigin="anonymous">
</head>

<body>
<!--
    ----------------------------------- NAVBAR -----------------------------------
  -->
<div class="navbar__nav orange lighten-2">
    <div class="navbar__dropdown">
        <button class="dropbtn">Conference
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="navbar__dropdown-content">
            <a href="#Overview">Overview</a>
            <a href="https://link.springer.com/book/10.1007/978-3-030-00060-8">LNBIP 333 - free access</a>
            <a href="#Keynotespeach">Keynote Speach</a>
            <a href="#PreviousSymposia">Previous Symposia</a>
            <a href="#RelevantTopics">Relevant Topics</a>
            <a href="#Program">Program</a>
            <a href="#Publication">Publication</a>
            <a href="#ImportantDates">Important Dates</a>
            <a href="#Venue">Venue</a>
            <a href="#Accomodation">Accomodation</a>
            <a href="#Contact">Contact</a>
        </div>
    </div>
    <div class="navbar__dropdown">
        <button class="dropbtn">Participation
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="navbar__dropdown-content">
            <a href="http://eurosymposium.eu/CfP_ES_2019.pdf">Call for Papers</a>
            <a href="#PaperSubmission">Paper Submission</a>
            <a href="registration.php">Registration</a>
            <a href="#Fees">Fees</a>
        </div>
    </div>
    <div class="navbar__dropdown">
        <button class="dropbtn">Organizers
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="navbar__dropdown-content">
            <a href="http://wzr.pl/kie/">Department of Business Informatics</a>
            <a href="http://plais.org/">PLAIS</a>
            <a href="https://ais.site-ym.com/members/group.aspx?id=89782">AIS SIGSAND</a>
        </div>
    </div>
    <div class="navbar__dropdown">
        <button class="dropbtn">Committees
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="navbar__dropdown-content">
            <a href="#GeneralChair">General Chair</a>
            <a href="#Advisory">Advisory Board</a>
            <a href="#InternationalCommittee">International Programme Committee</a>
            <a href="#OrganizingCommittee">Organizing Committee</a>
        </div>
    </div>
    <div class="navbar__dropdown">
        <button class="dropbtn">Keynonte Speeches
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="navbar__dropdown-content">
            <a href="http://eurosymposium.eu/#2007">ES2007</a>
            <a href="http://eurosymposium.eu/#2013">ES2013</a>
            <a href="http://eurosymposium.eu/#2014">ES2014</a>
            <a href="http://eurosymposium.eu/#2015">ES2015</a>
            <a href="http://eurosymposium.eu/#2016">ES2016</a>
            <a href="http://eurosymposium.eu/#2017">ES2017</a>
            <a href="http://eurosymposium.eu/#2018">ES2018</a>
        </div>
    </div>
    <div class="navbar__dropdown">
        <button class="dropbtn">Downloads
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="navbar__dropdown-content">
            <a href="http://eurosymposium.eu/CfP_ES_2019.pdf">Call for Papers</a>
            <a href="http://eurosymposium.eu/Poster_EuroSymposium2019.pdf">Poster</a>
            <a href="#SIGSAND">PLAIS/SIGSAND EUROSYMPOSIA PROCEEDINGS</a>
        </div>
    </div>
</div>

    <!--
      ----------------------------------- FORM -----------------------------------
    -->

    <div class="container">
        <div class="row">
            <div class="col s12">
                <h3>The XIth SIGSAND/PLAIS EuroSymposium'2018</h3>
                <h4>INFORMATION SYSTEMS -</h4>
                <h4>RESEARCH, DEVELOPMENT, APPLICATIONS, EDUCATION</h4>
                <h4>September 20, 2018 Gdansk & Sopot - Poland</h4>
            </div>
            <div class="col s12">
                The regular EuroSymposium fee is 85 EUR (385 PLN), while the fee for videoconference participants is 40
                EUR (180 PLN). The fee includes :

                a copy of Springer LNBIP Proceedings,
                participation in all EuroSymposium sessions,

                and for the residential participants also:

                lunch,
                coffee breaks,
                dinner.
            </div>
        </div>
        <!-- REGISTRATION FORM -->
        <div class="row">
            <div class="col s12">
                <form action="#">

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Title" type="text" name="title" maxlength="15" class="validate">
                            <!--<label for="title">Title</label>-->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Organization" type="text" name="organization" maxlength="40" class="validate">
                            <!--<label for="organization">Organization</label>-->
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Given Name" type="text" name="gname" maxlength="30" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Family Name" type="text" name="fname" maxlength="30" class="validate">
                            <!-- <label for="last_name">Last Name</label> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Address" type="text" name="address" maxlength="50" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Country" type="text" name="country" maxlength="50" class="validate">
                            <!-- <label for="last_name">Last Name</label> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="City" type="text" name="city" maxlength="30" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Zip Code" type="text" name="zip" maxlength="15" class="validate">
                            <!-- <label for="last_name">Last Name</label> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Email" type="email" id="mail" name="mail" maxlength="40" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Phone" type="tel" name="phone" maxlength="40" class="validate">
                            <!-- <label for="last_name">Last Name</label> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Website" type="text" name="www" maxlength="40" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Comments" type="text" name="comm" maxlength="200" class="validate">
                            <!-- <label for="last_name">Last Name</label> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col s12">
                            <p>
                                <label>
                                    <input type="radio" name="fee" value="80" />
                                    <span>Regular, Residential Participation 85EUR(385PLN)</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input type="radio" name="fee" value="40" />
                                    <span>Participation by VideoConference 40EUR(180PLN)</span>
                                </label>
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="col s12">
                        <p>If you want the invoice, please fill in the required information</p>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Organization" type="text" name="vat_org" maxlength="40" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="Address" type="text" name="vat_add" maxlength="50" class="validate">
                            <!-- <label for="last_name">Last Name</label> -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6 l4">
                            <input placeholder="VAT number" type="text" name="vat" maxlength="20" class="validate">
                            <!-- <label for="first_name">First Name</label> -->
                        </div>
                    </div>
                    <!--<a class="waves-effect waves-light btn">JOIN NOW</a>-->
                    <a class="waves-effect waves-light btn"><input type="submit" value="SUBMIT" name="send"></a>
                </form>
            </div>
        </div>
        <!-- Transfer -->
        <div class="row">
            <div class="col s12">
                <h5>After registration please transfer the registration fee at the following EuroSymposium'2018
                    account:</h5>

                <h6>University of Gdansk</h6>
                <h6>Address: ul. Bazynskiego 8, 80-309 Gdansk</h6>
                <h6>EuroSymposium'2018</h6>
            </div>


            <div class="row">
                <div class="col s12 m9 l5">
                    <div class="card-panel blue-grey darken-1">
                        <span class="white-text">
                            <h6>PL 59 1240 1271 1111 0010 4368 2415</h6>
                            <h6>Bank PEKAO S.A. IV o/Gdansk </h6>
                            <h6>Kolobrzeska 43</h6>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12 m9 l5">
                    <div class="card-panel blue-grey darken-1">
                        <span class="white-text">
                            <h6>SWIFT: PKOPPLPW</h6>
                            <h6>Bank Sort Code: 12 40 12 71</h6>
                            <h6>IBAN: PL 59 1240 1271 1111 0010 4368 2415</h6>
                            <h6>VAT UE PL 584 020 32 39</h6>
                        </span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <h6>
                        Please include a "K205-18 - ES_2018 (name) (surname)" phrase in the text of your bank transfer.
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <!--
      ----------------------------------- FOOTER -----------------------------------
    -->

    <footer class="page-footer orange lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="blue-grey-text text-darken-3">Click <a href="/registration">here</a> to register</h5>
                    <p class="blue-grey-text text-darken-3">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, laborum.
                    </p>
                </div>
                <div class="col l4 offset-l2 s12">
                    <h5 class="blue-grey-text text-darken-3">Worth to see</h5>
                    <ul>
                        <li><a class="blue-grey-text text-darken-3" href="https://www.gdansk.pl/en/for-tourists">Gdańsk</a>
                        </li>
                        <li><a class="blue-grey-text text-darken-3" href="https://www.gdynia.pl/turystyczna-en">Gdynia</a>
                        </li>
                        <li><a class="blue-grey-text text-darken-3" href="#">Sopot</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container blue-grey-text text-darken-3">
                &copy; 2019 Eurosymposium - All rights reserved

                <div class="blue-grey-text text-darken-3 right">
                    <span>Designed and created by&nbsp;</span><a href="http://e-xpert.pl/">E-xpert</a>
                </div>

            </div>
        </div>
    </footer>
</body>


</html>
