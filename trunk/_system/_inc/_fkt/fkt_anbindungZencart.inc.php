<?
/**
 * Funktionen zur Anbindung an den Zen Cart-Shop.
 * 
 * twDbConn():
 * Am Anfang jedes php-Skriptes sollte (die hier definierte Fkt.) twDbConn() 
 * aufgerufen werden, dann ist während des gesamten Skriptes eine DB-Verbindung
 * vorhanden.
 * 
 * twDbClose(): 
 * Am Ende des php-Skriptes vorsichtshalber twDbClose() aufrufen.
 * 
 * alle anderen:
 * Setzen eine geöffnete Datenbank-Verbindung voraus.
 */
	 

/* Datenbank- Funktionen ---------------------------------------------------- */

/**
 * Stellt IMMER EINE NEUE Verbindung zur Datenbank her.
 * Nutzt derzeit Konstanten des ZenCart-Shop's.
 */
function twDbConn() {
	// DB-Verbindung-Daten holen (von ZenCart)
	include("../shop/includes/configure.php");
	
	$twDbConn = null;
	if ($twDbConn === null) {
		$twDbConn = @mysql_connect(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD) or
						die('Keine Verbindung zur Datenbank, weil:<br />---'. mysql_error(). '---<br />');
		mysql_select_db(DB_DATABASE, $twDbConn) or
						die('Kann Datenbank '. DB_DATABASE. ' nicht nutzen, weil:<br />---' .mysql_error(). '---<br />');
	}
	
	return $twDbConn;
}

/**
 * Schließt die übergebene Datenbank-Verbindung.
 */
function twDbClose($twDbConn) {
		if (isset($twDbConn)) {
    	mysql_close($twDbConn);
		}
  }





/**
 * Datenbank-Abfrage
 * Liefert die ID von einem Attributname aus der Datenbank.
 */
function twDbSelect_products_options_id($attributname) {
	$dbPrefix = "zen_";
	$language = "43"; // deutsch
 	
  $sql = "select products_options_id
          from ". $dbPrefix. "products_options
          where products_options_name='" . $attributname . "'
          and language_id='". $language. "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_options_id']. "<br />";
		return $zeile['products_options_id'];
	} else {
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert ein Array aller Attributmerkmal-ID's zu einer Attribut-ID
 * (products_options_id)
 */
function twDbSelectArr_products_options_values_id($id) {
	$dbPrefix = "zen_";
		
 	// erstmal die Attribut-ID zu Attributname holen (z.B: 1 von Größe)
  $sql = "select products_options_values_id
          from ". $dbPrefix. "products_options_values_to_products_options
          where products_options_id = '" . $id . "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$arr = array();
		$i = 0;
		while ($zeile = mysql_fetch_array($res)) {
			$arr[$i] = $zeile['products_options_values_id'];
			$i++;
		}
		/* while (list($key, $val) = each($arr)) {
			echo $key. " --- ". $val. "<br />";
		} */
  	return $arr;
	} else {
		echo "Keine Attributmerkmale in der Datenbank gefunden!<br />";
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert den Attributmerkmal-Name zu einer Attributmerkmal-ID (zB: XXL)
 */
function twDbSelect_products_options_values_name($id) {
	$dbPrefix = "zen_";
	$language = "43"; // deutsch
	
 	// erstmal die Attribut-ID zu Attributname holen (z.B: 1 von Größe)
  $sql = "select products_options_values_name
          from ". $dbPrefix. "products_options_values
          where products_options_values_id = '" . $id . "'
          and language_id='". $language. "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_options_values_name']. "<br />";	
  	return $zeile['products_options_values_name'];
	} else {
		echo "Keinen Attributmerkmal-Name in der Datenbank gefunden!<br />";
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert den Attribut-Name zu einer Attribut-ID aus der Datenbank
 */
function twDbSelect_products_options_name($id) {
	$dbPrefix = "zen_";
	$language = "43";  // deutsch
	
	// falls 'txt_' in der id vorkommt (is in Zencart bei Text-Attribut so, mist)
	if (substr($id, 0, 4) == "txt_") {
		$id = substr($id, 4);
	}
	
 	// Attributname zur Attribut-ID holen (z.B: Größe von 1)
  $sql = "select products_options_name
          from ". $dbPrefix. "products_options
          where products_options_id = '" . $id . "'
          and language_id='". $language. "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_options_name']. "<br />";	
  	return $zeile['products_options_name'];
	} else {
		echo "Keinen Attribut-Name in der Datenbank gefunden-". $id. "-!<br />";
	}
}


/**
 * Datenbank-Abfrage
 * Liefert den Attribut-Typ (zB Radio) zu einer Attribut-ID aus der Datenbank
 */
function twDbSelect_products_options_type($id) {
	$dbPrefix = "zen_";
	$language = "43";  // deutsch
	
 	// erstmal die Attribut-ID zu Attributname holen (z.B: 1 von Größe)
  $sql = "select products_options_type
          from ". $dbPrefix. "products_options
          where products_options_id = '" . $id . "'
          and language_id='". $language. "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_options_type']. "<br />";	
  	return $zeile['products_options_type'];
	} else {
		echo "Keinen Attribut-Typ in der Datenbank gefunden!<br />";
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert den Attribut-Kommentar zu einer Attribut-ID aus der Datenbank
 */
function twDbSelect_products_options_comment($id) {
	$dbPrefix = "zen_";
	$language = "43";  // deutsch
	
 	// erstmal die Attribut-ID zu Attributname holen (z.B: 1 von Größe)
  $sql = "select products_options_comment
          from ". $dbPrefix. "products_options
          where products_options_id = '" . $id . "'
          and language_id='". $language. "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_options_comment']. "<br />";	
  	return $zeile['products_options_comment'];
	} else {
		echo "Keinen Attribut-Kommentar in der Datenbank gefunden!<br />";
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert die Produkt-id zu einem Artikel.
 */
function twDbSelect_products_id($artikel) {
	$dbPrefix = "zen_";
	
  $sql = "select products_id
          from ". $dbPrefix. "products
          where products_model = '" . $artikel . "'";                      
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_id']. "<br />";
  	return $zeile['products_id'];
	} else {
		return false;
	}
		
	
}
  
  
/**
 * Datenbank-Abfrage
 * Liefert die Kategorie-id zu einem Artikel.
 */
function twDbSelect_master_categories_id($artikel) {
	$dbPrefix = "zen_";

  $sql = "select master_categories_id
          from ". $dbPrefix. "products
          where products_model = '" . $artikel . "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['master_categories_id']. "<br />";
  	return $zeile['master_categories_id'];
	} else {
		return false;
	}
} 


/**
 * Datenbank-Abfrage
 * Liefert ein Array aller Attribut-ID's zu einem Artikel (products_id)
 */
function twDbSelectArr_products_attributes_id($products_id) {
	$dbPrefix = "zen_";
		
  $sql = "select products_attributes_id
          from ". $dbPrefix. "products_attributes
          where products_id = '" . $products_id . "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$arr = array();
		$i = 0;
		while ($zeile = mysql_fetch_array($res)) {
			$arr[$i] = $zeile['products_attributes_id'];
			$i++;
		}
		/*while (list($key, $val) = each($arr)) {
			echo $key. " --- ". $val. "<br />";
		}*/
  	return $arr;
	} else {
		//echo "Keine Attribut-Id's in der Datenbank gefunden!<br />";
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert ein Array aller Attribute eines Artikels.
 * Jedes Attribut ist wieder ein Array von Eigenschaften(des Attributes).
 */
function twDbSelectArrTw_AttributeVonArtikel($products_id) {
	$dbPrefix = "zen_";
		
  $sql = "select *
          from ". $dbPrefix. "products_attributes
          where products_id = '" . $products_id . "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$arr = array();
		$i = 0;
		while ($zeile = mysql_fetch_array($res)) {
			$arr[$i]['products_attributes_id'] = $zeile['products_attributes_id']; 
			$arr[$i]['options_id'] = $zeile['options_id'];
			$arr[$i]['options_values_id'] = $zeile['options_values_id'];
			$arr[$i]['options_values_price'] = $zeile['options_values_price'];
			$arr[$i]['price_prefix'] = $zeile['price_prefix'];
			$arr[$i]['products_options_sort_order'] = $zeile['products_options_sort_order'];
			$arr[$i]['attributes_default'] = $zeile['attributes_default'];
			$arr[$i]['attributes_image'] = $zeile['attributes_image'];
			$arr[$i]['attributes_required'] = $zeile['attributes_required'];
			$i++;
		}
		/*$i=0;
		while (list($key, $val) = each($arr)) {
			echo "products_attributes_id------: ". $arr[$i]['products_attributes_id']. "<br />";
			echo "options_id------------------: ". $arr[$i]['options_id']. "<br />";
			echo "options_values_id-----------: ". $arr[$i]['options_values_id']. "<br />";
			echo "options_values_price--------: ". $arr[$i]['options_values_price']. "<br />";
			echo "price_prefix----------------: ". $arr[$i]['price_prefix']. "<br />";
			echo "products_options_sort_order-: ". $arr[$i]['products_options_sort_order']. "<br />";
			echo "attributes_default----------: ". $arr[$i]['attributes_default']. "<br />";
			echo "attributes_image------------: ". $arr[$i]['attributes_image']. "<br />";
			echo "attributes_required---------: ". $arr[$i]['attributes_required']. "<br />";
			echo "-----------------------------<br />";
			$i++;
		}*/
  	return $arr;
	} else {
		//echo "Keine Attribut-Id's in der Datenbank gefunden!<br />";
		return false;
	}
}


/**
 * Datenbank-Abfrage
 * Liefert den Name zu einer Options-ID (z.B: Radio für 2).
 */
function twDbSelect_products_options_types_name($id) {
	$dbPrefix = "zen_";

  $sql = "select products_options_types_name
          from ". $dbPrefix. "products_options_types
          where products_options_types_id = '" . $id . "'";                     
	$res = mysql_query($sql) or die("! mysql_query-Fehler !: ". mysql_error());
	if (mysql_num_rows($res) > 0) {
		$zeile = mysql_fetch_array($res);
		//echo $zeile['products_options_types_name']. "<br />";
  	return $zeile['products_options_types_name'];
	} else {
		return false;
	}
} 






