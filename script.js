document.querySelector('form').addEventListener('submit', function(event) {
    let phone = document.getElementById('phone').value;
    let phoneRegex = /^[0-9]{10,12}$/;

    if (!phoneRegex.test(phone)) {
        alert('Введите корректный номер телефона.');
        event.preventDefault(); // Останавливаем отправку формы
    }
});