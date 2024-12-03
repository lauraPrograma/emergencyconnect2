
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Todas as Ocorrências</title>

    <!-- CSS Embutido para Estilo -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        button {
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
        }

        button:hover {
            background-color: #0056b3;
        }

        #result {
            margin-top: 20px;
        }

        .occurrence {
            background-color: white;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .occurrence h3 {
            margin-top: 0;
            color: #333;
        }

        .details {
            margin-top: 10px;
        }

        .details p {
            font-size: 14px;
            color: #555;
        }

        .details strong {
            color: #333;
        }
    </style>
</head>
<body>

    <h1>Consultar Todas as Ocorrências</h1>

    <button onclick="getAllOccurrences()">Consultar Todas as Ocorrências</button>

    <div id="result"></div>

    <script>
        async function getAllOccurrences() {
            // Fazer a requisição GET para a API que retorna todas as ocorrências
            const response = await fetch('http://localhost/emergencyconnect2/api/emergencyForms/occurrences');
            const data = await response.json();

            // Exibir os resultados
            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = '';  // Limpar resultados anteriores

            // Verificar se a resposta foi bem-sucedida
            if (data.type === 'success' && data.data.length > 0) {
                const occurrences = data.data;
                occurrences.forEach(occurrence => {
                    let html = `
                        <div class="occurrence">
                            <h3>Ocorrência ID: ${occurrence.id}</h3>
                            <div class="details">
                                <p><strong>CPF:</strong> ${occurrence.cpf}</p>
                                <p><strong>Tipo de Incidente:</strong> ${occurrence.typeOfIncident}</p>
                                <p><strong>Condição de Saúde:</strong> ${occurrence.healthCondition}</p>
                                <p><strong>Endereço:</strong> ${occurrence.address}</p>
                                <p><strong>Local da Dor:</strong> ${occurrence.painLocation || 'Não informado'}</p>
                                <p><strong>Respiração:</strong> ${occurrence.breathing || 'Não informado'}</p>
                                <p><strong>Consciência:</strong> ${occurrence.consciousness || 'Não informado'}</p>
                                <p><strong>Lesões:</strong> ${occurrence.injuries || 'Não informado'}</p>
                                <p><strong>Alergias:</strong> ${occurrence.allergies || 'Não informado'}</p>
                                <p><strong>Medicações:</strong> ${occurrence.medications || 'Não informado'}</p>
                                <p><strong>Contato de Emergência:</strong> ${occurrence.emergencyContact}</p>
                            </div>
                        </div>
                    `;
                    resultDiv.innerHTML += html;
                });
            } else {
                resultDiv.innerHTML = `<p>Não foram encontradas ocorrências.</p>`;
            }
        }
    </script>

</body>
</html>
