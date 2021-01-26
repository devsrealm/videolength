 document.getElementById('videoInput').onchange  = function(){
    const file = document.getElementById('videoInput').files[0];
    const reader = new FileReader();
    reader.onload = function() {
        const audio = new Audio(reader.result);
        audio.onloadedmetadata = function(){
            // toFixed(2) rounds the number to keep only two decimals e.g .44
            const dur = audio.duration.toFixed(2); // Get The Duration
            // replace the dot(.) to column(:)
            document.getElementById('videolength_duration').value = dur.replace(".", ":");
        };
    };
    reader.readAsDataURL(file);
};
