function redirectToModifica() {
    // Ottieni l'URL della pagina di modifica dalla variabile PHP (puoi passarla come attributo data nel bottone)
    var url = "{{ route('modifica_staff', ['username' => $utente->Username]) }}";

    // Reindirizza l'utente alla pagina di modifica
    window.location.href = url;
}
