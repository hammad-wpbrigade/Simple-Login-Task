document.addEventListener('change', function(e) {
    if(e.target.name === 'lp_choice' && e.target.value === 'yes') {
        document.getElementById('lp-extra-fields').style.display = 'block';
    } else if (e.target.name === 'lp_choice') {
        document.getElementById('lp-extra-fields').style.display = 'none';
    }
});