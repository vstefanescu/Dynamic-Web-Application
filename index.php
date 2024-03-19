<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('poza.jpg');
            background-size: cover;
            font-family: Arial, sans-serif;
        }

        .set-order {
            max-width: 400px;
            margin: 100px auto;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        h3 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin: 10px 0;
            padding: 10px;
            width: 100%;
        }

        button {
            padding: 10px;
            width: 100%;
            background-color: #F80D0D;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function validateOrderForm() {
            var nume = document.getElementsByName("Nume")[0].value;
            var telefon = document.getElementsByName("Telefon")[0].value;
            var mancare = document.getElementsByName("Nume fel de mancare")[0].value;
            var descriere = document.getElementsByName("Descriere")[0].value;

            if (nume === "" && telefon === "" || mancare === "" && descriere === "") {
                alert("All the fields are required.");
                return false;
            }
            
            return true;
        }
    </script>

<button onclick="listClients()">Clienti</button>

<button onclick="listFoods()">Feluri de mancare</button>

<div id="listOutput"></div>

<script>
    function listClients() {
        fetch('includes/listClients.php')
            .then(response => response.text())
            .then(data => document.getElementById('listOutput').innerHTML = data);
    }

    function listFoods() {
        fetch('includes/listFoods.php')
            .then(response => response.text())
            .then(data => document.getElementById('listOutput').innerHTML = data);
    }
</script>

</head>
<body>

<div class="set-order">
    <h3>Inregistrare Client</h3>
    <form name="personalData" action="includes/formhandler.inc.php" method="post" onsubmit="return validateOrderForm();">
        <input type="text" name="Nume" placeholder="Nume">
        <input type="tel" name="Telefon" placeholder="Telefon (+40)">
        <button type="submit" name="submitClient">Adauga Client</button>
    </form>

    <h3>Adaugare Fel de Mancare</h3>
    <form name="foodForm" action="includes/formhandler.inc.php" method="post" onsubmit="return validateOrderForm();">
        <input type="text" name="NumeMancare" placeholder="Nume Fel de Mancare">
        <input type="text" name="Descriere" placeholder="Descriere">
        <button type="submit" name="submitFood">Adauga Fel de Mancare</button>
    </form>

<form name="deleteClientForm" action="includes/formhandler.inc.php" method="post">
    <input type="text" name="deleteClientId" placeholder="Client ID">
    <button type="submit" name="deleteClient">Sterge Client</button>
</form>


<form name="deleteFoodForm" action="includes/formhandler.inc.php" method="post">
    <input type="text" name="deleteFoodId" placeholder="Food ID">
    <button type="submit" name="deleteFood">Sterge Fel de Mancare</button>
</form>
</div>

</body>
</html>