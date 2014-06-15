<?php

$error = null;

	$mail = $_GET['email'];
	$ime = $_GET['ime'];
	$poruka = $_GET['poruka'];
	
	if ( $poruka != '' && ( $mail != '' || $ime != '') ){
			
			if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $mail)) {

			  echo '<div class="alert alert-warning">Upisana e-mail adresa nije valjana! &nbsp <input type="button" class="btn-primary" value="Poku&scaron;ajte ponovno" onclick="javascript:CloseAlert();"></div>';
			  die();

			}

			
			
			$m = mail("sonjasvaganovic@yahoo.com",
					  "Poruka sa web stranice",
					  $ime . " je napisao/la:\n\n" . $poruka,
					  "From: ". $mail . "\r\n
					  Reply-To: ". $mail . "\r\n"
					);
			if ( $m ){
				echo '<div class="alert alert-success">Va&scaron;a poruka je uspje&scaron;no poslana. &nbsp <input type="button" class="btn-primary" value="Zatvori" onclick="javascript:CloseAlert();"></div>';
			}else{
				echo '<div class="alert alert-danger">Va&scaron;a poruka nije poslana, molimo probajte kasnije. &nbsp <input type="button" class="btn-primary" value="Poku&scaron;ajte ponovno" onclick="javascript:CloseAlert();"></div>';
			}
			
	}else{
		echo'<div class="alert alert-info">Potrebno je upisati Va&scaron;u poruku! &nbsp <input type="button" class="btn-primary" value="Poku&scaron;ajte ponovno" onclick="javascript:CloseAlert();"></div>';
	}


?>