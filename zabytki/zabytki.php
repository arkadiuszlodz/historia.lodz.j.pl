<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Zabytki Łodzi</title>
	<link href="../style/style.css" rel="stylesheet" type="text/css">
	
	<style>

	</style>
</head>
<script>

	function tekst1(){
		window.document.all.tekstdiv1.style.visibility='visible';
		window.document.all.tekstdiv1.style.zIndex=index++;
	}
	
	function tekst1_zamkniety(){
		window.document.all.tekstdiv1.style.visibility='hidden';
	}
	
	function zdjecie1_1(nazwa){
		window.document.all.zdjeciediv1.style.visibility='visible';
		document.querySelector('img[name="zdjecie2_1"]').src = "/zabytki/kontener-ramka/kontener/"+nazwa;
	}
	
	function zdjecie1_1_zamkniety(){
		window.document.all.zdjeciediv1.style.visibility='hidden';
	}

	function tekst(nazwa) {
	  var rawFile = new XMLHttpRequest();
	  rawFile.open("GET", "/zabytki/kontener-ramka/tekst/"+nazwa+".txt", true);
	  rawFile.onreadystatechange = function() {
		if (rawFile.readyState === 4) {
		  var allText = rawFile.responseText;
		  document.getElementById("tekstdiv1").innerHTML = allText;
		};
	  }
	  rawFile.send();
	  tekst1()
	}
	
	var containerX = document.querySelector("posX");
	var containerY = document.querySelector("posY");
	
	var onMouseOve = function (ev){
		var posX=ev.clientX,
			posY=ev.clientY;
			
		containerX.textContent = posX;
		containerY.textContent = posY;
	}
	document.addEventListener("mouseove", onMouseOve);
	
	
	
	Napis="H i s t o r i a";
	i=0;
	function Font() {
		if (i<=Napis.length) {
		 document.Link1.Tekst.value=Napis.substring(0,i) + Napis.charAt(i).toUpperCase()+Napis.substring(i+1,Napis.length);
		 (i!=Napis.length) ? i++ : i=0;;
		 setTimeout("Font()",220);}
	}
	
</script>
<body onload="Font()">
<!--	x: <span id="posX">px</span>&nbsp;&nbsp;
		y: <span id="posY">px</span>
-->

<div>
<a href="/zabytki/panel-sterowania/" class="panel_sterowania">panel sterowania dla administratora</a>
	
		<center>
		<div class="naglowek"><br>Z A B Y T K I</div>
			<table cellpadding="0" cellspacing="0" border="0">
				<tr><td class="background3">
					<img src="/zabytki/gradient.gif">
				</td><td>
				<center>
					<div class="background2">
						<a href="http://miasto.lodz.j.pl/index.html"><img src="/zabytki/powrot2.gif"></a><br>
						<img src="/zabytki/logo.gif">
					</div>
				</center>
				</td><td class="background3">
					<img src="/zabytki/gradient.gif">
				</td></tr>
			</table>
		</center>
		<table cellpadding="5" cellspacing="0" border="0" style="margin:auto;" class="background2">
		<tr>
	
<?php
	if($directory = opendir('kontener-ramka/kontener/'))

	{
	$index=0;
	$index2=0;
	 while(($pliki = readdir($directory)) <> false)
		{
			$plik[$index]=$pliki;
			$index++;
		}
	
	sort($plik);
	for($ind=0; $ind<$index; $ind++)
		{
			$plik2=$plik[$ind];
			
			//echo $ind."  ";
			if($ind<>1 && $ind<>0){
				if($index2 % 4 ==0) echo "</tr><tr><td><a href='javascript:zdjecie1_1(\"".$plik2."\")' onclick='tekst(\"".$plik2."\")' class='odstep'>&nbsp;&nbsp;<img src='/zabytki/kontener-ramka/kontener/".$plik2."'class='zdjecia'><br></a></td>";
				else echo "<td><a href='javascript:zdjecie1_1(\"".$plik2."\")' onclick='tekst(\"".$plik2."\")' class='odstep'>&nbsp;&nbsp;<img src='/zabytki/kontener-ramka/kontener/".$plik2."'class='zdjecia'><br></a></td>"; 
				$index2++;
			}
		}
	} 
?>
	</tr>
	</table>

	<div>
	<FORM NAME="Link1">
		<a href="/historia-lodzi/" name="Tekst" style="position:absolute; top:100px;">
			<INPUT CLASS="banner" TYPE="Tekst" SIZE=15 NAME="Tekst" style="cursor:grab; color:red; border-style:none; border-left:3px solid #210d9b; font-size:24px; font-family:Courier; font-weight:bold;">
		</a>
	<FORM>
	</div>
	<div style="text-align:center;">
		<div> <a href="javascript:zdjecie1_1_zamkniety()" style="position:fixed; zIndex:index++; left:50px; top:148px; color:#210d9b;">z a m k n i j</a></div>
		<div class="tekst" id="zdjeciediv1" style="visibility:hidden; position:fixed; zIndex:index++; left:50px; top:198px; border:1px; border-style:solid;">
			<img name="zdjecie2_1" style="width:300px;">
		</div>
	</div>
	<div style="text-align:center;">
		<div> <a href="javascript:tekst1_zamkniety()" style="position:fixed; zIndex:index++; right:50px; top:8px; color:#210d9b;">z a m k n i j</a></div>
		<div class="tekst" id="tekstdiv1" style="visibility:hidden; position:fixed; zIndex:index++; right:50px; top:50px; width:400px; height180px; background-color:#eedca2; border:1px;; border-style:solid;"></div>
	</div>
</div>

<footer>
	<p style="font:normal bold 11px Tahoma,Arial;text-align:center;line-height:11px;margin:11px; color:black;">
	copyright &copy; 2021 Arkadiusz Olas</p>
</footer>

</body>
</html>