<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "dbh.inc.php";

    if (isset($_POST["submitClient"])) {
        $Nume = isset($_POST["Nume"]) ? trim($_POST["Nume"]) : '';
        $Telefon = isset($_POST["Telefon"]) ? trim($_POST["Telefon"]) : '';

        if (empty($Nume) || empty($Telefon)) {
            die("Name and phone are required fields.");
        }

        try {
            $query = "INSERT INTO Clienti(Nume, Telefon) VALUES (?, ?);";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$Nume, $Telefon]);

            if ($stmt->rowCount() > 0) {
                echo "<script>
                        setTimeout(function() {
                            alert('Client data added successfully.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            } else {
                echo "<script>
                        setTimeout(function() {
                            alert('Failed to add client data.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            }

            $stmt = null;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }

    } elseif (isset($_POST["submitFood"])) {
        $NumeMancare = isset($_POST["NumeMancare"]) ? trim($_POST["NumeMancare"]) : '';
        $Descriere = isset($_POST["Descriere"]) ? trim($_POST["Descriere"]) : '';

        if (empty($NumeMancare) || empty($Descriere)) {
            die("Food name and description are required fields.");
        }

        try {
            $query = "INSERT INTO feluri_de_mancare(Nume, Descriere) VALUES (?, ?);";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$NumeMancare, $Descriere]);

            if ($stmt->rowCount() > 0) {
                echo "<script>
                        setTimeout(function() {
                            alert('Food data added successfully.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            } else {
                echo "<script>
                        setTimeout(function() {
                            alert('Failed to add food data.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            }

            $stmt = null;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }

    } else {
        echo "<script>
                setTimeout(function() {
                    alert('Invalid form submission.');
                }, 500); // 500 milliseconds delay
                window.location.href = '../index.php';
              </script>";
    }

    if (isset($_POST["deleteClient"])) {
        $deleteClientId = isset($_POST["deleteClientId"]) ? intval($_POST["deleteClientId"]) : 0;

        echo "Received Client ID: " . $deleteClientId;

        if ($deleteClientId <= 0) {
            echo "<script>
                    setTimeout(function() {
                        alert('Invalid client ID.');
                    }, 500); // 500 milliseconds delay
                    window.location.href = '../index.php';
                  </script>";
            die();
        }

        try {
            $query = "DELETE FROM Clienti WHERE `ID Client` = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$deleteClientId]);

            if ($stmt->rowCount() > 0) {
                echo "<script>
                        setTimeout(function() {
                            alert('Client data deleted successfully.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            } else {
                echo "<script>
                        setTimeout(function() {
                            alert('Failed to delete client data. Client ID not found.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    if (isset($_POST["deleteFood"])) {
        $deleteFoodId = isset($_POST["deleteFoodId"]) ? intval($_POST["deleteFoodId"]) : 0;

        echo "Received Food ID: " . $deleteFoodId;

        if ($deleteFoodId <= 0) {
            echo "<script>
                    setTimeout(function() {
                        alert('Invalid food ID.');
                    }, 500); // 500 milliseconds delay
                    window.location.href = '../index.php';
                  </script>";
            die();
        }

        try {
            $query = "DELETE FROM feluri_de_mancare WHERE `ID Fel de mancare` = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$deleteFoodId]);

            if ($stmt->rowCount() > 0) {
                echo "<script>
                        setTimeout(function() {
                            alert('Food data deleted successfully.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            } else {
                echo "<script>
                        setTimeout(function() {
                            alert('Failed to delete food data. Food ID not found.');
                        }, 500); // 500 milliseconds delay
                        window.location.href = '../index.php';
                      </script>";
            }
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    $pdo = null;
} else {
    header("Location: ../index.php");
    die();
}
?>
