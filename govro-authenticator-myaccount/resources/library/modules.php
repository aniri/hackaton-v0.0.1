<?php
function getBeneficii()
	{
		$conn = dbConnect();
		$sql = "SELECT  [uuid]
      ,[partnerName]
      ,[tipBeneficiari]
      ,[partnerLogo]
      ,[telefon]
      ,[emailBeneficii]
      ,[active]
  FROM [beneficiiTeasiguri].[beneficiiTeasiguri].[beneficii]";
  logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row
				$i = 0;
				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result[$i] = array("uuid" => $row["uuid"], "partnerName" => $row["partnerName"], "tipBeneficiari" => $row["tipBeneficiari"], "partnerLogo" => $row["partnerLogo"], "telefon" => $row["telefon"], "emailBeneficii" => $row["emailBeneficii"], "active" => $row["active"]);
					$i = $i + 1;
					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function getBeneficiu($uuid)
	{
		$conn = dbConnect();
		$sql = "SELECT  [uuid]
      ,[partnerName]
      ,[tipBeneficiari]
      ,[partnerLogo]
      ,[telefon]
      ,[emailBeneficii]
      ,[active]
  FROM [beneficiiTeasiguri].[beneficiiTeasiguri].[beneficii] where [uuid] = '".$uuid."'";
  logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("uuid" => $row["uuid"], "partnerName" => $row["partnerName"], "tipBeneficiari" => $row["tipBeneficiari"], "partnerLogo" => $row["partnerLogo"], "telefon" => $row["telefon"], "emailBeneficii" => $row["emailBeneficii"], "active" => $row["active"]);

					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function getBeneficiuCasco($uuid)
	{
		$conn = dbConnect();
		$sql = "SELECT *
  FROM [beneficiiTeasiguri].[beneficiiTeasiguri].[casco] where [idBeneficii] = '".$uuid."'";
  logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("subtitlucasco" => $row["subtitlucasco"],
						"descrierecasco" => $row["descrierecasco"],
						"box1Textcasco" => $row["box1Textcasco"],
						"box2Textcasco" => $row["box2Textcasco"],
						"box3Textcasco" => $row["box3Textcasco"],
						"mentiuniSuplimentarecasco" => $row["mentiuniSuplimentarecasco"],
						"programareApelcasco1" => $row["programareApelcasco1"],
						"programareApelcasco2" => $row["programareApelcasco2"],
						"programareApelcasco3" => $row["programareApelcasco3"],
						"comandaAsigurareacasco1" => $row["comandaAsigurareacasco1"],
						"comandaAsigurareacasco2" => $row["comandaAsigurareacasco2"]);

					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function getBeneficiulocuinta($uuid)
	{
		$conn = dbConnect();
		$sql = "SELECT *
  FROM [beneficiiTeasiguri].[beneficiiTeasiguri].[locuinta] where [idBeneficii] = '".$uuid."'";
  logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("subtitlulocuinta" => $row["subtitlulocuinta"],
						"descrierelocuinta" => $row["descrierelocuinta"],
						"box1Textlocuinta" => $row["box1Textlocuinta"],
						"box2Textlocuinta" => $row["box2Textlocuinta"],
						"box3Textlocuinta" => $row["box3Textlocuinta"],
						"mentiuniSuplimentarelocuinta" => $row["mentiuniSuplimentarelocuinta"],
						"programareApellocuinta1" => $row["programareApellocuinta1"],
						"programareApellocuinta2" => $row["programareApellocuinta2"],
						"programareApellocuinta3" => $row["programareApellocuinta3"],
						"comandaAsigurarealocuinta1" => $row["comandaAsigurarealocuinta1"],
						"comandaAsigurarealocuinta2" => $row["comandaAsigurarealocuinta2"]);

					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function getBeneficiumedicala($uuid)
	{
		$conn = dbConnect();
		$sql = "SELECT *
  FROM [beneficiiTeasiguri].[beneficiiTeasiguri].[medicala] where [idBeneficii] = '".$uuid."'";
  logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("subtitlumedicala" => $row["subtitlumedicala"],
						"descrieremedicala" => $row["descrieremedicala"],
						"box1Textmedicala" => $row["box1Textmedicala"],
						"box2Textmedicala" => $row["box2Textmedicala"],
						"box3Textmedicala" => $row["box3Textmedicala"],
						"mentiuniSuplimentaremedicala" => $row["mentiuniSuplimentaremedicala"],
						"programareApelmedicala1" => $row["programareApelmedicala1"],
						"programareApelmedicala2" => $row["programareApelmedicala2"],
						"programareApelmedicala3" => $row["programareApelmedicala3"],
						"comandaAsigurareamedicala1" => $row["comandaAsigurareamedicala1"],
						"comandaAsigurareamedicala2" => $row["comandaAsigurareamedicala2"]);

					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function getBeneficiuRCA($uuid)
	{
		$conn = dbConnect();
		$sql = "SELECT *
  FROM [beneficiiTeasiguri].[beneficiiTeasiguri].[RCA] where [idBeneficii] = '".$uuid."'";
  logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
				// output data of each row

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) )
					{
						$result = array("subtitluRCA" => $row["subtitluRCA"],
						"descriereRCA" => $row["descriereRCA"],
						"box1TextRCA" => $row["box1TextRCA"],
						"box2TextRCA" => $row["box2TextRCA"],
						"box3TextRCA" => $row["box3TextRCA"],
						"mentiuniSuplimentareRCA" => $row["mentiuniSuplimentareRCA"],
						"programareApelRCA1" => $row["programareApelRCA1"],
						"programareApelRCA2" => $row["programareApelRCA2"],
						"programareApelRCA3" => $row["programareApelRCA3"],
						"comandaAsigurareaRCA1" => $row["comandaAsigurareaRCA1"],
						"comandaAsigurareaRCA2" => $row["comandaAsigurareaRCA2"]);

					}
			}
		sqlsrv_free_stmt( $stmt);
		return $result;
}
function updateBeneficiu($uuid, $query)
	{
		if ($query != null)
		{

		$comma_separated = implode(",", $query);

		$conn = dbConnect();
		$sql = "UPDATE [beneficiiTeasiguri].[beneficiiTeasiguri].[beneficii] SET ".$comma_separated." where [uuid] = '".$uuid."'";
		logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
			logAppend("Updated " . $uuid);
			}
		else
		{
			logAppend("An error was received when update for " . $uuid);

		}

		sqlsrv_free_stmt( $stmt);
		}
		else
			{
				echo "no query";
			}
	}
function updateBeneficiuCasco($uuid, $query)
	{
		if ($query != null)
		{

		$comma_separated = implode(",", $query);

		$conn = dbConnect();
		$sql = "UPDATE [beneficiiTeasiguri].[beneficiiTeasiguri].[casco] SET ".$comma_separated." where [idBeneficii] = '".$uuid."'";
		logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
			logAppend("Updated " . $uuid);
			}
		else
		{
			logAppend("An error was received when update for " . $uuid);

		}

		sqlsrv_free_stmt( $stmt);
		}

	}
	function updateBeneficiuLocuinta($uuid, $query)
	{
		if ($query != null)
		{

		$comma_separated = implode(",", $query);

		$conn = dbConnect();
		$sql = "UPDATE [beneficiiTeasiguri].[beneficiiTeasiguri].[locuinta] SET ".$comma_separated." where [idBeneficii] = '".$uuid."'";
		logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
			logAppend("Updated " . $uuid);
			}
		else
		{
			logAppend("An error was received when update for " . $uuid);

		}

		sqlsrv_free_stmt( $stmt);
		}

	}
	function updateBeneficiuMedicala($uuid, $query)
	{
		if ($query != null)
		{

		$comma_separated = implode(",", $query);

		$conn = dbConnect();
		$sql = "UPDATE [beneficiiTeasiguri].[beneficiiTeasiguri].[medicala] SET ".$comma_separated." where [idBeneficii] = '".$uuid."'";
		logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
			logAppend("Updated " . $uuid);
			}
		else
		{
			logAppend("An error was received when update for " . $uuid);

		}

		sqlsrv_free_stmt( $stmt);
		}

	}
	function updateBeneficiuRCA($uuid, $query)
	{
		if ($query != null)
		{

		$comma_separated = implode(",", $query);

		$conn = dbConnect();
		$sql = "UPDATE [beneficiiTeasiguri].[beneficiiTeasiguri].[RCA] SET ".$comma_separated." where [idBeneficii] = '".$uuid."'";
		logAppend($sql);
		$stmt = sqlsrv_query( $conn, $sql );
		if( $stmt)
			{
			logAppend("Updated " . $uuid);
			}
		else
		{
			logAppend("An error was received when update for " . $uuid);

		}

		sqlsrv_free_stmt( $stmt);
		}

	}
?>