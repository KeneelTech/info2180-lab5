"use strict";

document.addEventListener('DOMContentLoaded', function() {

    const result = document.getElementById('result');
    document.getElementById('lookup').addEventListener('click', function() {
        // Fetch the data when the button is clicked
        const country = document.querySelector('input[name="country"]').value;
        const url = `http://localhost/info2180-lab5/world.php?country=${encodeURIComponent(country)}`;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('Cities').addEventListener('click', function() {
        const country = document.querySelector('#country').value;
        const url = `http://localhost/info2180-lab5/world.php?country=${encodeURIComponent(country)}&lookup=cities`;

        fetch(url)
            .then(response => response.text())
            .then(data => {
                result.innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
    });
});