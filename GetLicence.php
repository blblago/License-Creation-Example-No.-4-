<?php

	/* Постоянная лицензия
							preg-1			 domen						preg - 1					   preg - 2			time	      preg - 2
	MzQ5ZjM2YWE3ODlhZjA=  2MNmezM50zJNQw  WWpOQ2JHSnRUbWhqYmxGNQ==  YmFlGY2YMzcymIwM  d1fe173d0  Yj1GExdmMQx9x3Yz  MTU4MTQyMTM2Mw==  wYzEwY2UzJl M2U2ZTE2MTk1NGM2Yjk=
	*/
    $_data = [
	   'site' => base64_encode(base64_encode(base64_encode('opencart2'))),
	   'time' => base64_encode(1581421363),
	];
	
	$genLicence = base64_encode("MzQ5ZjM2YWE3ODlhZjA=2MNmezM50zJNQw".$_data['site']."YmFlGY2YMzcymIwMd1fe173d0Yj1GExdmMQx9x3Yz".$_data['time']."wYzEwY2UzJlM2U2ZTE2MTk1NGM2Yjk=");
	
	echo $genLicence;
	

	$_data = [
	   'site' => base64_encode('opencart2'),
	   'time' => base64_encode(base64_encode(1581421363)),
	   'day' => base64_encode(3),
	];
	

	/* Временная лицензия
                            preg-1             domen                    preg - 1                    preg - 2           time                 preg - 2           preg - 3        day             preg - 3                       
	MzQ5ZjM2YWE3ODlhZjA=  JYzYmdcyc			b3BlbmNhcnQy            4yN3YjRhjYzc     wYzEwY2UzJl  BwjYzc3YThiZ   TVRVNE1UUXlNVE0yTXc9PQ==  E2kNxNzFYzDAw   A4zk2YZjNzA4Y		Mw==	ENTNmF1Mmj0Nzkw
	*/
	$genLicence = base64_encode("MzQ5ZjM2YWE3ODlhZjA=JYzYmdcyc".$_data['site']."4yN3YjRhjYzcwYzEwY2UzJlBwjYzc3YThiZ".$_data['time']."E2kNxNzFYzDAwA4zk2YZjNzA4Y".$_data['day']."ENTNmF1Mmj0Nzkw");
	
	echo $genLicence;
	
