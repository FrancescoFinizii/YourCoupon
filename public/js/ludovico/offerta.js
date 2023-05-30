var timerElement = document.getElementById('timer');

// Imposta il tempo di partenza in secondi (esempio: 60 secondi)
var startTime = 20;

// Funzione per aggiornare il timer
function updateTimer() {
    // Verifica se il tempo è scaduto
    if (startTime <= 0) {
        timerElement.textContent = 'Offerta scaduta!';
        return;
    }

    // Calcola minuti e secondi
    var minutes = Math.floor(startTime / 60);
    var seconds = startTime % 60;

    // Aggiorna il contenuto dell'elemento <p> con il tempo rimanente
    timerElement.textContent = 'Tempo rimanente: ' + minutes + ' min ' + seconds + ' sec';

    // Sottrai 1 secondo dal tempo rimanente
    startTime--;

    // Richiama la funzione updateTimer dopo 1 secondo
    setTimeout(updateTimer, 1000);
}

// Avvia il timer
updateTimer();
