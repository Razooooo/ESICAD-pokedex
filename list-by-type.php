<?php require_once("head.php"); 
require_once('database-connection.php'); 
$query = $databaseConnection->query("SELECT NomPokemon, urlPhoto, T.libelleType AS 'Type 1' from pokemon P JOIN typepokemon T ON P.IdTypePokemon = T.IdType ORDER BY IdPokemon"); 
    if (!$query) { throw new RuntimeException("Cannot execute query. Cause: " . mysqli_error($databaseConnection)); } 
    else { 
        $pokemons = $query->fetch_all(MYSQLI_ASSOC); 
        echo "<table border='1' cellpadding='10' cellspacing='0' style='border-collapse: collapse;'>"; 
        echo "<tr>
        <th>Nom</th>
        <th>Image</th>
        <th>Type</th>
        </tr>";
    foreach ($pokemons as $pokemon) { 
    echo "<tr>
    <td>" . $pokemon["NomPokemon"] . "</td>
    <td><img src='" . $pokemon['urlPhoto']. "' alt='" . $pokemon["NomPokemon"] . "' width='50' height='50'></td>
    <td>" . $pokemon["Type 1"] . "</td>
    </tr>"; } 
    echo "</table>"; } 
    require_once("footer.php");
     ?>


