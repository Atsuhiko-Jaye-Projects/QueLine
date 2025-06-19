document.addEventListener('DOMContentLoaded', function() {
    var generateButton = document.getElementById('generateButton');
    var outputDiv = document.getElementById('output');

    generateButton.addEventListener('click', function() {
        var format = generateFormat();
        outputDiv.innerText = format;
        copyToClipboard(format);
    });
});

function generateFormat() {
    var prefix = "Hrvst_Hub-";
    var randomNumber = Math.floor(Math.random() * 90000) + 10000;
    return prefix + randomNumber;
}

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        console.log('Format copied to clipboard: ' + text);
    }, function(err) {
        console.error('Failed to copy format: ', err);
    });
}
