document.getElementById('crudFaqForm').addEventListener('submit', checkRadio);
function checkRadio(event) {
    var radioButtons = document.getElementsByName('faq_id');
    var isChecked = false;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            isChecked = true;
            break;
        }
    }

    if (!isChecked) {
        event.preventDefault();
        alert('Seleziona una FAQ prima di procedere.');
    }
}
