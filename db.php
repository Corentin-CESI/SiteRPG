<?php
//------------------------------------
//  _____      _ _    ____________ 
// |_   _|    (_) |   |  _  \ ___ \
//   | | _ __  _| |_  | | | | |_/ /
//   | || '_ \| | __| | | | | ___ \
//  _| || | | | | |_  | |/ /| |_/ /
//  \___/_| |_|_|\__| |___/ \____/ 
//------------------------------------
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bdd-rpg';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
try {
    $pdo_conn = new PDO($dsn, $user, $password, $options);
} catch (PDOException $e) {
    $msg = $e->getMessage();
    header("Location: 404.html"); 
    die("Connection failed: " . $e->getMessage() . ' <br> Wtih error n° ' . (int)$e->getCode());
}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
$sql = "SELECT * FROM t_partie_pat";
$stmt = $pdo_conn->query($sql);
$party_table = [];

while ($row = $stmt->fetch()) {
    $party_table[] = $row;
}
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        function getjeux_static()
        {
            global $pdo_conn;
            $sql = "SELECT * FROM t_univers_uni";
            $stmt = $pdo_conn->query($sql);
            $jeux = [];
            
            while ($row = $stmt->fetch()) {
                $jeu = [
                    "UNI_ID" => $row["UNI_ID"],
                    "UNI_NOM" => $row["UNI_NOM"],
                    "UNI_ALIAS" => $row["UNI_ALIAS"],
                    "UNI_DESCRIPTION" => $row["UNI_DESCRIPTION"]
                ];
                array_push($jeux,$jeu);
            }
            return $jeux;
        }

        function getReglesByJeux($titre){
            
            return array(
                "rules_and_scenario.php"
                // "donjons_&_dragons.php",
                // "index_card_rpg.php",
                // "fiasco.php",
                // "blades_in_the_dark.php",
                // "alien.php",
                // "starfinder.php",
                // "cyberpunk.php"
            );
        }

        function getpersonnage_static()
        {
            global $pdo_conn;
            $sql = "SELECT * FROM t_personnage_prs";
            $stmt = $pdo_conn->query($sql);
            $personnages = [];
            
            while ($row = $stmt->fetch()) {
                $personnage = [
                    "PRS_ID" => $row["PRS_ID"],
                    "PRS_NOM" => $row["PRS_NOM"],
                    "PRS_RACE" => $row["PRS_RACE"],
                    "PRS_CLASSE" => $row["PRS_CLASSE"],
                    "PRS_NIVEAU" => $row["PRS_NIVEAU"],
                    "PRS_ACTIF" => $row["PRS_ACTIF"]
                ];
                array_push($personnages,$personnage);
            }
            return $personnages;
        }

        function getparty_static()
        {
            global $pdo_conn;
            $sql = "SELECT * FROM t_partie_pat";
            $stmt = $pdo_conn->query($sql);
            $parties = [];
            
            while ($row = $stmt->fetch()) {
                $partie = [
                    "PAT_ID" => $row["PAT_ID"],
                    "PAT_LIEU" => $row["PAT_LIEU"],
                    "PAT_HORAIRE" => $row["PAT_HORAIRE"],
                    "PAT_DUREE" => $row["PAT_DUREE"],
                    "PAT_MAITREDUJEU" => $row["PAT_MAITREDUJEU"]
                ];
                array_push($parties,$partie);
            }
            return $parties;
        }
?>