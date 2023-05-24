<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
  <title>K O N T E N E R</title>
<style type="text/css">
<![CDATA[
a:hover { color: red }
]]>
</style>
</head>
<body>
<form enctype="multipart/form-data" action="panel.php" method="POST">
<?php
	//$aktualny_url=explode("/", getcwd());
	//$aktualny_url2=explode("/", getcwd());
	//echo $url=strval($aktualny_url[6]."/".$aktualny_url[7]);
	$url="/zabytki";
	$url2="/zabytki-lodzi";
	if(!session_start()) session_start();
	echo "<table><tr><td>";
	echo "Login: <input type='text' name='login'>";
	echo "</td></tr><td>";
	echo "<br>hasło: &nbsp;<input type='password' name='haslo'>";
	echo "</td></tr></table>";
	echo "<br><input type='submit' value='zaloguj'>";
	echo "<div style='padding-left:48px; float:left;'><input type='submit' value='wyloguj' name='stan'></div>";
?>

<?php
$login=$_SESSION['login']=$_POST['login'];
$haslo=$_SESSION['haslo']=$_POST['haslo'];
if($login=="arek" && $haslo=="EinbrechteRo2")
{
	$_SESSION['logowanie']="tak";
}

if($_POST['stan']=='wyloguj')
{

	$_SESSION['logowanie']="nie";
	$login="";
	$haslo="";
}
if($_SESSION['logowanie']=="tak")
{	
?>
</form>




<div style="background-color:#d9f3c2;">
<!-- zapisywanie pojedynczych plikow -->
<div style="background-color:orange;">
<form enctype="multipart/form-data" action="panel.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="850000000" />
<input name="plik1" type="file" id="plik1" />
<input type="submit" value="Wyślij plik" />&nbsp;&nbsp;&nbsp;<input type="submit" value="odśwież listę">
</form>
</div>

<br><br><br>

<div>
<?php

	if($directory = opendir('kontener-ramka/kontener/'))

	{
	$index=0;
	 while(($pliki = readdir($directory)) <> false)
		{
			$plik[$index]=$pliki;
			$index++;
		}
	
	sort($plik);
	for($ind=0; $ind<$index; $ind++)
		{
			$plik2=$plik[$ind];
			if($plik2<>"" && $plik2<>"." && $plik2<>".."){
				echo "<br><a href='".$url."/kontener-ramka/kontener/".$plik2."'>".$plik2."</a>";
		}
		}
	}
?>
</div>
<br><br><br>

<div style="background-color:orange;">
<!-- kasowanie pojedynczych plikow -->
<form action="panel.php" method ="POST">
<select name="nazwa_pliku1" style="width:200px;">
<?php
	if($directory = opendir('kontener-ramka/kontener/'))

	{
	$index=0;
	 while(($pliki = readdir($directory)) <> false)
		{
			$plik[$index]=$pliki;
			$index++;
		}
	
	sort($plik);
	for($ind=0; $ind<$index; $ind++)
		{
			$plik8=$plik[$ind];
			echo "<option value='".$plik8."'>".$plik8."</option>";
		}
	}
?>
</select>
<input type="submit" value="kasuj plik">&nbsp;&nbsp;&nbsp;<input type="submit" value="odśwież listę">
</form>
<?php
	$nazwa_pliku=$_POST['nazwa_pliku1'];
	if($nazwa_pliku<>"" && $nazwa_pliku<>"." && $nazwa_pliku<>".."){
		unlink("kontener-ramka/kontener/$nazwa_pliku");
		echo "<script language='javascript'>alert('Plik ".$nazwa_pliku." został skasowany');
			</script>";
	}
?>
</div>


<div style="background-color:#d9f3c2;">
<!-- zapisywanie pojedynczych plikow opisowych tekstowych-->
<div style="background-color:orange;">
<form enctype="multipart/form-data" action="panel.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="850000000" />
<input name="plik3" type="file" id="plik3" />
<input type="submit" value="Wyślij plik" />&nbsp;&nbsp;&nbsp;<input type="submit" value="odśwież listę">
</form>
</div>

<br><br><br>

<div>
<?php
	if($directory = opendir('kontener-ramka/tekst/'))

	{
	$index=0;
	 while(($pliki = readdir($directory)) <> false)
		{
			$plik11[$index]=$pliki;
			$index++;
		}
	
	sort($plik11);
	for($ind=0; $ind<$index; $ind++)
		{
			$plik9=$plik11[$ind];
			if($plik9<>"" && $plik9<>"." && $plik9<>".."){
				echo "<br><a href='".$url."/kontener-ramka/tekst/".$plik9."'>".$plik9."</a>";
		}
		}
	}
?>
</div>
<br><br><br>







<div style="background-color:orange;">
<!-- kasowanie pojedynczych plikow opisowych tekstowych-->
<form action="panel.php" method ="POST">
<select name="nazwa_pliku3" style="width:200px;">
<?php
	if($directory = opendir('kontener-ramka/tekst/'))

	{
	$index=0;
	 while(($pliki = readdir($directory)) <> false)
		{
			$plik12[$index]=$pliki;
			$index++;
		}
	
	sort($plik12);
	for($ind=0; $ind<$index; $ind++)
		{
			$plik10=$plik12[$ind];
			echo "<option value='".$plik10."'>".$plik10."</option>";
		}
	}
?>
</select>
<input type="submit" value="kasuj plik">&nbsp;&nbsp;&nbsp;<input type="submit" value="odśwież listę">
</form>
<?php
	$nazwa_pliku=$_POST['nazwa_pliku3'];
	if($nazwa_pliku<>"" && $nazwa_pliku<>"." && $nazwa_pliku<>".."){
		unlink("kontener-ramka/tekst/$nazwa_pliku");
		echo "<script language='javascript'>alert('Plik ".$nazwa_pliku." został skasowany');
			</script>";
	}
?>
</div>





<?php
$plik_tmp1 = $_FILES['plik1']['tmp_name'];
$plik_nazwa1 = $_FILES['plik1']['name'];
$plik_rozmiar1 = $_FILES['plik1']['size'];

$plik_tmp3 = $_FILES['plik3']['tmp_name'];
$plik_nazwa3 = $_FILES['plik3']['name'];
$plik_rozmiar3 = $_FILES['plik3']['size'];

if(is_uploaded_file($plik_tmp1)) {
		move_uploaded_file($plik_tmp1, "kontener-ramka/kontener/".$plik_nazwa1);
		echo "<script language='javascript'>alert('Plik ".$plik_nazwa1." o rozmiarze".$plik_rozmiar1." został przesłany na serwer')";
		//echo "Plik: <strong>".$plik_nazwa1."</strong> o rozmiarze 
		//<strong>".$plik_rozmiar1." bajtów</strong> został przesłany na serwer!";
}		
if(is_uploaded_file($plik_tmp3)) {
		move_uploaded_file($plik_tmp3, "kontener-ramka/tekst/".$plik_nazwa3);
		echo "<script language='javascript'>alert('Plik ".$plik_nazwa3." o rozmiarze".$plik_rozmiar3." został przesłany na serwer')";
		//echo "Plik: <strong>".$plik_nazwa3."</strong> o rozmiarze 
		//<strong>".$plik_rozmiar3." bajtów</strong> został przesłany na serwer!";
}		
		   


//echo "<br><br><br>".$_SESSION['jaki_kontener'];
?>

<!--  TUTAJ -->
<?php
}
?>
<br><br><br>
<div style="text-align:center;"><a href="<?php echo $url2; ?>/" style="color:#210d9b;;">powrót na główną stronę programów</a></div>

</body>
</head>
</html>
